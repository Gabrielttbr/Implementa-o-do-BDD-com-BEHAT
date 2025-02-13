Feature: Cadastrar novo criente no ERP
  Para que o cliente possa ser faturado
  E para que o cliente possa ser cobrado

  Scenario: Cadastrar um novo cliente
    Given eu estou enviando um novo cliente
    When eu enviar o cliente para o endpoint de cadastro
    Then ele deve retornar 200 com o cliente cadastrado