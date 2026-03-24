/*1) Utilizando o comando ALTER TABLE, adicionar à tabela cliente já criada os seguintes atributos: 
email, cidade, estado, endereço (lembre-se que trata-se de atributo composto)*/
ALTER TABLE CLIENTE ADD
(EMAIL VARCHAR(100),
 CIDADE VARCHAR (50),
 UF CHAR(2), 
 CEP CHAR(8),
 TIPO_LOGRADOURO VARCHAR(15) NOT NULL,
 NM_LOGRADOURO VARCHAR(60) NOT NULL,
 NR_LOGRADOURO VARCHAR(6),
 COMPLEMENTO VARCHAR(30)


/*2) Inserir 10 clientes segundo o seguinte critério:
 
Donald, email uol, Santos SP, mora em casa 
Margarida, email uol, São Vicente SP,
Patinhas, email uol, Florianópolis SC, mora em casa 
Huguinho, email gmail, Santos SP,
Luizinho, email gmail, Praia Grande SP,
Zezinho, email gmail, São Vicente SP, mora em casa 
Pardal, email uol, Santos SP, mora em casa 
Zé Carioca, Rio de Janeiro RJ, mora em casa 
Mickey, email hotmail, Recife PE,*/
INSERT INTO cliente
(NM_CLIENTE, CPF, EMAIL, CIDADE, UF, CEP, TIPO_LOGRADOURO, NM_LOGRADOURO, NR_LOGRADOURO, COMPLEMENTO)
VALUES
('Donald', '03172775020','donald@uol.com.br', 'Santos', 'SP', '11070021', 'Rua', 'das Flores do Campo', '123', 'Casa'),
('Margarida', '79242410004','margarida@uol.com.br', 'São Vicente', 'SP', '11310071', 'Alameda', 'dos Sonhos', '45', 'Ao lado do mercado'),
('Patinhas', '40405337043','patinhas@uol.com.br', 'Florianópolis', 'SC', '11310060', 'Travessa', 'do Sol Poente', NULL, 'Casa'),
('Huguinho', '55800563039','huguinho@gmail.com.br', 'Santos', 'SP', '10028424', 'Avenida', 'das Marés', '990', 'Bloco C'),
('Luizinho', '47619906002','luizinho@gmail.com.br', 'Praia Grande', 'SP', '11010151', 'Praça', 'da Brisa Leve', '1', null),
('Zezinho', '28686417094','zezinho@gmail.com.br', 'São Vicente', 'SP', '200', 'Rua', 'Canção do Vento', '77', 'Casa'),
('Pardal', '71810446058','donald@uol.com.br', 'Santos', 'SP', '11060001', 'Travessa', 'Esperança Feliz', '10', 'Casa'),
('Zé Carioca', '12628449080', NULL, 'Rio de Janeiro', 'RJ', '22410002', 'Avenida', 'da Boa Vista', '22', 'Casa'),
('Mickey', '03190847010','mickey@hotmail.com', 'Recife', 'PE', '50030310', 'Rua', 'da Tecnologia', '1010', NULL)


/*3) Inserir 10 clientes segundo o seguinte critério:
Minie,  email gmail, Recife PE,
Pateta,  email gmail, 
Branca de Neve, email hotmail, São Joaquim SC, 
Aladin, email gmail, Belém PA,
Cinderela, email hotmail, Goiania GO, mora em casa 
Mulan , email gmail, Rio das Ostras RJ,
Moana , email gmail, Parati RJ,
Asnésio, email uol, Belo Horizonte MG, 
Maga Patalógica, email gmail, Cubatão SP,
Capitão Boeing, email uol, Manaus AM, mora em casa
Pão Duro Mac Money, email ig, Osasco SP*/
INSERT INTO cliente
(NM_CLIENTE, CPF, EMAIL, CIDADE, UF, CEP, TIPO_LOGRADOURO, NM_LOGRADOURO, NR_LOGRADOURO, COMPLEMENTO)
VALUES
('Minie', '69493142051','minie@gmail.com.br', 'Recife', 'PE', '55413684', 'Rua', 'das Estrelas Caídas', '347', null),
('Pateta', '90011147091','pateta@gmail.com.br', null, NULL, '66713842', 'Avenida', 'das Sombras Eternas', '1294', 'Torre D'),
('Branca de Neve', '06573039092','neve@hotmail.com', 'São Joaquim', 'SC', '11384971', 'Rua', 'do Vento Selvagem', '722', null),
('Aladin', '93609710063','aladin@gmail.com.br', 'Belém', 'PA', '34690705', 'Alameda', 'dos Dragões', '199', null),
('Cinderela', '32780604077','cinderela@hotmail.com', 'Goiania', 'GO', '54975503', 'Praça', 'do Viajante Solitário', '498', 'Casa'),
('Mulan', '35903759068','mulan@gmail.com.br', 'Rio das Ostras', 'RJ', '76673357', 'Rua', 'das Arvores Douradas', '808', 'Próximo ao posto de gasolina'),
('Moana', '11612466060','moana@gmail.com.br', 'Parati', 'RJ', '99754346', 'Travessa', 'Esperança Feliz', '57', null),
('Asnésio', '60469771003', 'asnesio@uol.com.br', 'Belo Horizonte', 'MG', '22410002', 'Avenida', 'da Boa Vista', '67', 'Próximo a praça'),
('Maga Patalógica', '61797791044','maga@gmail.com.br', 'Cubatão', 'SP', '22486687', 'Rua', 'da Tartaruga', '32', NULL),
('Capitão Boeing', '74077593085','boeing@uol.com.br', 'Manaus', 'AM', '64435479', 'Avenida', 'da Felicidade', '58', 'Casa'),
('Pão Duro Mac Money', '75258064','mac@ig.com.br', 'Osasco', 'SP', '64711548', 'Praça', 'do Sol Nascente', '4', 'Apartamento 301')

 
 
/*4)Inserir 03 funcionários com dados aleatórios, mas com os seguintes nomes:
Cebolinha,
Cascão, 
Chico Bento*/
INSERT INTO funcionario
(NM_FUNCIONARIO, CPF, CELULAR)
VALUES
('Cebolinha', '38681303066', '13974648697'),
('Cascão', '53937682066', '11676963521'),
('Chico Bento', '51126393002', '13976863534')

/*5)Inserir os seguintes equipamentos: 
Cadeiras 02 posições - 50 unidades - R$2,00
Cadeiras 04 posições - 100 unidades - R$3,50
Guarda Sol P - 40 unidades - R$2,00
Guarda Sol G - 60 unidades - R$3,00
Mesinha - 30 unidades - R$1,50*/
INSERT INTO equipamento 
(NM_EQUIPAMENTO, QTD, VL_HORA)
VALUES
('Cadeira 02 posições', 50, 2.00),
('Cadeira 04 posições', 100, 3.50),
('Guarda Sol P', 40, 2.00),
('Guarda Sol G', 60, 3.00),
('Mesinha', 30, 1.50)

/*6)Inserir o aluguel de 1 cadeiras 2 posições para o Pateta feita pelo Cebolinha, em 08/12/24.
Fazer o update da quantidade retirando uma do estoque. */
INSERT INTO aluguel
(CD_CLIENTE, CD_FUNCIONARIO, DT_RETIRADA, DT_DEVOLUCAO, VL_A_PAGAR, VL_PAGO, PAGO, FORMA_PAGAMENTO, QNT_VEZES)
VALUES
(33,1, '2024-12-08 00:00:00', NULL, 2.00, NULL, 0, 'Dinheiro', 1)

INSERT INTO aluguel_equipamento
(CD_EQUIPAMENTO, CD_ALUGUEL, VL_ITEM, VL_UNITARIO, QTD)
VALUES(1,1, 2.00, 2.00, 1)

UPDATE equipamento
SET QTD = QTD -1
WHERE CD_EQUIPAMENTO = 1

/*7)Inserir o aluguel de 2 cadeiras 4 posições e um guarda sol G para o Mickey feita pelo Chico Bento, em dez 10/12/24.
Fazer o update da quantidade retirando do estoque.*/
INSERT INTO aluguel
(CD_CLIENTE, CD_FUNCIONARIO, DT_RETIRADA, DT_DEVOLUCAO, VL_A_PAGAR, VL_PAGO, PAGO, FORMA_PAGAMENTO, QNT_VEZES)
VALUES
(9,3, '2024-12-10 00:00:00', NULL, 10.00, NULL, 0, 'Débito', 1)

INSERT INTO aluguel_equipamento
(CD_EQUIPAMENTO, CD_ALUGUEL, VL_ITEM, VL_UNITARIO, QTD)
VALUES
(2,2, 7.0, 3.50, 2),
(4,2, 3.0, 3.00, 1)

UPDATE equipamento
SET QTD = QTD -2
WHERE CD_EQUIPAMENTO = 2

UPDATE equipamento
SET QTD = QTD -1
WHERE CD_EQUIPAMENTO = 4

/*8)Inserir o aluguel de 1 guarda sol P para 3 pessoas quaisquer feita pelo Cebolinha, em 27/12/24.
Fazer o update da quantidade retirando do estoque.*/
INSERT INTO aluguel
(CD_CLIENTE, CD_FUNCIONARIO, DT_RETIRADA, DT_DEVOLUCAO, VL_A_PAGAR, VL_PAGO, PAGO, FORMA_PAGAMENTO, QNT_VEZES)
VALUES
(5,1, '2024-12-27 00:00:00', NULL, 2.00, NULL, 0, 'Dinheiro', 1),
(7,1, '2024-12-27 00:00:00', NULL, 2.00, NULL, 0, 'Pix', 1),
(1,1, '2024-12-27 00:00:00', NULL, 2.00, NULL, 0, 'Crédito', 1)

INSERT INTO aluguel_equipamento
(CD_EQUIPAMENTO, CD_ALUGUEL, VL_ITEM, VL_UNITARIO, QTD)
VALUES
(3, 3, 2.0, 2.00, 1),
(3, 4, 2.0, 2.00, 1),
(3, 5, 2.0, 2.00, 1)

UPDATE equipamento
SET QTD = QTD -3
WHERE CD_EQUIPAMENTO = 3

/*9)Inserir o aluguel de 2 cadeiras 4 posições e um guarda sol G para 6 pessoas aleatórias feitas pelo Chico Bento, em dez 28/12/24.
Fazer o update da quantidade retirando do estoque.*/
INSERT INTO aluguel
(CD_CLIENTE, CD_FUNCIONARIO, DT_RETIRADA, DT_DEVOLUCAO, VL_A_PAGAR, VL_PAGO, PAGO, FORMA_PAGAMENTO, QNT_VEZES)
VALUES
(37,3, '2024-12-28 00:00:00', NULL, 10.00, NULL, 0, 'Dinheiro', 1),
(41,3, '2024-12-28 00:00:00', NULL, 10.00, NULL, 0, 'Pix', 1),
(35,3, '2024-12-28 00:00:00', NULL, 10.00, NULL, 0, 'Pix', 1),
(38,3, '2024-12-28 00:00:00', NULL, 10.00, NULL, 0, 'Débito', 1),
(6,3, '2024-12-28 00:00:00', NULL, 10.00, NULL, 0, 'Pix', 1),
(2,3, '2024-12-28 00:00:00', NULL, 10.00, NULL, 0, 'Dinheiro', 1)

INSERT INTO aluguel_equipamento
(CD_EQUIPAMENTO, CD_ALUGUEL, VL_ITEM, VL_UNITARIO, QTD)
VALUES
(2, 6, 7.0, 3.50, 2),
(4, 6, 3.0, 3.00, 1),
(2, 7, 7.0, 3.50, 2),
(4, 7, 3.0, 3.00, 1),
(2, 8, 7.0, 3.50, 2),
(4, 8, 3.0, 3.00, 1),
(2, 9, 7.0, 3.50, 2),
(4, 9, 3.0, 3.00, 1),
(2, 10, 7.0, 3.50, 2),
(4, 10, 3.0, 3.00, 1),
(2, 11, 7.0, 3.50, 2),
(4, 11, 3.0, 3.00, 1)

UPDATE equipamento
SET QTD = QTD -12
WHERE CD_EQUIPAMENTO = 2

UPDATE equipamento
SET QTD = QTD -6
WHERE CD_EQUIPAMENTO = 4

/*10)Listar o nome e os contatos de todos os clientes da barraca em ordem alfabética.*/
SELECT NM_CLIENTE, EMAIL FROM cliente 
ORDER BY NM_CLIENTE 

/*11)Listar o nome e o contato telefônico de todos os funcionários da barraca em ordem alfabética. */
SELECT NM_FUNCIONARIO, CELULAR FROM funcionario

/*12)Listar todos os dados dos aluguéis realizados em ordem de data da mais antiga para a mais nova.*/
SELECT * FROM aluguel
ORDER BY DT_RETIRADA

/*13)Listar nome, cidade e estado de todos os clientes da baixada santista em ordem alfabética por nome.*/
SELECT NM_CLIENTE, CIDADE, UF FROM cliente 
WHERE CIDADE IN ('Santos', 'São Vicente', 'Praia Grande', 'Cubatão')
ORDER BY NM_CLIENTE

/*14)Listar todos os produtos e a quantidade de estoque do produto que tem mais itens para o que tem menos.*/
SELECT NM_EQUIPAMENTO, QTD FROM equipamento
ORDER BY QTD desc

/*15)Listar o nome, a cidade e o estado de todos os clientes que moram em casa em ordem alfabética.*/
SELECT NM_CLIENTE, CIDADE, UF FROM cliente
WHERE COMPLEMENTO ='Casa'
ORDER BY NM_CLIENTE

/*16)Listar o nome de todos os clientes e o estado daqueles que não vivem no estado de SP.*/
SELECT NM_CLIENTE, UF FROM cliente
WHERE UF <> 'SP'

/*17)Listar o nome de todos os clientes que começam com a letra A.*/
SELECT NM_CLIENTE FROM cliente
WHERE NM_CLIENTE LIKE 'A%'

/*18)Listar todos os dados dos clientes que começam com a letra M e vivam no estado de PE.*/
SELECT * FROM cliente
WHERE NM_CLIENTE  LIKE 'M%' AND UF ='PE'

/*19)Listar apenas as cadeiras e a quantidade que possui em estoque em ordem de quantidade,
da que mais possui itens para a que menos possui.*/
SELECT NM_EQUIPAMENTO, QTD FROM equipamento
WHERE NM_EQUIPAMENTO LIKE '%cadeira%'
ORDER BY QTD desc

/*20)Listar todos os dados dos alugueis que ocorreram entre 25/12 e 31/12 de 2024 em ordem de data da mais antiga para a mais nova.*/
SELECT * FROM aluguel
WHERE DT_RETIRADA between '2024-12-25 00:00:00' AND '2024-12-31 23:59:59'
ORDER BY DT_RETIRADA