
SELECT * FROM animal
INSERT INTO animal (CD_CLIENTE, NM_ANIMAL, ESPECIE, RACA, PESo, PORTe, SEXO, DT_NASCIMENTO)
VALUES 
(1,'Bidu','Cão', 'Beagle',12.30, 'M','M','2020-03-09'),
(2,'Penélope','Gato', 'Frajola',8.82,'M','F','2021-12-13'),
(2,'Tom','Gato', 'Frajola','9.22','M','M','2019-01-06'),
(3,'Cofap','Cão', 'Basset',9.11,'P','M','2018-06-24')


INSERT INTO veterinario
(NM_VETERINARIO, crmv, celular, especialidade)
VALUES 
('Hugo Costa', '12345SP','13988745265','Cirurgia Veterinaria'),
('Cristina Mendes','54321RJ', '219854615322', 'Ortopedia Veterinaria'),
('José Manuel Lopez Mendoza', '54874SP', '1398565412', 'Cardiologia Veterinaria')


INSERT INTO TIPO_SERVICO  ( NM_SERVICO , VL_SERVICO )
VALUES 
('Banho/Tosa' , 90.00),
('Castração' , 200.00),
('Vacina' , 150.00),
('MicroChipagem' , 300.00),
('Ultrasom', 350.00);


INSERT INTO consulta
(CD_ANIMAL, CD_VETERINARIO, DT_CONSULTA, IC_PAGO, FORMA_PAGAMENTO, QNT_VEZES, VL_TOTAL, VL_PAGO)
VALUES
((SELECT CD_ANIMAL FROM animal WHERE NM_ANIMAL = 'Bidu'),
16,NOW(),1,'Cartão',1,150.00,150.00),
((SELECT CD_ANIMAL FROM animal WHERE NM_ANIMAL = 'Bidu'),
16,NOW(),1,'Pix',1,90.00,90.00);

/*Inserir 3 consultas para quaisquer animais com o mesmo veterinário Dr.Cristina, qualquer serviço.*/
INSERT INTO CONSULTA (CD_ANIMAL, CD_VETERINARIO, DT_CONSULTA, IC_PAGO, FORMA_PAGAMENTO, QNT_VEZES, VL_TOTAL, VL_PAGO)
VALUES
(1, 2, '2026-03-10 14:30:00', 0, 'Dinheiro', '0', 90.00, NULL),
(2, 2, '2026-01-25 09:00:00', 1, 'Pix', '0', 150.00, 150.00), 
(3, 2, '2026-03-29 18:00:00', 0, 'Crédito', '2', 300.00, NULL) 

INSERT INTO CONSULTA_TIPO_SERVICO (CD_CONSULTA, CD_TIPO_SERVICO, VL_SERVICO)
VALUES
(3, 1, 90.00), 
(4, 3, 150.00), 
(5, 4, 300.00)


INSERT INTO consulta (CD_ANIMAL, CD_VETERINARIO, DT_CONSULTA, IC_pAGo, FORMA_PAGAMENTO, QNT_VEZES, VL_TOTAL, VL_PAGO)
VALUES
(1, 17, '2026-03-03 10:00', 1, 'PIX', 1, 350.00, 350.00),
(2, 17, '2026-03-04 12:00', 1, 'Credito', 2, 150.00, 150.00)
 
INSERT INTO CONSULTA_TIPO_SERVICO(CD_CONSULTA, CD_TIPO_SERVICO, VL_SERVICO)
VALUES
(19, 5, 350.00),
(20, 3, 150.00)