USE kbp;

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
