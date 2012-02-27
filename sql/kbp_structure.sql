
Drop Database if exists kbp;
Create Database kbp;
USE kbp;


CREATE TABLE users
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(32) NOT NULL,
salt VARCHAR(32) NOT NULL,
email VARCHAR(30) NOT NULL UNIQUE,
id_type INT UNSIGNED NOT NULL DEFAULT '1',
activeationkey VARCHAR(32) UNIQUE,
activeationkeysent BOOLEAN NOT NULL DEFAULT FALSE,
active BOOLEAN NOT NULL DEFAULT FALSE,
ip VARCHAR(39),
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
lastlogin TIMESTAMP,
PRIMARY KEY (id),
INDEX (id)
) ENGINE=INNODB;

CREATE TABLE types
(
id Integer UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(10),
Primary Key (id)
);


CREATE TABLE spots
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
id_creator INT UNSIGNED NOT NULL,             # Ersteller vom Spot  --> users.id
id_kebapowner INT UNSIGNED,               # Owner vom Spot    --> users.id
name VARCHAR(45) NOT NULL,            # Name so à la Kebabhüsli Einsiedeln
lat float NOT NULL,
lng float NOT NULL,
id_place INT UNSIGNED,          
active BOOLEAN NOT NULL DEFAULT TRUE,
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,   # Created Now()
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;

create table places
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
id_states INT UNSIGNED NOT NULL,
ort varchar(255) NOT Null,
plz varchar(255) NOT NULL,
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;

create table countries
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
country VARCHAR(65) NOT NULL,
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;

create table states
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
id_country INT UNSIGNED NOT NULL,
states VARCHAR(65) NOT NULL,
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;



CREATE TABLE ratings
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
id_spot INT UNSIGNED NOT NULL,         # ID vom spot --> spots.id
id_rater INT UNSIGNED NOT NULL,        # Rater --> users.id
# Wertung von 1 (min) - 5 (max)
tuerkness INT,             # Türkisch?
price INT,              # Preis zu Quantität?
taste INT,              # Qualität?
location INT,             # Einrichtung und Lage
waittime INT,            # Wartezeit
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;

CREATE TABLE statistics
(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
id_spot INT UNSIGNED NOT NULL,
ratingcount INT UNSIGNED,     
tuerkness FLOAT,             
price FLOAT,             
taste FLOAT,            
location FLOAT,          
waittime FLOAT, 
overall FLOAT,        
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;
