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