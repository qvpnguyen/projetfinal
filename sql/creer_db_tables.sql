CREATE DATABASE commerce DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE commerce;

CREATE TABLE produit (
  identifiant  VARCHAR(255),
  url_photo    VARCHAR(255),
  description  VARCHAR(255),
  marque       VARCHAR(255),
  prix	       FLOAT(8,2),
  CONSTRAINT produit_pk PRIMARY KEY (identifiant)
);

CREATE TABLE utilisateur (
  nom         VARCHAR(255),
  prenom      VARCHAR(255),
  url_photo   VARCHAR(255),
  mot_passe   VARCHAR(255),
  CONSTRAINT user_pk PRIMARY KEY (nom)
);

CREATE TABLE carrousel (
  code         VARCHAR(255),
  url_photo    VARCHAR(255),
  alt          VARCHAR(255),
  description  VARCHAR(255),
  sous_desc    VARCHAR(255),
  CONSTRAINT carrousel_pk PRIMARY KEY (code) 
);

CREATE TABLE panier (
  identifiant  VARCHAR(255),
  url_photo    VARCHAR(255),
  description  VARCHAR(255),
  marque       VARCHAR(255),
  prix	       FLOAT(8,2),
  quantite     INT(10),
  CONSTRAINT panier_pk PRIMARY KEY (identifiant)
);

INSERT INTO utilisateur VALUES ('root','root', null, 'root');

INSERT INTO carrousel VALUES ('CA-01', 'camden-hailey-george-w30IlJxlfZQ-unsplash.jpg', 'Homme portant des bagues 1', 'Des bagues pour vous démarquer', 'Raffinez votre style personnel avec nos sélections de bagues soigneusement choisies');
INSERT INTO carrousel VALUES ('CA-02', 'monochrome-gb0a8b7ab3_640.jpg', 'Bague', 'Trouvez votre individualité', 'Chaque bague a son histoire à raconter');
INSERT INTO carrousel VALUES ('CA-03', 'pexels-reginaldo-g-martins-3744466.jpg', 'Homme portant des bagues 2', 'More is more', 'Osez porter davantage de bagues');