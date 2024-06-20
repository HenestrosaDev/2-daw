/*

José Carlos López Henestrosa
https://henestrosa.dev

*/


/* ---------------------------------------------
Contents table
------------------------------------------------
01. database
02. user
-- 1_test
03. quiz
04. question
05. question_answer
06. attempt
07. attempt_answer
08. quiz_statistic
09. trigger
-- 2_reservas
10. booking
-- 3_pizzeria
--------------------------------------------- */

/* 
---------------------------------------------
01. Database
--------------------------------------------- 
*/
/*DROP DATABASE IF EXISTS dwes_tarea_02;
CREATE DATABASE dwes_tarea_02;*/

/* 
---------------------------------------------
02. app_user
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


/* ---------------- 1_test ---------------- */


/* 
---------------------------------------------
03. quiz
--------------------------------------------- 
*/
DROP TABLE IF EXISTS quiz;

CREATE TABLE quiz (
	id 						SERIAL 			UNIQUE,
	title 				VARCHAR(75) NOT NULL,
	total_score		SMALLINT 		NOT NULL DEFAULT 10,
	max_attempts	SMALLINT		NOT NULL DEFAULT 3,
	CONSTRAINT pk_quiz PRIMARY KEY (id)
);

INSERT INTO quiz (id, title) VALUES (1, 'Examen unidad 2');

/* 
---------------------------------------------
04. question
--------------------------------------------- 
*/
DROP TABLE IF EXISTS question;

CREATE TABLE question (
	id 				SERIAL 		UNIQUE,
	quiz_id		INT 			NOT NULL,
	content		TEXT 			NOT NULL,
	score 		SMALLINT 	NOT NULL DEFAULT 1,
	kind			CHAR			NOT NULL DEFAULT 'R', -- 'R' Radio / 'C' Checkbox
	CONSTRAINT pk_question PRIMARY KEY (id),
	CONSTRAINT fk_question__quiz 
		FOREIGN KEY (quiz_id)
		REFERENCES quiz (id)
);

INSERT INTO question (id, quiz_id, content, kind)
VALUES 
	(1, 1, 'Si al utilizar PDO, intentas comenzar una transacción con un motor de almacenamiento que no las soporta, obtendrás un error. ¿Verdadero o falso?', DEFAULT),
	(2, 1, 'Con la extensión PDO, para obtener un array a partir de un conjunto de resultados debes utilizar:', DEFAULT),
	(3, 1, 'Se debe configurar PDO para que cuando se produzca un error genere excepciones utilizando el manejador base de PHP, Exception. ¿Verdadero o falso?', DEFAULT),
	(4, 1, 'Si usas la extensión nativa MySQLi, se pueden utilizar transacciones sobre el motor de almacenamiento MyISAM, pero esto nunca es posible con la extensión PDO. ¿Verdadero o falso?', DEFAULT),
	(5, 1, 'Para configurar los niveles de error de los que debe notificar PHP, debes utilizar el parámetro _____ del fichero php.ini.', DEFAULT),
	(6, 1, 'Al acabar una conexión mediante la extensión MySQLi, se debe ejecutar el método close para liberar los recursos que utiliza. ¿Verdadero o falso?', DEFAULT),
	(7, 1, '¿Dónde se realiza la configuración de MySQLi?', DEFAULT),
	(8, 1, 'Mediante la función set_error_handler es posible personalizar el comportamiento de PHP cuando se produce un error, sea cual sea su nivel. ¿Verdadero o falso?', DEFAULT),
	(9, 1, '¿Cuál es el fichero de configuración de MySQL?', DEFAULT),
	(10, 1, 'Con la extensión MySQLi, para obtener un array a partir de un conjunto de resultados debes utilizar', 'C');

/* 
---------------------------------------------
05. question_answer
--------------------------------------------- 
*/
DROP TABLE IF EXISTS question_answer;

CREATE TABLE question_answer (
	id 					SERIAL	UNIQUE,
	quiz_id			INT 		NOT NULL,
	question_id	INT			NOT NULL,
	content			TEXT 		NOT NULL,
	is_correct	BIT			NOT NULL DEFAULT '0',
	CONSTRAINT pk_question_answer PRIMARY KEY (id),
	CONSTRAINT fk_question_answer__quiz 
		FOREIGN KEY (quiz_id)
		REFERENCES quiz (id),
	CONSTRAINT fk_question_answer__question
		FOREIGN KEY (question_id)
		REFERENCES question (id)
);

INSERT INTO question_answer (quiz_id, question_id, content, is_correct)
VALUES 
	(1, 1, 'Verdadero', DEFAULT),
	(1, 1, 'Falso', '1'),
	(1, 2, 'el método fetch_assoc', DEFAULT),
	(1, 2, 'el método fetch_array', DEFAULT),
	(1, 2, 'el método fetch', '1'),
	(1, 2, 'el método fetch_row', DEFAULT),
	(1, 3, 'Verdadero', DEFAULT),
	(1, 3, 'Falso', '1'),
	(1, 4, 'Verdadero', DEFAULT),
	(1, 4, 'Falso', '1'),
	(1, 5, 'display_errors', DEFAULT),
	(1, 5, 'error_notice', DEFAULT),
	(1, 5, 'error_reporting', '1'),
	(1, 5, 'show_errors', DEFAULT),
	(1, 6, 'Verdadero', '1'),
	(1, 6, 'Falso', DEFAULT),
	(1, 7, 'en el fichero httpd.conf', DEFAULT),
	(1, 7, 'en el fichero mysqli.conf', DEFAULT),
	(1, 7, 'en el fichero php.ini', '1'),
	(1, 7, 'en el fichero my.ini', DEFAULT),
	(1, 8, 'Verdadero', '1'),
	(1, 8, 'Falso', DEFAULT),
	(1, 9, 'Se configura en el mismo fichero que Apache, httpf.conf', DEFAULT),
	(1, 9, 'Se configura en el mismo fichero que PHP, php.ini', DEFAULT),
	(1, 9, 'my.cnf', '1'),
	(1, 9, 'my.ini', DEFAULT),
	(1, 10, 'el método fetch_assoc', '1'),
	(1, 10, 'el método fetch_array', '1'),
	(1, 10, 'el método fetch', DEFAULT),
	(1, 10, 'el método fetch_row', '1');
	
/* 
---------------------------------------------
06. attempt
--------------------------------------------- 
*/
DROP TABLE IF EXISTS attempt;

CREATE TABLE attempt(
	id					SERIAL				UNIQUE,
	app_user_id INT						NOT NULL,
	quiz_id			INT						NOT NULL,
	/*answers			VARCHAR(100)	NOT NULL,*/
	score 			SMALLINT 			NOT NULL,
	attempt_no	SMALLINT 			NOT NULL,
	CONSTRAINT pk_attempt 	PRIMARY KEY (id),
	CONSTRAINT fk_attempt__user
		FOREIGN KEY (app_user_id)
		REFERENCES app_user (id),
	CONSTRAINT fk_attempt__quiz
		FOREIGN KEY (quiz_id)
		REFERENCES quiz (id)
);

/* 
---------------------------------------------
07. attempt_answer
--------------------------------------------- 
*/
DROP TABLE IF EXISTS attempt_answer;

CREATE TABLE attempt_answer (
	id									SERIAL 	UNIQUE,
	attempt_id					INT			NOT NULL,
	question_id					INT			NOT NULL,
	question_answer_id	INT			NOT NULL,
	CONSTRAINT pk_attempt_answer PRIMARY KEY (id),
	CONSTRAINT fk_attempt_answer__attempt
		FOREIGN KEY (attempt_id)
		REFERENCES attempt (id),
	CONSTRAINT fk_attempt_answer__question
		FOREIGN KEY (question_id)
		REFERENCES question (id),	
	CONSTRAINT fk_attempt_answer__question_answer
		FOREIGN KEY (question_answer_id)
		REFERENCES question_answer (id)
);

/* 
---------------------------------------------
08. Statistic
--------------------------------------------- 
*/
DROP TABLE IF EXISTS quiz_statistic;

CREATE TABLE quiz_statistic(
	average							SMALLINT	NOT NULL DEFAULT 0,
	mode_statistic			SMALLINT 	NOT NULL DEFAULT 0,
	variance 						SMALLINT	NOT NULL DEFAULT 0,
	standard_deviation	SMALLINT	NOT NULL DEFAULT 0
);

INSERT INTO quiz_statistic VALUES (DEFAULT, DEFAULT, DEFAULT, DEFAULT);

/* 
---------------------------------------------
09. Trigger for updating the quiz_statistic table
--------------------------------------------- 
*/
CREATE OR REPLACE FUNCTION update_statistic()
  RETURNS trigger AS
$BODY$
BEGIN
  UPDATE quiz_statistic
		SET 
			average = (SELECT ROUND(AVG(score)::numeric, 2) FROM attempt),
			mode_statistic =	(
				SELECT score
					FROM (
					SELECT score
						FROM attempt
						GROUP BY score
						LIMIT 1
					) T
			),
			variance = (SELECT COALESCE(ROUND(VARIANCE(score)::numeric, 2), 0) FROM attempt),
			standard_deviation = (SELECT COALESCE(ROUND(STDDEV(score)::numeric, 2), 0) FROM attempt);
RETURN NEW;
END;
$BODY$

LANGUAGE plpgsql VOLATILE -- Says the function is implemented in the plpgsql language; VOLATILE says the function has side effects.
COST 100;

DROP TRIGGER IF EXISTS tr_attempt_ai ON attempt;

CREATE TRIGGER tr_attempt_ai
  AFTER INSERT ON attempt FOR EACH ROW 
  EXECUTE PROCEDURE update_statistic();

/* ---------------- 2_reservas ---------------- */


/* 
---------------------------------------------
10. car
--------------------------------------------- 
*/
DROP TABLE IF EXISTS car;

CREATE TABLE car(
	id					SERIAL 				UNIQUE,
	model 			VARCHAR(100)	NOT NULL UNIQUE,
	price				SMALLINT			NOT NULL DEFAULT 0,
	image_name	VARCHAR(256)	NOT NULL DEFAULT '',
	CONSTRAINT pk_car PRIMARY KEY (id, model)
);

INSERT INTO car (model, price, image_name)
VALUES 
	('Audi Quattro', 100, 'https://cdn3.gcdata.gr/c3/p_1920_1735621.jpg'),
	('BMW M3 E64', 40, 'https://cdn.autobild.es/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2020/09/bmw-m3-e46-laguna-blue-2052303.jpg?itok=iJvuCsd7'),
	('Koenigsegg CCX', 4500, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Koenigsegg_CCX_-_Flickr_-_Alexandre_Pr%C3%A9vot_%2811%29.jpg/1200px-Koenigsegg_CCX_-_Flickr_-_Alexandre_Pr%C3%A9vot_%2811%29.jpg'),
	('Ferrari Testarossa', 500, 'https://img.motoryracing.com/noticias/portada/30000/30979-n.jpg'),
	('Mazda MX5 ND', 75, 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/2017_Mazda_MX-5_%28ND%29.jpg/1200px-2017_Mazda_MX-5_%28ND%29.jpg'),
	('Nissan GT-R (R34)', 2000, 'https://www.automobilesreview.com/img/2002-nissan-skyline-gt-r-r34/2002-nissan-skyline-gt-r-r34-04.jpg'),
	('Tesla Model 3', 120, 'https://thumbor.forbes.com/thumbor/fit-in/1200x0/filters%3Aformat%28jpg%29/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5fca67d3d350d8fde511e719%2F0x0.jpg'),
	('Porsche 911 Carrera 4 (1990)', 250, 'https://cdn2.mecum.com/auctions/fl0117/fl0117-277596/images/fl0117-277596_1.jpg?1483711931000'),
	('Toyota MR2 AW11', 30, 'https://live.staticflickr.com/7542/15593446133_edaa75c783_b.jpg'),
	('Mitsubishi Lancer Evolution X', 40, 'https://i.pinimg.com/originals/ca/a5/ff/caa5ff118d8e41ea093d1bec1876e5f2.jpg'),
	('Subaru Impreza WRX STI (2003)', 40, 'https://cdn.motor1.com/images/mgl/nJ2BG/s1/subaru-impreza-wrx-sti-modelljahr-2003.jpg'),
	('Toyota Supra MK3', 60, 'https://cdn.autobild.es/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2018/12/toyota-supra.jpg?itok=yXpYgxJj');

/* 
---------------------------------------------
11. booking
--------------------------------------------- 
*/
DROP TABLE IF EXISTS booking;

CREATE TABLE booking(
	id					SERIAL UNIQUE,
	app_user_id	INT 	NOT NULL,
	car_id			INT		NOT NULL,
	booked_from	DATE	NOT NULL,
	booked_to		DATE	NOT NULL,
	CONSTRAINT pk_booking PRIMARY KEY (id),
	CONSTRAINT fk_booking__user
		FOREIGN KEY (app_user_id)
		REFERENCES app_user (id),
	CONSTRAINT fk_booking__car
		FOREIGN KEY (car_id)
		REFERENCES car (id)
);