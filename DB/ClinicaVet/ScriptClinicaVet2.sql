/*Mostra tabelas existente no BD*/
SHOW TABLES

/* Buscar dados em determinada tabela*/
SELECT * FROM cliente


SELECT NM_CLIENTE, CELULar, email FROM cliente

SELECT cd_CLIENTE, NM_CLIENTE FROM cliente
WHERE CD_CLIENTE BETWEEN 5 AND 15

SELECT cd_CLIENTE, NM_CLIENTE FROM cliente
WHERE CD_CLIENTE >=5 AND  CD_CLIENTE <= 15

SELECT NM_CLIENTE FROM cliente
WHERE NM_CLIENTE LIKE 'Ju%'

/*Inserir dados em determinada tabela*/
INSERT INTO cliente
(NM_CLIENTE, cpf, CELULAR, EMAIL, CIDADE, ESTADO, CEP, TIPO_LOGRADOURO, NM_LOGRADOURO, NR_LOGRADOURO, COMPLEMENTO)
values
(
	'Juquinha Simões', '88989922200', '13973481597','jucasimoes@uol.com.br',
	'Santos', 'SP', '11077888','Rua', 'das Margaridas', '50', 'ap.51' 
),
(
	'Mariazinha Simões', '99900011122', '13976484533' ,'mariasimoes@bol.com.br',
	'Santos', 'SP', '11077888','Rua', 'das Margaridas', '50', 'ap.51' 
);


/* Atualizar dados em determinada tabela*/
UPDATE cliente
SET celular = '13975352168'
WHERE CD_CLIENTE = 1

/* Busca com filtros */
SELECT NM_CLIENTE, EMAIL, estado FROM cliente
WHERE cidade ='SANTOS'

/* Buscar ordenada */
SELECT nm_CLIENTE, CIDADE FROM cliente
ORDER BY nM_CLIENTE

SELECT * FROM cliente
WHERE ESTADO = 'Sp'
ORDER BY NM_CLIENTE 


/* Excluir dados de determinada tabela */
DELETE FROM cliente
WHERE CD_CLIENTE =1