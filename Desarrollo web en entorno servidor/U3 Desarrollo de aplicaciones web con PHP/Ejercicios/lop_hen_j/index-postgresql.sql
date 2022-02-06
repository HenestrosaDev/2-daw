/*

José Carlos López Henestrosa
https://henestrosaconh.com

*/


/* ---------------------------------------------
Contents table
------------------------------------------------
01. app_user
-- 5. PIZZERIA
02. pizza_type
03. ingredient
04. command
05. command_line
--------------------------------------------- */


/* 
---------------------------------------------
01. app_user
--------------------------------------------- 
*/
DROP TABLE IF EXISTS app_user;

CREATE TABLE app_user (
	id 						SERIAL 				UNIQUE,
	username 			VARCHAR(20) 	NOT NULL UNIQUE,
  user_password	VARCHAR(256)	NOT NULL,
	is_active 		BIT 					NOT NULL DEFAULT '1',
	user_role	 		CHAR 					NOT NULL DEFAULT 'U', -- 'A' Admin / 'U' User
	CONSTRAINT pk_user PRIMARY KEY (id, username)
);

-- LAS CONTRASEÑAS SON: '1234'
INSERT INTO app_user (username, user_password, is_active, user_role)
VALUES 
	('admin', '$argon2id$v=19$m=65536,t=4,p=1$NjhOUUVzMjdPSjZ5b3dMcQ$CaTBaRw1dLUEhgvf7P4AE59cFRsx4/yG1yfzsgrrMeM', '1', 'A'),
	('user', '$argon2id$v=19$m=65536,t=4,p=1$NjhOUUVzMjdPSjZ5b3dMcQ$CaTBaRw1dLUEhgvf7P4AE59cFRsx4/yG1yfzsgrrMeM', '1', 'U');
	

/* 
---------------------------------------------
02. pizza_type
--------------------------------------------- 
*/
DROP TABLE IF EXISTS pizza_type;

CREATE TABLE pizza_type (
	id 							SERIAL				UNIQUE,
	name_for_client	VARCHAR(32) 	NOT NULL DEFAULT '',
	ingredients   	VARCHAR(128)  NOT NULL DEFAULT '',
  price						DECIMAL(3,2)	NOT NULL DEFAULT 0,
	image_path			VARCHAR(256)	NOT NULL DEFAULT '',
	CONSTRAINT pk__pizza_type PRIMARY KEY (id)
);

INSERT INTO pizza_type (name_for_client, ingredients, price, image_path)
VALUES 
	('Barbacoa', 'Queso, tomate y jamón york.', 5.75, './img/specialities/bbq.jpg'),
	('De la Huerta', 'Queso, tomate, aceitunas negras, pimiento verde, pimiento rojo, cebolla y champiñones.', 8.75, './img/specialities/from-orchard.jpg'),
	('Carbonara', 'Queso, tomate, jamón york y champiñones.', 6.55, './img/specialities/carbonara.jpg'),
	('Hawaiiana', 'Queso, tomate, jamón york y piña.', 6.55, './img/specialities/hawaiian.jpg'),
	('Pepperoni', 'Queso, tomate, jamón york y pepperoni.', 5.75, './img/specialities/pepperoni.jpg');


/* 
---------------------------------------------
03. ingredient
--------------------------------------------- 
*/
DROP TABLE IF EXISTS ingredient;

CREATE TABLE ingredient (
	id 								SERIAL				UNIQUE,
	name_for_client 	VARCHAR(32) 	NOT NULL DEFAULT '',
  price							DECIMAL(3,2)	NOT NULL DEFAULT 0.80,
	image_path				VARCHAR(256)	NOT NULL DEFAULT '',
	CONSTRAINT pk__ingredient PRIMARY KEY (id)
);

INSERT INTO ingredient (name_for_client, image_path)
VALUES 
	('Anchoas', './img/ingredients/anchovies.png'),
	('Bacon', './img/ingredients/bacon.png'),
	('Aceitunas negras', './img/ingredients/black-olives.png'),
	('Queso', './img/ingredients/cheese.png'),
	('Pimiento verde', './img/ingredients/green-pepper.png'),
	('Cebolla', './img/ingredients/onion.png'),
	('Jamón serrano', './img/ingredients/serrano-ham.png'),
	('Atún', './img/ingredients/tuna.png'),
	('Jamón york', './img/ingredients/york.png');

/* 
---------------------------------------------
04. command
--------------------------------------------- 
*/
DROP TABLE IF EXISTS command;

CREATE TABLE command (
	id 						SERIAL				UNIQUE,
	app_user_id	 	INT 					NOT NULL,
	price					DECIMAL(4,2)	NOT NULL,
	CONSTRAINT pk__command PRIMARY KEY (id),
	CONSTRAINT fk__command__app_user
		FOREIGN KEY (app_user_id)
		REFERENCES app_user (id)
);

/* 
---------------------------------------------
05. command_line
--------------------------------------------- 
*/
DROP TABLE IF EXISTS command_line;

CREATE TABLE command_line (
	id 						SERIAL				UNIQUE,
	command_id		INT						NOT NULL,
	pizza_type_id	INT,
	/*
	 * En caso de que sea 'a tu gusto', 
	 * le atribuimos un id al ingredient.
	 * Es de tipo VARCHAR ya que, si se tratan
	 * de varios ingredientes, los separamos
	 * por una ','
	 *
	 */
	ingredient_id	VARCHAR(64)		DEFAULT '',
  price					DECIMAL(4,2)	NOT NULL DEFAULT 0.80,
	size					CHAR					NOT NULL DEFAULT 'M',
	CONSTRAINT pk__command_line PRIMARY KEY (id),
	CONSTRAINT fk__command_line__command
		FOREIGN KEY (command_id)
		REFERENCES command (id)
);