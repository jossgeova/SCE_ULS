-- Active: 1727755647211@@127.0.0.1@3306@sys_poo
DROP DATABASE sys_poo; -- Eliminar la Base de datos
CREATE DATABASE sys_poo;
USE sys_poo;
CREATE TABLE usuarios(
    idusuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL,
    passw TEXT,
    estado INT,
    tipo INT
);
-- Usuario = admin Contraseña = 1234
INSERT INTO usuarios (usuario,passw,tipo,estado) VALUES('admin','$2y$10$pBk0gY3hVllTKg1VKMgG2uCxrRsGEkuP6sEGu6g03fIAEqk97q3J2',1,1);

CREATE TABLE categorias(
    idcategoria INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(50) NOT NULL,
    estado INT
);

CREATE TABLE ubicaciones(
    idubicacion INT PRIMARY KEY AUTO_INCREMENT,
    ubicacion VARCHAR(50) NOT NULL,
    estado INT
);


CREATE Table equipos(
    idequipo INT PRIMARY KEY AUTO_INCREMENT,
    equipo TEXT NOT NULL,
    serie TEXT,
    modelo TEXT,    
    idcategoria INT,
    idubicacion INT,
    estado INT,
    idusuario INT
);

