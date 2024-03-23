CREATE DATABASE shopDigital;

USE shopDigital;

CREATE TABLE person (
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30),
    password VARCHAR(25),
    image VARCHAR(200),
    email VARCHAR(25),
    rol VARCHAR(1),
    status BOOLEAN
);
CREATE TABLE publicacion (
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30),
    description VARCHAR(60),
    image VARCHAR(60),
    id_person INT(8),
    status VARCHAR(1),
    type VARCHAR(1),
    price float(4,4),
    FOREIGN KEY (`id_person`) REFERENCES person(`id`) ON UPDATE CASCADE
);