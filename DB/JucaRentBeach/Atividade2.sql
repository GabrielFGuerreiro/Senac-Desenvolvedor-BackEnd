/*1.Criar um aluguel de equipamento para o mês de novembro (qualquer data e hora), qualquer equipamento, qualquer 
funcionário e qualquer cliente, mas cujo pagamento não tenha sido feito (ficou em aberto).*/
INSERT INTO aluguel
(CD_CLIENTE, CD_FUNCIONARIO, DT_RETIRADA, DT_DEVOLUCAO, VL_A_PAGAR, VL_PAGO, PAGO, FORMA_PAGAMENTO, QNT_VEZES)
VALUES 
(4, 2, '2025-11-18 15:00:00', NULL, 2.00, NULL, 0, NULL, NULL)

INSERT INTO aluguel_equipamento
(CD_EQUIPAMENTO, CD_ALuguel, VL_ITEM ,VL_UNITARIO, QTD)
values
(3, 20, 2.00, 2.00, 1)


/*2.Listar nome de todos os funcionários, cpf e os aluguéis feitos por ele (apenas a data e que equipamento alugou). */
SELECT NM_FUNCIONARIO, CPF, DT_RETIRADA, e.NM_EQUIPAMENTO FROM funcionario f
JOIN aluguel a ON f.CD_FUNCIONARIO = a.CD_FUNCIONARIO
JOIN aluguel_equipamento ae ON a.CD_ALUGUEL = ae.CD_ALUGUEL
JOIN equipamento e ON ae.CD_EQUIPAMENTO = e.CD_EQUIPAMENto


/*3.Listar nome do cliente, cpf, datas que ele esteve na praia, quem atendeu este
cliente, tudo isto, ordenado por data, da mais nova para a mais antiga, apenas no mês de DEZ24.  */
SELECT NM_CLIENTE, c.CPF, DT_RETIRADA, NM_FUNCIONARIO FROM cliente c
JOIN aluguel a ON c.CD_CLIENTE = a.CD_ALUGUEL
JOIN funcionario f ON a.CD_FUNCIONARIO = f.CD_FUNCIONARIO
WHERE DT_RETIRADA >= '2024-12-01 00:00:00' AND DT_RETIRADA <= '2024-12-31 23:59:59'
ORDER BY DT_RETIRADA desc

/*4.Lista o nome dos equipamentos que foram mais alugados em ordem decrescente, do equipamento mais alugado para o menos alugado. Equipamentos não alugados devem sair no relatório. */
SELECT COUNT(ae.CD_EQUIPAMENTO) 'Qnt', e.NM_EQUIPAMENTO FROM equipamento e
left JOIN aluguel_equipamento ae ON e.CD_EQUIPAMENTO = ae.CD_EQUIPAMENTO
GROUP BY NM_EQUIPAMENTO
ORDER BY COUNT(ae.CD_ALUGUEL) desc

/*5.Listar a arrecadação bruta da barraca de praia entre Natal e Ano Novo.*/

/*UPDATE aluguel
SET DT_DEVOLUCAO = '2025-01-01 00:45:00', VL_PAGO = VL_A_PAGAR, PAGO = 1
WHERE CD_ALUGUEL IN(3,5,14, 16,20)*/

SELECT SUM(VL_PAGO) FROM aluguel
WHERE DT_DEVOLUCAO >= '2024-12-25 00:00:00' AND DT_DEVOLUCAO <= '2025-01-01 05:00:00'


/*6.Reajustar preço por hora de todos os equipamentos em 10%.*/
UPDATE equipamento
SET VL_HORA = VL_HORA*1.10 

/*7.Listar a quantidade de clientes que pagaram utilizando determinada forma de pagamento, em ordem crescente, do método mais usado para o menos usado. Também é necessário que pagamentos não realizados sejam apontados. */
SELECT COUNT(a.CD_ALUGUEL),FORMA_PAGAMENTO  FROM aluguel a
GROUP BY (a.FORMA_PAGAMENTO)
ORDER by COUNT(a.CD_ALUGUEL) DESC


/*8.Listar quanto a barraca faturou por dia, em cada um dos dias do mês de dezembro apenas. */
SELECT SUM(VL_PAGO),DT_DEVOLUCAO FROM aluguel a
WHERE DT_DEVOLUCAO >= '2024-12-01 00:00:00' AND DT_DEVOLUCAO <= '2024-12-31 23:59:59' 
GROUP BY DAY(DT_DEVOLUCAO)

/*9.Excluir o aluguel e todas as referências a ele criadas no item 1. Se tentar excluir direto da tabela aluguel teremos um problema? Por que isto ocorre? Como resolver (escrever o código usado)?*/

/*Sim, na tabela ALUGUEL_EQUIPAMENTO há uma FK (CD_ALUGUEL) que referencia a PK (CD_ALUGUEL também) da ALUGUEL, então por motivos de segurança do relacionamento não é possível excluir o registro direto da tabela ALUGUEL.
Se fosse permitido, o CD_ALUGUEL na tabela ALUGUEL_EQUIPAMENTO estaria referenciando a um aluguel "fantasma"/não existente.
Para resolver é preciso excluir o registro com a FK primeiro, ou seja, excluir na ALUGUEL_EQUIPAMENTO.*/
DELETE from aluguel_equipamento
WHERE CD_ALUGUEL =20

DELETE from aluguel WHERE CD_ALUGUEL =20

/*10.Listar todos os equipamentos que tiveram a quantidade de aluguéis inferiores a 5 unidades, durante o mês de DEZ24. */
SELECT e.NM_EQUIPAMENTO, COUNT(ae.CD_EQUIPAMENTO) 'Qnt' FROM aluguel a
JOIN aluguel_equipamento ae ON a.CD_ALUGUEL = ae.CD_ALUGUEL
JOIN equipamento e ON ae.CD_EQUIPAMENTO = e.CD_EQUIPAMENTO
WHERE DT_RETIRADA >= '2024-12-01 00:00:00' AND DT_RETIRADA <= '2024-12-31 23:59:59' 
GROUP BY ae.CD_EQUIPAMENTO
HAVING COUNT(ae.CD_EQUIPAMENTO) < 5