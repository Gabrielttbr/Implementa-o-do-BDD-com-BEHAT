<?php

namespace FluxoDeClientes;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Step\Given;
use Behat\Step\When;
use Behat\Step\Then;
use Behat\Behat\Context\Context;

class CadastrarNovoClienteContext implements Context
{
    #[Given('eu estou enviando um novo cliente')]
    public function euEstouEnviandoUmNovoCliente(): void
    {
        echo "Teste";
    }

    #[When('eu enviar o cliente para o endpoint de cadastro')]
    public function euEnviarOClienteParaOEndpointDeCadastro(): void
    {
        echo "Teste";
    }

    #[Then('ele deve retornar :arg1 com o cliente cadastrado')]
    public function eleDeveRetornarComOClienteCadastrado($arg1): void
    {
        echo "Teste";
    }
}