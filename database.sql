  DROP DATABASE IF EXISTS espace_database;
  CREATE DATABASE espace_database   DEFAULT CHARACTER SET utf8   DEFAULT COLLATE utf8_general_ci;
  
  USE espace_database;

  CREATE TABLE TAMPON (
    Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Marque VARCHAR(255) NOT NULL,
    Nom VARCHAR(255) NOT NULL,
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
	Mail VARCHAR(255) NOT NULL,
	NUMBER INT(10) NOT NULL
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
		Titre VARCHAR(255) NOT NULL,
		Defaut BOOLEAN NOT NULL
	);

	CREATE TABLE LIGNE_MODELE (
		Id_Ligne INT(6) NOT NULL,
		Id_Modele INT(6) NOT NULL,
		Ordre INT(6) NOT NULL,
		PRIMARY KEY(Id_Ligne, Id_Modele)
	);
	
	CREATE TABLE ENCRE(
	Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Id_Tampon INT(6) NOT NULL,
	Noir BOOLEAN NOT NULL,
	Rouge BOOLEAN NOT NULL,
	Bleu BOOLEAN NOT NULL,
	Vert BOOLEAN NOT NULL,
	Violet BOOLEAN NOT NULL
	);


  INSERT INTO TAMPON(Marque, Nom, Largeur, Hauteur, Forme, Type, Lignes_Max, Dateur)
  VALUES ("TRODAT", "4913", 56, 20, "Rectangle", "Plastique", 5, false);
  
  INSERT INTO TAMPON(Marque, Nom, Largeur, Hauteur, Forme, Type, Lignes_Max, Dateur)
  VALUES ("TRODAT", "5470", 38, 38, "Carre", "Metallique", 6, true);
  
  INSERT INTO CLIENT(Nom, Mail, Number)
  VALUES ("ADMIN", "begueytheo@gmail.com", 0616545495);
    
INSERT INTO LIGNE(Texte, Taille, Police, Espacement, Alignement, Gras, Italique, Souligne)
VALUES ("ESPACE MARQUAGE", 12, "Century", 0, "middle", true, false, false);

INSERT INTO LIGNE(Texte, Taille, Police, Espacement, Alignement, Gras, Italique, Souligne)
VALUES ("27 Rue Georges Barres", 10, "Arial", 0, "left", false, true, false);

INSERT INTO MODELE(Id_Client, Id_Tampon, Titre, Defaut) VALUES (0, 1, "Défaut", true);

INSERT INTO LIGNE_MODELE(Id_Ligne, Id_Modele, Ordre) VALUES (1,1,1);

INSERT INTO LIGNE_MODELE(Id_Ligne, Id_Modele, Ordre) VALUES (2,1,2);

INSERT INTO ENCRE(Id_Tampon, Noir, Rouge, Bleu, Vert, Violet) VALUES (1,true, true, true, false, true);
