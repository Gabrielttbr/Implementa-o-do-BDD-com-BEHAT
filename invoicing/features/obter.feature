Feature: Pegar informações do diferimento

Scenario: Pegar informações de um diferimento pelo id
  Given eu estou enviando um id de contrato diferido
  When eu enviar o id do contrato via params da URLR
  Then ele deve retornar 200 com a informações do contrato
