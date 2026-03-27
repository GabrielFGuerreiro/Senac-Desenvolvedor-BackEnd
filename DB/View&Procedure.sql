/*Criação e uso de View*/
CREATE VIEW VW_SELECT_CONSULTAS_GERAIS
AS
SELECT consulta.DT_CONSULTA,
  	    a.NM_ANIMAL,
  	    c.NM_CLIENTE,
  	    veterinario.NM_VETERINARIO,
  	    ts.NM_SERVICO

FROM cliente c
INNER JOIN animal a
ON a.CD_CLIENTE = c.CD_CLIENTE
INNER JOIN consulta 
ON a.CD_ANIMAL = consulta.CD_ANIMAL
INNER JOIN veterinario
ON consulta.CD_VETERINARIO = veterinario.CD_VETERINARIO
INNER JOIN consulta_tipo_servico cts 
ON cts.CD_CONSULTA = consulta.CD_CONSULTA
INNER JOIN tipo_servico ts
ON ts.CD_TIPO_SERVICO = cts.CD_TIPO_SERVICO
ORDER BY veterinario.NM_VETERINARIO, consulta.DT_CONSULTA ASC

SELECT * FROM VW_SELECT_CONSULTAS_GERAIS


/*Criação e uso de Stored Procedure*/
CREATE PROCEDURE SP_SELECT_CONSULTAS_POR_SERVICO
(
	IN nm_Servico VARCHAR(50)
)
SELECT * FROM VW_SELECT_CONSULTAS_GERAIS
WHERE NM_SERVICO = nm_Servico

call SP_SELECT_CONSULTAS_POR_SERVICO('Vacina')

CREATE PROCEDURE SP_INSERT_SERVICO
(
	IN NM_SERVICO VARCHAR(50),
	IN VL_SERVICO DECIMAL(10,2)
)
INSERT INTO tipo_servico
(NM_SERVICO, VL_SERVICO)
VALUES
(NM_SERVICO, VL_SERVICO)


CALL SP_INSERT_SERVICO ('teste', 1.0)




/*1.Criar uma view que traga a data da consulta,
o nome do pet, o nome do cliente e seu telefone*/
CREATE VIEW VW_SELECT_CONSULTAS_CLIENTE
AS
SELECT consulta.DT_CONSULTA,
  	    a.NM_ANIMAL,
  	    c.NM_CLIENTE,
  	    c.CELULAR

FROM cliente c
INNER JOIN animal a
ON a.CD_CLIENTE = c.CD_CLIENTE
INNER JOIN consulta 
ON a.CD_ANIMAL = consulta.CD_ANIMAL

SELECT * FROM VW_SELECT_CONSULTAS_CLIENTE

/*2.Criar uma procedure que traga o nome do pet, o nome do cliente
e telefone, de acordo com o tipo do animal
Ex.: Cachorro, Gato, etc...*/
CREATE PROCEDURE SP_SELECT_DADOS_ANIMAL
(
	IN ESPECIE VARCHAR(50)
)
SELECT
  	    a.NM_ANIMAL,
  	    c.NM_CLIENTE,
  	    c.CELULAR

FROM cliente c
INNER JOIN animal a
ON a.CD_CLIENTE = c.CD_CLIENTE
INNER JOIN consulta 
ON a.CD_ANIMAL = consulta.CD_ANIMAL
WHERE a.especie = ESPECIE

CALL SP_SELECT_DADOS_ANIMAL('cão')