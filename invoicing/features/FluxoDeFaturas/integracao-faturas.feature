Feature: realiza a integracao de novas faturas com ERP
    Para que o cliente possa ser faturado
    E para que o cliente possa ser cobrado
    
    Scenario: Cadastrar uma nova fatura
        Given eu estou enviando uma nova fatura
        When eu enviar a fatura para o endpoint de cadastro
        Then ele deve retornar 200 com a fatura cadastrada