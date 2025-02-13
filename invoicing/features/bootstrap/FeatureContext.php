<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Step\Given;
use Behat\Step\When;
use Behat\Step\Then;
use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */

    private array $contractToSend = [
        'contract_id' => 1,
        'period_start' => null,
        'period_end' => null,
        'value' => null
    ];

    private array $responseIntegrationApi;

    private GuzzleHttp\Client $client;

    public function __construct()
    {
        $this->client = new GuzzleHttp\Client();

        // Inicialize a aplicação Laravel
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
    }

    #[Given('eu estou enviando um contrato com valor :arg1 reais para diferir')]
    public function euEstouEnviandoUmContratoComValorReaisParaDiferir($arg1): void
    {
        $this->contractToSend['value'] = (int)$arg1;
    }

    #[Given('o seu período é de :arg1 meses')]
    public function oSeuPeriodoEDeMeses($arg1): void
    {
        $this->contractToSend['period_start'] =  Date::now()->format('Y-m-d');
        $this->contractToSend['period_end'] = Date::now()->addMonths((int)$arg1 - 1)->format('Y-m-d');
    }

    #[When('eu enviar o contrato para o endpoint de diferir')]
    public function euEnviarOContratoParaOEndpointDeDiferir(): void
    {
        try {
            $this->responseIntegrationApi = json_decode($this->client->post('localhost/api/deferrals', [
                'json' => [
                    'contract_id' => $this->contractToSend['contract_id'],
                    'period_start' => $this->contractToSend['period_start'],
                    'period_end' => $this->contractToSend['period_end'],
                    'value' => $this->contractToSend['value']
                ]
            ])->getBody()->getContents(), true);
        }catch (\Exception $e) {
            $this->responseIntegrationApi = ["code" => $e->getCode()];
        }

    }

    #[Then('ele deve retornar')]
    public function eleDeveRetornar(PyStringNode $string): void
    {
        $date = Date::now();
        $installmentValue = 1;
        $mouth =  (Date::createFromDate($this->contractToSend['period_start'])->diffInMonths(Date::createFromDate($this->contractToSend['period_end'])));
        $expectValue = $this->contractToSend['value'] / $mouth;
        
        foreach ($this->responseIntegrationApi as $installment ) {
            Assert::assertEquals(1, $installment['contract_id'], "Erro: contract_id inválido.");
            Assert::assertEquals($expectValue, $installment['value'], "Erro: Valor inválido.");
            Assert::assertEquals($installmentValue, $installment['installement'], "Erro: Número da parcela inválido.");
            Assert::assertEquals($date->format('Y-m-d'), $installment['billing_date'], "Erro: Data de faturamento inválida.");

            $date->addMonth();
            $installmentValue++;
        }
    }

    #[Then('ele deve retornar um erro, avisando que o campo valor e obrigatório')]
    public function eleDeveRetornarUmErroAvisandoQueOCampoValorEObrigatorio(PyStringNode $string): void
    {
        Assert::assertEquals(400, $this->responseIntegrationApi['code']);
    }

}
