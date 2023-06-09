--------------------------------------------------------------------------------------------------------
-- CRIAR O BANCO DE DADOS
-----------------------------------------------------------------------------------------------------------
Create database hospitalBD
go

------------------------------------------------------------------------------------------------------------
-- ACESSAR O BANCO DE DADOS
------------------------------------------------------------------------------------------------------------
use hospitalBD
go

------------------------------------------------------------------------------------------------------------
-- MODELO FÍSICO - CRIAR AS TABELAS
-- TABELA PESSOAS
------------------------------------------------------------------------------------------------------------
create table Pessoas --aTUALIZAR NO PADRAO DO IGOR
(
	idPessoa	int			not null	primary key		identity,
	nome		varchar(50)	not null
)

------------------------------------------------------------------------------------------------------------
-- TABELA TELEFONES
------------------------------------------------------------------------------------------------------------
create table Telefones
(
	idPessoa	int				not null,
	numero		int				not null,
	primary key (idPessoa, numero),		--chave composta - permite que uma pessoa tenha mais de um número
	foreign key	(idPessoa)		references Pessoas(idPessoa)	-- chave estrangeira
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA ESPECIALIDADES
------------------------------------------------------------------------------------------------------------
create table Especialidades
(
	idEsp		int				not null	primary key		identity,
	nomeEsp		varchar(100)	not null
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA MÉDICOS
------------------------------------------------------------------------------------------------------------
create table Medicos
(
	idMedico	int			not null	primary key		identity,
	nome		varchar(50)	not null,
	CRM			int			not null	unique
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA Médicos e Especialidades
------------------------------------------------------------------------------------------------------------
create table Medicos_Especilidades
(
	-- Médico pode ter mais de uma especialidade e uma especilidade pode ser de vários médicos. 
	-- Portanto precisa relacionar as duas tabelas
	idMed		int		not null	references Medicos(idMed),
	idEsp		int		not null	references Especialidades(idEsp),
	primary key(idMed, idEsp)
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA PLANOS DE SAUDE
------------------------------------------------------------------------------------------------------------
create table Planos
(
	idPlano	int			not null	primary key		identity,
	nome		varchar(50)	not null,
	cnpj		varchar(15)	not null	unique,
	operadora	varchar(50)	not null
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA MÉDICOS ATENDEM PLANOS
------------------------------------------------------------------------------------------------------------
create table Medicos_Atendem_Planos
(
	-- um médico pode atender um ou mais planos e um plano tem vários médicos credenciados
	idMed		int			not null,
	idPlano		int			not null,
	primary key(idMed, idPlano),
	foreign key	(idMed)		references Medicos(idMed),
	foreign key	(idPlano)	references Planos(idPlano)
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA PACIENTES
------------------------------------------------------------------------------------------------------------
create table Pacientes
(
	idPaciente	int			not null	primary key		identity,
	nome		varchar(50)	not null,
	cpf			varchar(15)	not null	unique,
	idPlano		int				null,	-- nem todo paciente tem plano de saúde
	foreign key	(idPlano)	references	Planos(idPlano)	
)
go

------------------------------------------------------------------------------------------------------------
-- TABELA ATENDIMENTOS
------------------------------------------------------------------------------------------------------------
create table Atendimentos
(
	idAtend		int			not null	primary key		identity,
	data		date		not null,
	hora		time		not null,
	idPac		int			not null	references		Pacientes(idPac),
	idMed		int			not null	references		Medicos(idMed),
	idPlano		int				null	references		Planos(idPlano)
)
go

------------------------------------------------------------------------------------------------------------
-- a)inserção de dados em cada uma das tabelas, pelo menos 5registro por tabela.
------------------------------------------------------------------------------------------------------------
INSERT INTO Pessoas (nome)
values ('Ester Brito'), 
		('Isabel Silva'),
		('Kauan Borges'),
		('Vitor Dumbra'),
		('Vitor Brito'),
		('Dr Rubens'),
		('Dra Thalita'),
		('Dr Carlos'),
		('Dra Carla'),
		('Dra Luana'),
		('Hapvida'),
		('Unimed'),
		('Santa Casa'),
		('Bradesco'),
		('HBSaude'),
		('Enfermeira Maria'),
		('Enfermeira Marta'),
		('Enfermeira Mirna'),
		('Enfermeira Muria'),
		('Enfermeira Miste')
go

SELECT * FROM Pessoas

INSERT INTO Telefones (idPessoa, numero)
values (1, 75667876),
	(2, 36567876),
	(3, 34567876),
	(4, 26567876),
	(5, 34667876)
	
INSERT INTO Telefones (idPessoa, numero)
values (11, 75667476),
	(12, 36569876),
	(13, 34568876),
	(14, 26564876),
	(15, 34665876)
	
SELECT * FROM Telefones

SELECT * FROM Telefones INNER JOIN Pessoas ON Telefones.idPessoa = Pessoas.idPessoa 
	
INSERT INTO Especialidades (nomeEsp)
	values
	('Pediatria'),
	('Oftalmologia'),
	('Geriatria'),
	('Psiquiatria'),
	('Ginecologia')
	
select * FROM Especialidades
	
INSERT INTO Medicos (idMed, CRM)
	values
	(6, 145675),
	(7, 165672),
	(8, 198757),
	(9, 165479),
	(10, 198957)
	
INSERT INTO Pessoas 
	VALUES
	('Dr Estranho')

INSERT INTO Medicos (idMed, CRM)
	VALUES
	(21, 97647)
	
select * FROM  Medicos

select * from Medicos INNER JOIN Pessoas ON Medicos.idMed = Pessoas.idPessoa 
	
INSERT INTO Medicos_Especilidades(idMed, idEsp)
	values
	(6, 1),
	(7, 2),
	(8, 3),
	(9, 4),
	(10, 5)

select * FROM Medicos_Especilidades 

select * FROM  Medicos_Especilidades INNER JOIN Pessoas ON Medicos_Especilidades.idMed = Pessoas.idPessoa 

	
INSERT INTO Planos (idPlano, cnpj, operadora)
	values
	(11, 9876543212234, 'Hapvida'),
	(12, 9676543212234, 'Unimed'),
	(13, 9576543212234, 'Hapvida'),
	(14, 9476543212234, 'BemSaude'),
	(15, 9376543212234, 'Hapvida')
	
	select * FROM Planos
	
	
INSERT INTO Medicos_Atendem_Planos (idMed, idPlano)
	values
	(6,11),
	(7,12),
	(8,13),
	(9,14),
	(10,15)
	
		select * FROM Medicos_Atendem_Planos
	
INSERT INTO Pacientes (idPac, cpf, idPlano)
	values
	(1, 1543689875, 11),
	(2, 2543689875, 12),
	(3, 3543689875, 13),
	(4, 4543689875, 14),
	(5, 5543689875, 15)
	
INSERT INTO Atendimentos (data, hora, idPac, idMed, idPlano)
	values
	(getdate(), current_TIMESTAMP, 1, 6, 11),
	(getdate(), current_TIMESTAMP, 2, 7, 12),
	(getdate(), current_TIMESTAMP, 3, 8, 13),
	(getdate(), current_TIMESTAMP, 4, 9, 14),
	(getdate(), current_TIMESTAMP, 5, 10, 15)
	
	select * FROM Atendimentos
	
INSERT INTO Alas (nome)
	values
	('Azul'),
	('Branca'),
	('Verde'),
	('Vermelha'),
	('Rosa')
	
	SELECT * FROM Alas
	

	
INSERT INTO Enfermeiros (idEnf, CRE, idAla)
	values
	(16, 23456, 1),
	(17, 23454, 2)
	
INSERT INTO Enfermeiros (idEnf, CRE, idChefe , idAla )
values
	(18, 76547, 16, 3),
	(19, 76447, 16, 4),
	(20, 85472, 17, 5)
	
	
	SELECT * FROM Enfermeiros INNER JOIN Pessoas ON Enfermeiros.idEnf = Pessoas.idPessoa
	
	SELECT * FROM Medicos INNER JOIN Pessoas ON Medicos.idMed = Pessoas.idPessoa 

	SELECT * FROM Planos inner join Pessoas on Planos.idPlano = Pessoas.idPessoa 
------------------------------------------------------------------------------------------------------------
-- b)Consultar os telefones dos planos de saúde e suas operadoras.Saída: os dados do plano de saúde e os telefones e as operadoras.
------------------------------------------------------------------------------------------------------------
SELECT Pessoas.nome, Planos.cnpj, Planos.operadora, Telefones.numero 
FROM Planos INNER JOIN Pessoas ON Pessoas.idPessoa = Planos.idPlano 
LEFT JOIN Telefones ON Planos.idPlano = Telefones.idPessoa 


------------------------------------------------------------------------------------------------------------
-- c)Consulte todos os médicos e suas especialidades. Saída: dados dos médicos e suas especialidades
------------------------------------------------------------------------------------------------------------
Select Pessoas.nome, Medicos.CRM, Especialidades.nomeEsp 
FROM Medicos_Especilidades INNER JOIN Medicos ON Medicos_Especilidades.idMed  = Medicos.idMed 
INNER JOIN Especialidades ON Medicos_Especilidades.idEsp = Especialidades.idEsp 
INNER JOIN Pessoas ON Medicos.idMed  = Pessoas.idPessoa 


------------------------------------------------------------------------------------------------------------
-- d)Consulte todos os médicos e qual plano de saúde está credenciado. Saída: dados do médico e do plano de saúde.
------------------------------------------------------------------------------------------------------------
SELECT pessoaMedico.nome, Medicos.CRM, pessoaPlano.nome, planos.cnpj, planos.operadora 
FROM Medicos_Atendem_Planos INNER JOIN Medicos ON Medicos_Atendem_Planos.idMed  = Medicos.idMed 
INNER JOIN Planos ON Medicos_atendem_planos.idPlano = Planos.idPlano 
INNER  JOIN Pessoas as pessoaMedico ON pessoaMedico.idPessoa = Medicos.idMed 
INNER  JOIN Pessoas as pessoaPlano on pessoaPlano.idPessoa = planos.idPlano



------------------------------------------------------------------------------------------------------------
-- e)Consultar atendimentos  realizados,  quais  pacientes  e  médicos  estão  envolvidos.  Saída:  no.  da  consulta,  data,  nome  do  paciente  e  do médico, qual plano de saúde.
------------------------------------------------------------------------------------------------------------
SELECT Atendimentos.idAtend as numeroDaConsulta, atendimentos.[data], pessoaPaciente.nome AS Paciente, pessoaMedico.nome AS Medico , pessoaPlano.nome as Plano
FROM Atendimentos INNER JOIN Pacientes ON Atendimentos.idPac  = Pacientes.idPac 
INNER JOIN Medicos ON Atendimentos.idMed = Medicos.idMed 
INNER JOIN Planos ON Atendimentos.idPlano = Planos.idPlano
INNER  JOIN Pessoas as pessoaMedico ON pessoaMedico.idPessoa = Medicos.idMed 
INNER  JOIN Pessoas as pessoaPlano on pessoaPlano.idPessoa = planos.idPlano
INNER  JOIN Pessoas as pessoaPaciente on pessoaPaciente.idPessoa = pacientes.idPac 


------------------------------------------------------------------------------------------------------------
-- f)Consultartodos os médicos que não realizaram consultas. Saída: dados do médico.
------------------------------------------------------------------------------------------------------------

SELECT pessoaMedico.nome, Medicos.CRM 
FROM Medicos INNER  JOIN Pessoas as pessoaMedico ON pessoaMedico.idPessoa = Medicos.idMed 
WHERE Medicos.idMed not in (SELECT idMed from Atendimentos)



------------------------------------------------------------------------------------------------------------
-- g)Consulte as enfermeiras e as alas que elas atendem. Saída: dados das enfermeiras, enfermeira-chefe e dados da ala que cada enfermeira atende
------------------------------------------------------------------------------------------------------------
SELECT Pessoas.nome as Nome, Enfermeiros.CRE, pessoaEnfermeiraChefe.nome as Enfermeira_chefe, alas.nome 
FROM Enfermeiros INNER JOIN Alas on Enfermeiros.idAla = Alas.idAla 
INNER JOIN Pessoas ON Enfermeiros.idEnf = Pessoas.idPessoa 
LEFT JOIN Pessoas as pessoaEnfermeiraChefe ON enfermeiros.idChefe = pessoaEnfermeiraChefe.idPessoa 


------------------------------------------------------------------------------------------------------------
-- h)Consulte todos os atendimentos realizados na data de hoje. Saída: dados do médico, paciente e plano de saúde.
------------------------------------------------------------------------------------------------------------
SELECT *
FROM Atendimentos WHERE [data] =CONVERT(date, GETDATE() )