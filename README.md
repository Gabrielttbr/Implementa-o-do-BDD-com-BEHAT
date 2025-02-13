# Implementando o Behat em um Projeto



## Objetivo
O objetivo deste projeto é entender como funciona o framework [Behat](https://docs.behat.org/en/v3.0/quick_start.html) dentro de um projeto real.

## Descrição
Para explorar o funcionamento do Behat, foi criada uma API simples com um endpoint POST:

```
POST http://localhost/api/deferrals
```

### Exemplo de Body:
```json
{
    "contract_id": 1234,
    "period_start": "2025-01-01",
    "period_end": "2025-06-01",
    "value": 1000
}
```


## Desafios e Objetivos Específicos
- Compreender a configuração inicial do Behat em um projeto real.
- Estruturar corretamente os diretórios de *features* e *contextos*.
- Aprender a separar diferentes contextos para cada *feature*.
- Configurar corretamente a referência entre *features* e contextos no Behat.

## Estrutura do Projeto
A organização dos diretórios foi pensada para facilitar a manutenção e expansão dos testes:

```
/project-root
│── features/
│   ├── Diferimento
│   │   ├── obter.feature
│   │   ├── realizar-diferimento.feature
│   ├── FluxoDeClientes
│   │   ├── integrar-novo-cliente.feature
│   ├── FluxoDeFaturas
│   │   ├── integracao-faturas.feature
│── bootstrap/
│   ├── Diferimento
│   │   ├── FeatureContext.php
│   ├── FluxoDeClientes
│   │   ├── CadastrarNovoClienteContext.php
│   ├── FluxoDeFaturas
│   │   ├── CadastraNovaFaturaNoErpContext.php
│── behat.yml
```

## Configuração do Behat
Para rodar o Behat, é necessário instalar as dependências e configurar o arquivo `behat.yml`.

### Instalação das Dependências
Certifique-se de ter o Composer instalado e rode o seguinte comando:

```
composer require --dev behat/behat
```

### Configuração do `behat.yml`
Exemplo de configuração inicial:

```yaml
default:
    suites:
        Diferimento:
            paths:
                - '%paths.base%/features/Diferimento'
            autoload:
                'Diferimento': '%paths.base%/features/bootstrap/Diferimento'
            contexts:
                - Diferimento\FeatureContext
                - Diferimento\ObterDiferimentoContext
        Clients:
            paths:
                - '%paths.base%/features/FluxoDeClientes'
            autoload:
                'FluxoDeClientes': '%paths.base%/features/bootstrap/FluxoDeClientes'
            contexts:
                - FluxoDeClientes\CadastrarNovoClienteContext
        Invoice:
            paths:
                - '%paths.base%/features/FluxoDeFaturas'
            autoload:
                'FluxoDeFaturas': '%paths.base%/features/bootstrap/FluxoDeFaturas'
            contexts:
                - FluxoDeFaturas\CadastraNovaFaturaNoErpContext
```

## Executando os Testes
Para rodar os testes do Behat, utilize o comando:

```
vendor/bin/behat
```

Ou, para rodar uma *feature* específica:

```
vendor/bin/behat features/Diferimento/realizar-diferimento.feature
```

## Como rodar o projeto?

Para rodar o projeto vc vai apenas precisar do docker-compose instalado na sua máquina

```
docker compose up --build -d
```
A API foi desenovolvida usando o <a href="https://laravel.com/docs/11.x">Laravel 11</a>

## Conclusão
Este projeto tem como foco principal explorar os recursos do Behat em um projeto garantindo uma estrutura organizada e eficiente para os testes BDD.

