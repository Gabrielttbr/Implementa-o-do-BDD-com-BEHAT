Feature: Realizar o diferimento
  Para dividir o valor de um contrato de acordo com seu período

Scenario: Realizar o diferimento de um contrato de 6 meses
  Given eu estou enviando um contrato com valor 1000 reais para diferir 
  And o seu período é de 6 meses
  When eu enviar o contrato para o endpoint de diferir 
  Then ele deve retornar
    """
    6 parcelas do contrato
    O valor de cada parcela deve ser calculado com base no total/periodo
    A data de faturamento deve ser incremental começando do início do período do contrato
    """

Scenario: Realizar o diferimento de um contrato de 12 meses
  Given eu estou enviando um contrato com valor 1000 reais para diferir 
  And o seu período é de 12 meses
  When eu enviar o contrato para o endpoint de diferir 
  Then ele deve retornar
    """
    12 parcelas do contrato
    O valor de cada parcela deve ser calculado com base no total/periodo
    A data de faturamento deve ser incremental começando do início do período do contrato
    """

Scenario: Realizar o diferimento de um contrato de 18 meses
  Given eu estou enviando um contrato com valor 2000 reais para diferir 
  And o seu período é de 18 meses
  When eu enviar o contrato para o endpoint de diferir 
  Then ele deve retornar
    """
    12 parcelas do contrato
    O valor de cada parcela deve ser calculado com base no total/periodo
    A data de faturamento deve ser incremental começando do início do período do contrato
    """


Scenario: Realizar o diferimento de um contrato de 18 meses
  Given eu estou enviando um contrato com valor 800000 reais para diferir 
  And o seu período é de 24 meses
  When eu enviar o contrato para o endpoint de diferir 
  Then ele deve retornar
    """
    12 parcelas do contrato
    O valor de cada parcela deve ser calculado com base no total/periodo
    A data de faturamento deve ser incremental começando do início do período do contrato
    """
@erro
Scenario: Lançar um erro quando o contrato não estiver com valor
  Given eu estou enviando um contrato com valor 0 reais para diferir 
  And o seu período é de 24 meses
  When eu enviar o contrato para o endpoint de diferir 
  Then ele deve retornar um erro, avisando que o campo valor e obrigatório
    """
    12 parcelas do contrato
    O valor de cada parcela deve ser calculado com base no total/periodo
    A data de faturamento deve ser incremental começando do início do período do contrato
    """
