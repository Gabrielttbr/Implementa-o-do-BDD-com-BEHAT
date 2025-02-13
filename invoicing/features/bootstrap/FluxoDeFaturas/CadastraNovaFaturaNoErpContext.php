<?php

namespace FluxoDeFaturas;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Step\Given;
use Behat\Step\When;
use Behat\Step\Then;


class CadastraNovaFaturaNoErpContext implements Context
{
    #[Given('eu estou enviando uma nova fatura')]
    public function euEstouEnviandoUmaNovaFatura(): void
    {
       echo "Teste";
    }

    #[When('eu enviar a fatura para o endpoint de cadastro')]
    public function euEnviarAFaturaParaOEndpointDeCadastro(): void
    {
        echo "Teste";
    }

    #[Then('ele deve retornar :arg1 com a fatura cadastrada')]
    public function eleDeveRetornarComAFaturaCadastrada($arg1): void
    {
        echo "Teste";
    }
}
