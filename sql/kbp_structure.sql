
###################
# T H O U G H T S #
###################

######################################## U S E R S ##
/* 
users.type auslagern? 
	--> types.id 
		--> 1: Client
		--> 2: Moderator
		--> 3: Admin
		--> Default 1

users.activeationkeysent	BOOLEAN?
	--> warum TINYINT und kein Boolean?

users.ip Warum nicht VARCHAR(15)?

users.sessionid Für was genau?

######################################## S P O T S ##

Ranking? 
	--> Dynamisch (jedesmal wenn User einen Kebabstand sieht)
	--> Statisch (Platz wird alle 30 Minuten aktualisiert --> spots.id_ranking abgespeichert)

Abspeicherung Google Maps Infos?
	--> Extra Tabelle die zu spots.id_place verlinkt?


######################################## S P O T S ##

Rating Bewertung in INT oder FLOAT?

Spot standardmässig aktiviert / deaktiviert?

Kann User seine Bewertung ändern? Wenn ja wie lösen wir es? [Button edit] oder "realtime"?

###################################################

*/

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
#sessionid VARCHAR(16),
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
AVG FLOAT,        
Primary Key (id),
INDEX (id)
) ENGINE=INNODB;


###################################### I N S E R T S I N T O D B  ##########################

  ### U S E R S ###
INSERT INTO users (name, password, email, id_type, active, ip) VALUES 
  ('user1', MD5('1'),'user1@kebaparis.ch','1',TRUE,'255.255.255.255'),
  ('user2', MD5('1'),'user2@kebaparis.ch','1',TRUE,'255.255.255.255'),
  ('user3', MD5('1'),'user3@kebaparis.ch','1',TRUE,'255.255.255.255');

##### T Y P E S ###
INSERT INTO types (name) VALUES ('client'), 
                                ('moderator'),
                                ('admin');

  ### S P O T S ###
INSERT INTO spots (id_creator, name) VALUES 
  ('1','Kebab Einsiedeln'),
  ('2','Kebab Horgen'),
  ('3','Kebab Rapperswil');


  ### R A T I N G S ###
INSERT INTO ratings (id_spot, id_rater, tuerkness, price, taste, location, waittime) VALUES 
  ('1','1','4','4','3','2','2'),
  ('1','2','2','4','5','3','3'),
  ('1','3','3','2','1','4','5'),
  ('2','2','3','4','2','1','5'),
  ('3','3','4','2','4','1','3');


 
#Average from RatingPoint
select AVG(tuerkness) as tuerkness from ratings where id_spot = '1'

#Insert into Statistics
INSERT INTO statistics (tuerkness) VALUES AVG(tuerkness) from ratings where id_spot = '1'
UPDATE statistics SET tuerkness='(select AVG(tuerkness) from ratings where id_spot = '1')' where id_spot= '1';

/* start procedure pstatistic */ 
DELIMITER //
CREATE PROCEDURE pstatistic(IN id_spot INT)

#select AVG(tuerkness), AVG(price), AVG(taste), AVG(location), AVG(waittime) from ratings where id_spot = '1'
SET @count = 
(
  SELECT COUNT(*) FROM statistics WHERE id_spot = @id_spot;
);

# Wenn id_spot existiert in statistics dann:
IF @count = 1 THEN
  UPDATE statistics SET tuerkness= SELECT AVG(tuerkness), AVG(price), AVG(taste), AVG(location), AVG(waittime) from ratings where id_spot = @id_spot;

  UPDATE (SELECT AVG(tuerkness), AVG(price), AVG(taste), AVG(location), AVG(waittime) from ratings where id_spot = @id_spot) SET tuerkness= ;
# Sonst neuen Eintrag in Statistic erstellen 
ELSE
  # Funktioniert
  INSERT INTO statistics (id_spot,tuerkness,price,taste,location,waittime) SELECT id,AVG(tuerkness), AVG(price), AVG(taste), AVG(location), AVG(waittime) from ratings where id_spot = 1;

END IF;
END //
DELIMITER ;
/* End procedure pstatistic */

from ratings

#Overall Average
# 25 = Maximum 
select AVG(tuerkness + price + taste + location + waittime) as overall from ratings where id_spot = '1'

#Rating Count from Spots
select count(id) from ratings where id_spot = '1'

#Top 10 ratings
holy shit fuck crap hure

#Users Ratings
select count(id) from ratings where id_rater = '1'

#Check if User has already rated this spot  --> if 0 == NO | < 0 == Yes
select count(id) from ratings where id_spot = '1' and id_rater = '1'

#Show Users Rating for this spot
select * from ratings where id_spot = '1' and id_rater = '1'




####### U S E R C O N T R O L #######

# Show email?

# Password change via our classes.php right?

# Delete Account (ok with pw and user check in one query?)
UPDATE users SET users.active='FALSE' where users.id= '1' and users.password = MD5('1')

