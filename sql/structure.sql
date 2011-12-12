#SET FOREIGN_KEY_CHECKS=0;

Drop Database if exists fifthch_kebap;
Create Database fifthch_kebap;
USE fifthch_kebap;

DROP TABLE IF EXISTS tUser;
CREATE TABLE tUser
(
  `usrID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usrName` VARCHAR(30) NOT NULL UNIQUE,
  `usrPassword` VARCHAR(32) NOT NULL,
  `usrSalt` VARCHAR(32) NOT NULL,
  `usrEmail` VARCHAR(30) NOT NULL UNIQUE,
  `usrType` VARCHAR(10) NOT NULL DEFAULT 'user',  # We have: user,admin,moderator
  `usrActivationkey` VARCHAR(32) UNIQUE,
  `usrActivationkeysent` TINYINT NOT NULL,
  `usrActiv` BOOLEAN NOT NULL DEFAULT FALSE,
  `usrIP` VARCHAR(39),
  `usrCreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usrLastLogin` TIMESTAMP,
  `usrSessionID` VARCHAR(16),
  PRIMARY KEY (`usrID`),
  INDEX (`usrID`)
) ENGINE=INNODB;



#New Stuff

#Table for Kebabspot Information

drop table if exists tSpots;
create table tSpots
(
	spotID integer unsigned not null auto_increment,
	spotCreatorID int, 													#verweist auf tUser.usrID
	spotKebapownerID int,												#Verweist auf tUser.usrID
	spotDate timestamp, 												#Spot create Date now()
	spotPlaceID int,													#FK to tPlace.placeID
	
#spotPicture varchar(255),											#Picutre path
#spotPrice Float,													#Price 
#Menu Float,
#Opentimes varchar(255),
	Rank int,
	Primary Key (ID_spot)
) ENGINE=INNODB;


#Table for Place linked with tSpots;
drop table if exists tPlace;
create table tPlace
(
	placeID integer unsigned not null auto_increment,					#Primary ID
	spotCountry varchar(255),											#Country 
	Kanton varchar(255),
	Ort	varchar(255),
	PLZ varchar(255),
	X float,
	Y float,
)

#Alle Bewertungen bewerten von 0 - 5 punkte / 1 punkt ist für uns 0.2 zum rechnen.
DROP TABLE IF EXISTS rating;
CREATE TABLE rating
(
	ID_rating INT unsigned not null auto_increment,
	turkness float, 
	price	float, 
	taste	float,
	location float,	#(einrichtung und lage)	 	
	wait_time float,
	FK_rater int,		#FK ID rater (user-id)
	#FOREIGN KEY (FK_rater) REFERENCES tUser(usrID),
	rating float,
	FK_spot int,	#fremdschlüssel verlinkung hier für kebapstand
	#FOREIGN KEY (FK_spot) REFERENCES spotinfo(ID_spotinfo),
	Primary Key (ID_rating)
) ENGINE=INNODB;


#SET FOREIGN_KEY_CHECKS=1;

	
#ignore
#Table for statistic
#drop table if exists 'ranking'
#create table 'ranking'
#'ranking_id' integer unsigned not null auto_increment,
#'date'	date,	#last ranking update time   #Zeit wird nur einmal gespeichert vom script (timestamp) und dann auf Site angezeigt.
#'FK_Kebapspot'
#'Rank'	int,
