/*Lista nome cidade e estado de todos os clientes*/
SELECT NM_CLIENTE, cidade,ESTADO from cliente

/*Lista nome e o seu numero telefonico*/
SELECT cli.NM_CLIENTE, ct.DDD, ct.NUMERO_CONTATO from cliente cli
JOIN contato_telefonico ct ON cli.CD_CLIENTE =  ct.CD_CLIENTE


/*Lista nome do cliente, cidade, estado, telefone, nomepet*/
SELECT cli.NM_CLIENTE, cli.CIDADE, cli.ESTADO, ct.NUMERO_CONTATO, a.NM_ANIMAL from cliente cli
JOIN contato_telefonico ct ON cli.CD_CLIENTE =  ct.CD_CLIENTE
JOIN animal a ON cli.CD_CLIENTE = a.CD_CLIENTE

/*Lista data consulta, nome animal, nome cliente, procedimento realizado de todas as consultas realizadas*/
SELECT
	c.DT_CONSULTA,
	a.NM_ANIMAL,
	cli.NM_CLIENTE,
	v.NM_VETERINARIO,
	ts.NM_SERVICO
FROM cliente cli
JOIN animal a ON cli.CD_CLIENTE  = a.CD_CLIENTE
JOIN consulta c ON a.CD_ANIMAL = c.CD_ANIMAL
JOIN veterinario v ON c.CD_VETERINARIO = v.CD_VETERINARIO
JOIN consulta_tipo_servico cts ON c.CD_CONSULTA = cts.CD_CONSULTA
JOIN tipo_servico ts ON cts.CD_TIPO_SERVICO = ts.CD_TIPO_SERVICO

SELECT * FROM consulta_tipo_servico