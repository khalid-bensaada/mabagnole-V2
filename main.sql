CREATE DATABASE mabagnol ;

USE mabagnol ;


CREATE TABLE client (
	id INT  AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR (150) NOT NULL,
    email VARCHAR (150) NOT NULL,
    password_C VARCHAR (150) NOT NULL,
    role ENUM('client','admin') DEFAULT 'client',
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE categorie (
    id_c INT AUTO_INCREMENT PRIMARY KEY ,
    name_c VARCHAR (150) NOT NULL ,
    description TEXT 
);

CREATE TABLE vehicule (
	id_v INT AUTO_INCREMENT PRIMARY KEY,
    catecorie_id INT NOT NULL ,
    modele VARCHAR(150) NOT NULL ,
    prix float NOT NULL ,
    disponibilite BOOLEAN DEFAULT TRUE, 
    description_v TEXT ,
    created_v TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    FOREIGN KEY (catecorie_id) REFERENCES categorie(id_c)
);

USE mabagnol;

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    lieu_prise VARCHAR(150),
    statut ENUM('confirmée', 'annulée') DEFAULT 'confirmée',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (vehicule_id)REFERENCES vehicule(id_v)
);

CREATE TABLE avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    deleted_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id_v)
);

INSERT INTO client(name ,email ,password_C ,role)
VALUES ('khalid','khalidben@gmail.com','khalid','admin');