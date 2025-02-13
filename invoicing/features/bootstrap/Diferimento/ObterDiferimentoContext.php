<?php

namespace Diferimento;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Step\Given;
use Behat\Step\When;
use Behat\Step\Then;
use Behat\Behat\Context\Context;

class ObterDiferimentoContext implements Context
{
    #[Given('eu estou enviando um id de contrato diferido')]
    public function euEstouEnviandoUmIdDeContratoDiferido(): void
    {
        echo "Teste";
    }

    #[When('eu enviar o id do contrato via params da URLR')]
    public function euEnviarOIdDoContratoViaParamsDaUrlr(): void
    {
        echo "Teste";
    }

    #[Then('ele deve retornar :arg1 com a informações do contrato')]
    public function eleDeveRetornarComAInformacoesDoContrato($arg1): void
    {
        echo "Teste";
    }
}
