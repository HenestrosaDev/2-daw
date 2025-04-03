DROP DATABASE IF EXISTS dwes_distancia_2122;

CREATE DATABASE dwes_distancia_2122;

USE dwes_distancia_2122;

CREATE TABLE libro (
    id INTEGER,
    titulo VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    CONSTRAINT PK_libro PRIMARY KEY (id)
);

INSERT INTO libro VALUES ('1', 'Don Quijote de la Mancha', 'Miguel de Cervantes', '14.15');
INSERT INTO libro VALUES ('2', 'Historia de dos ciudades', 'Charles Dickens', '13.30');
INSERT INTO libro VALUES ('3', 'El Señor de los Anillos', 'J. R. R. Tolkien', '31.42');
INSERT INTO libro VALUES ('4', 'Harry Potter y la piedra filosofal', 'J.K. Rowling', '12.35');
INSERT INTO libro VALUES ('5', 'El principito', 'Antoine de Saint-Exupéry', '6.60');