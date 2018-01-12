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

	CREATE TABLE LIGNE (
	    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Texte VARCHAR(255) NOT NULL,
		Taille INT(3) NOT NULL,
		Police VARCHAR(255) NOT NULL,
		Espacement INT(3),  
		Alignement VARCHAR(255),
		Gras BOOLEAN NOT NULL,
		Italique BOOLEAN NOT NULL,
		Souligne BOOLEAN NOT NULL
	);

	CREATE TABLE MODELE (
	    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Id_Client INT(6) NOT NULL,
		Id_Tampon INT(6) NOT NULL,
		Titre VARCHAR(255) NOT NULL
	);

	CREATE TABLE LIGNE_MODELE (
		Id_Ligne INT(6) NOT NULL,
		Id_Modele INT(6) NOT NULL,
		Ordre INT(6) NOT NULL,
		PRIMARY KEY(Id_Ligne, Id_Modele)
	);


  INSERT INTO TAMPON(Marque, Nom, Prix, Largeur, Hauteur, Forme, Type, Lignes_Max, Dateur)
  VALUES ("TRODAT", "4913", 8.12, 56, 20, "Rectangle", "Plastique", 5, false);
  
  INSERT INTO TAMPON(Marque, Nom, Prix, Largeur, Hauteur, Forme, Type, Lignes_Max, Dateur)
  VALUES ("TRODAT", "5470", 51.35, 38, 38, "Carré", "Métallique", 6, true);
  
  INSERT INTO CLIENT(Nom, Prenom, Mail)
  VALUES ("BEGUEY", "THEO", "begueytheo@gmail.com");
    
INSERT INTO LIGNE(Texte, Taille, Police, Espacement, Alignement, Gras, Italique, Souligne)
VALUES ("ESPACE MARQUAGE", 12, "Century", 30, "middle", true, false, false);

INSERT INTO LIGNE(Texte, Taille, Police, Espacement, Alignement, Gras, Italique, Souligne)
VALUES ("27 Rue Georges Barres", 10, "Arial", 0, "left", false, true, false);

INSERT INTO MODELE(Id_Client, Id_Tampon, Titre) VALUES (0, 1, "Défaut");

INSERT INTO LIGNE_MODELE(Id_Ligne, Id_Modele, Ordre) VALUES (1,1,1);

INSERT INTO LIGNE_MODELE(Id_Ligne, Id_Modele, Ordre) VALUES (2,1,2);
