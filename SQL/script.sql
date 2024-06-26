CREATE DATABASE shopDigital;

USE shopDigital;

CREATE TABLE person (
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30),
    password VARCHAR(25),
    image VARCHAR(200),
    email VARCHAR(25),
    rol VARCHAR(1),
    status BOOLEAN,
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
CREATE TABLE compra(
    id_person INT(8) NOT NULL,
    id_public INT(8) NOT NULL,
    FOREIGN KEY (`id_person`) REFERENCES person(`id`) ON UPDATE CASCADE,
    FOREIGN KEY (`id_public`) REFERENCES publicacion(`id`) ON UPDATE CASCADE
);
CREATE TABLE report(
    id_person INT(8) NOT NULL,
    id_public INT(8) NOT NULL,
    coment VARCHAR(60),
    FOREIGN KEY (`id_person`) REFERENCES person(`id`) ON UPDATE CASCADE,
    FOREIGN KEY (`id_public`) REFERENCES publicacion(`id`) ON UPDATE CASCADE
);

CREATE TABLE bank (
    id_person INT(8) NOT NULL,
    money float(6,4) NOT NULL,
    cacao  float(6,4) NOT NULL,
    FOREIGN KEY (`id_person`) REFERENCES person(`id`) ON UPDATE CASCADE
);
CREATE TABLE value(
    id_publicacion INT(8) NOT NULL,
    points INT(1) NOT NULL,
    coment VARCHAR(40),
    id_public INT(8),
    FOREIGN KEY(`id_public`) REFERENCES publicacion(`id`) ON UPDATE CASCADE
);
