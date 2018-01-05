  DROP DATABASE IF EXISTS espace_database;
  CREATE DATABASE espace_database   DEFAULT CHARACTER SET utf8   DEFAULT COLLATE utf8_general_ci;
  
  USE espace_database;

  CREATE TABLE TAMPON (
    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Marque VARCHAR(255) NOT NULL,
    Nom VARCHAR(255) NOT NULL,
    Prix FLOAT(4) NOT NULL,
    Largeur INT(6) NOT NULL,
    Hauteur INT(6) NOT NULL,
    Forme VARCHAR(255) NOT NULL,
    Type VARCHAR(255) NOT NULL,
    Lignes_Max INT(1) NOT NULL,
    Dateur BOOLEAN NOT NULL
	);
    
  CREATE TABLE CLIENT (
    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
Prenom VARCHAR(255) NOT NULL,
	  Mail VARCHAR(255) NOT NULL
	);

  INSERT INTO TAMPON(Marque, Nom, Prix, Largeur, Hauteur, Forme, Type, Lignes_Max, Dateur)
  VALUES ("TRODAT", "4913", 8.12, 56, 20, "Rectangle", "Plastique", 5, false);
  
  INSERT INTO TAMPON(Marque, Nom, Prix, Largeur, Hauteur, Forme, Type, Lignes_Max, Dateur)
  VALUES ("TRODAT", "5470", 51.35, 38, 38, "Carré", "Métallique", 6, true);
  
  INSERT INTO CLIENT(Nom, Prenom, Mail)
  VALUES ("BEGUEY", "THEO", "begueytheo@gmail.com");
    
  
