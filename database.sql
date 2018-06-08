  DROP DATABASE IF EXISTS espace_database;
  CREATE DATABASE espace_database   DEFAULT CHARACTER SET utf8   DEFAULT COLLATE utf8_general_ci;
  
  USE espace_database;

  CREATE TABLE TAMPON(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    largeur INT(6) NOT NULL,
    hauteur INT(6) NOT NULL,
    forme VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    lignes_max INT(1) NOT NULL,
    dateur BOOLEAN NOT NULL
	);
    
CREATE TABLE UTILISATEUR(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  ip_address varchar(45) NOT NULL,
  username varchar(100) NULL,
  password varchar(255) NOT NULL,
  salt varchar(255) DEFAULT NULL,
  email varchar(254) NOT NULL,
  activation_code varchar(40) DEFAULT NULL,
  forgotten_password_code varchar(40) DEFAULT NULL,
  forgotten_password_time int(11) unsigned DEFAULT NULL,
  remember_code varchar(40) DEFAULT NULL,
  created_on int(11) unsigned NOT NULL,
  last_login int(11) unsigned DEFAULT NULL,
  active int(1) unsigned DEFAULT NULL,
  company varchar(100) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE GROUPE(
  id int(8) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  description varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE UTILISATEUR_GROUPE(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(11) unsigned NOT NULL,
  group_id int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
);

	CREATE TABLE ENCRE(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_tampon INT(6) NOT NULL,
	noir BOOLEAN NOT NULL,
	rouge BOOLEAN NOT NULL,
	bleu BOOLEAN NOT NULL,
	vert BOOLEAN NOT NULL,
	violet BOOLEAN NOT NULL
	);


  INSERT INTO TAMPON(marque, nom, largeur, hauteur, forme, type, lignes_max, dateur)
  VALUES ("TRODAT", "4913", 56, 20, "Rectangle", "Plastique", 5, false);
  
    INSERT INTO TAMPON(marque, nom, largeur, hauteur, forme, type, lignes_max, dateur)
  VALUES ("TRODAT", "5470", 38, 38, "Carre", "Metallique", 6, true);

      INSERT INTO TAMPON(marque, nom, largeur, hauteur, forme, type, lignes_max, dateur)
  VALUES ("TRODAT", "4911", 36, 12, "Rectangle", "Plastique", 3, false);

  INSERT INTO TAMPON(marque, nom, largeur, hauteur, forme, type, lignes_max, dateur)
  VALUES ("TRODAT", "46019", 17, 17, "Cercle", "Plastique", 3, false);

INSERT INTO ENCRE(id_tampon, noir, rouge, bleu, vert, violet) VALUES (1,true, true, true, false, true);

INSERT INTO GROUPE (id, name, description) VALUES
     (1, 'Admin', 'Administrateur'),
     (2, 'Membres', 'Utilisateur');

INSERT INTO UTILISATEUR_GROUPE (id, user_id, group_id) VALUES
     (1,1,1);
