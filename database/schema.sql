CREATE DATABASE gestion_personnes;

USE gestion_personnes;

CREATE TABLE personnes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    photo LONGBLOB NOT NULL,
    photo_type VARCHAR(50) NOT NULL
);