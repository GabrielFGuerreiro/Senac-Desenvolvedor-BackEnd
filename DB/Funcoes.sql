/*Trazer a quantidade de consultas executada na cínica ao longo de todo o período*/
select COUNT(CD_CONSULTA) FROM consulta


/*Trazer o serviço maias caro da clínica*/
SELECT MAX(VL_SERVICO) FROM tipo_servico

/*Trazer o serviço mais barato*/
SELECT MIN(VL_SERVICO) FROM tipo_servico

/*Trazer a média dos valores dos serviços*/
SELECT AVG(VL_SERVICO) FROM tipo_servico

/*Trazer o faturamento bruto da clínica*/
SELECT SUM(VL_SERVICO) FROM tipo_servico

/*Trazer a quantidade de consultas que ocorreram com cada animalzinho
Ex.: Bidu --------- 3 consultas
     Tobby --------- 2 consultas
	  ordenando pela quantidade de consultas da maior para a menor
	  considerando apenas animais que tiveram mais que 3 consultas*/

SELECT
	a.NM_ANIMAL,
	COUNT(c.CD_CONSULTA) AS 'Quantidade de Consultas'
FROM animal a
JOIN consulta c ON a.CD_ANIMAL = c.CD_ANIMAL
GROUP BY a.NM_ANIMAL
HAVING COUNT(c.CD_CONSULTA) >3
ORDER BY COUNT(c.CD_CONSULTA) DESC


/* Listar a quantidade de animais pro espécie */
SELECT ESPECIE, COUNT(CD_ANIMAL) FROM animal
GROUP BY ESPECIE

/* Lista todas as cidades onde tenho cliente */
SELECT DISTINCT cidade  FROM cliente

/*Paginação - Limitar qnt de linhas*/
SELECT * FROM veterinario
LIMIT 10
