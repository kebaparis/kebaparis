
/*
INSERT INTO tUser (usrName, usrPassword, usrEmail, usrActivated, usrType)
VALUES
	('marco', MD5('1234'), 'marco@kebaparis.ch', TRUE, 'admin'),
	('arvet', MD5('1234'), 'arvet@kebaparis.ch', TRUE, 'admin'),
	('steve', MD5('1234'), 'steve@kebaparis.ch', TRUE, 'admin'),
	('vanessa', MD5('1234'), 'vanessa@kebaparis.ch', TRUE, 'admin'),
	('koray', MD5('1234'), 'koray@kebaparis.ch', TRUE, 'admin'),
	
	('peter', MD5('1234'), 'marcocuoco@googlemail.com', TRUE, 'user'),
	('sepp', MD5('1234'), 'marcocuoco@gmail.com', FALSE, 'user'),
	('ueli', MD5('1234'), 'marcocuoco@bluewin.ch.ch', FALSE, 'user');
	
*/	

USE fifthch_kebap;
	
INSERT INTO tUser (usrName, usrPassword, usrEmail, usrActiv, usrType) VALUES ('moderator', MD5('1234'), 'moderator@kebaparis.ch', TRUE, 'moderator'), ('admin', MD5('1234'), 'admin@kebaparis.ch', TRUE, 'admin'), ('user', MD5('1234'), 'user@kebaparis.ch', TRUE, 'user')