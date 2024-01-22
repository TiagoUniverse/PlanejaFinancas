
/**
* ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
* ║ 1-                                          Usuario	    	       	                                          ║
* ╚═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╝
*
* ┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ @description: All the users from the system		                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

Create table Usuario (
id 			INT  NOT NULL PRIMARY KEY  AUTO_INCREMENT,
nome		VARCHAR(300) 	NOT NULL,
email	VARCHAR(300)	NOT NULL, 
senha VARCHAR(300) NOT NULL,
status 	VARCHAR(300) 	NOT NULL DEFAULT 'ATIVO' ,
created	DATETIME NOT NULL  DEFAULT NOW(),
updated DATETIME NULL

);

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ INSERT INTO										                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/
insert into usuario (nome, email, senha) values ('Tiago', 'tiagocesar68@gmail.com',  sha1('tiago123')    ) ;

Select * from Usuario where email = 'teste@gmail.com' and senha = sha1( 'teste123' );


/**
* ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
* ║ 2-                                         Status_despensas                          	                      ║
* ╚═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╝
*
* ┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ @description: Status from a specific "despensa"	                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

Create table Status_despensas (
id 			INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome		VARCHAR(300) 	NOT NULL,
descricao	VARCHAR(300) 	NOT NULL,
created	DATETIME NOT NULL DEFAULT NOW()

);

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ INSERT INTO										                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/
INSERT INTO status_despensas (nome, descricao)
VALUES
  ('Despensas: Entrada da casa' , ''),
  ('Despensas: Saida da casa' , ''),
  ('Despensas: Entrada dos gastos pessoais' , ''),
  ('Despensas: Saída dos gastos pessoais' , ''),
  ('Poupanca: Entrada da casa' , ''),
  ('Poupanca: Saida da casa' , ''),
  ('Despensas: Entrada dos gastos pessoais' , ''),
  ('Despensas: Saída dos gastos pessoais' , '');

/**
* ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
* ║ 3-                                         Status_mes		                          	                      ║
* ╚═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╝
*
* ┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ @description: The month from the year			                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

Create table Status_mes (
id 			INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome		VARCHAR(300) 	NOT NULL,
created	DATETIME NOT NULL DEFAULT NOW()

);

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ INSERT INTO										                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

INSERT INTO status_mes (nome)
VALUES
  ('Janeiro'),
  ('Fevereiro'),
  ('Marco'),
  ('Abril'),
  ('Maio'),
  ('Junho'),
  ('Julho'),
  ('Agosto'),
  ('Setembro'),
  ('Outubro'),
  ('Novembro'),
  ('Dezembro');

/**
* ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
* ║ 4-                                         Tipo_despensas 	                          	                      ║
* ╚═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╝
*
* ┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ @description: Category of a "despensa"			                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

Create table tipo_despensas (
id 			INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome		VARCHAR(300) 	NOT NULL,
descricao 	VARCHAR(300) 		NULL,
created	DATETIME NOT NULL DEFAULT NOW()
);

/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ INSERT INTO										                                                              │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

INSERT INTO tipo_despensas (nome, descricao)
VALUES
  ('Mercado', 'Uma das categorias de classificação das despensas'),
  ('Transporte', 'Uma das categorias de classificação das despensas'),
  ('TV / Internet / telefone', 'Uma das categorias de classificação das despensas'),
  ('Lazer', 'Uma das categorias de classificação das despensas'),
  ('Comida fora ou Ifood', 'Uma das categorias de classificação das despensas'),
  ('Saúde e Beleza', 'Uma das categorias de classificação das despensas'),
  ('Moradia', 'Uma das categorias de classificação das despensas'),
  ('Roupas', 'Uma das categorias de classificação das despensas');



/**
* ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
* ║ 5-                                         Despensas		                          	                      ║
* ╚═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╝
*
* ┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ @description: Money spend and recieved in a specific date                                                     │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

Create table Despensas (
	id 					INT  			NOT NULL PRIMARY KEY AUTO_INCREMENT,
	descricao			VARCHAR(300) 	NOT NULL,
	valor				float			NOT NULL, 
	dataDespensa 		date 			NOT NULL,
	/* Ano vai ser usado pelo sistema  */
	ano     			VARCHAR(300) 	NOT NULL,
	quinzena 			VARCHAR(300) 	NOT NULL,
	status 				VARCHAR(300) 	NOT NULL DEFAULT 'ATIVO' ,
	created				DATETIME 		NOT NULL DEFAULT NOW(),
	updated 			DATETIME 			NULL,
    
	IdStatus_mes 		INT 			NOT NULL,
	idStatus_despensa 	INT 			NOT NULL,
	idUsuario 			INT 			NOT NULL,
	idTipoDespensa 		INT 			NOT NULL,

	FOREIGN KEY (IdStatus_mes) REFERENCES status_mes(id),
	FOREIGN KEY (idStatus_despensa) REFERENCES status_despensas(id) ,
	FOREIGN KEY (idUsuario) REFERENCES Usuario(id),
	FOREIGN KEY (idTipoDespensa) references tipo_despensas(id)

);


/*┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ SELECT																										  |
  | Description: Busca de despensa de gasto pessoais da quinzena 1 de janeiro/2023 								  │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/

Select * from despensas where status = "ATIVO" and ano = "2023"  and IdStatus_mes = "1" and quinzena = "Quinzena 01" and ( idStatus_despensa = 3 OR idstatus_despensa = 4 );


Select id, descricao, valor, DATE_FORMAT(dataDespensa, '%d/%m/%Y') as dataDespensa, ano, quinzena, IdStatus_mes, idTipoDespensa from despensas where status = 'ATIVO' 
and IdStatus_mes = '4'  and ano = '2023'  and ( idstatus_despensa = 4 )  and idUsuario = '1'   Order By month(dataDespensa);


/**
* ╔═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╗
* ║ 6-                                         Poupancas		                          	                      ║
* ╚═══════════════════════════════════════════════════════════════════════════════════════════════════════════════╝
*
* ┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────┐
* │ @description: Register of the money saved in the bank	                                                      │
* └───────────────────────────────────────────────────────────────────────────────────────────────────────────────┘
*/
Create table poupancas (
id 				INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
descricao		VARCHAR(300) 	NOT NULL DEFAULT '',
valor			float	 	    NOT NULL,
dataPoupanca	DATE 	        NOT NULL ,
ano				VARCHAR(300) 	NOT NULL DEFAULT '',
status			VARCHAR(300) 	NOT NULL DEFAULT 'ATIVO',
created			DATETIME	 	NOT NULL default NOW(),
updated			DATETIME 			NULL,

idUsuario INT NOT NULL,
idStatus_despensa INT NOT NULL,

Foreign key (idUsuario) references Usuario(id) ,
FOREIGN KEY (idStatus_despensa) references Status_despensas(id)

);


