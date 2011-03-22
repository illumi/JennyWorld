DROP TABLE IF EXISTS booking CASCADE;
DROP TABLE IF EXISTS showings CASCADE;
DROP TABLE IF EXISTS screens CASCADE;
DROP TABLE IF EXISTS staff CASCADE;
DROP TABLE IF EXISTS cinema CASCADE;
DROP TABLE IF EXISTS promotions CASCADE;
DROP TABLE IF EXISTS films CASCADE;

CREATE TABLE films (
  film_ID int(11) NOT NULL AUTO_INCREMENT,
  film_title varchar(255) NOT NULL,
  film_length int(11) NOT NULL,
  film_genre varchar(20) NOT NULL,
  film_rating varchar(5) NOT NULL,
  film_year int(11) NOT NULL,
  PRIMARY KEY (film_ID)
) ENGINE=InnoDB;

CREATE TABLE promotions (
	promo_id int(11) NOT NULL AUTO_INCREMENT,
	film_ID int(11) NOT NULL,
	promo_name varchar(50) NOT NULL,
	start_date date NOT NULL,
	end_date date NOT NULL,
	description varchar(200) NOT NULL,
	PRIMARY KEY (promo_id),
	FOREIGN KEY (film_ID) REFERENCES films(film_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE cinema (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  description text(65535) NOT NULL,
  location varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE staff (
  staff_ID int(11) NOT NULL AUTO_INCREMENT,
  cinema_id int(11) NOT NULL,
  user_name varchar(15) NOT NULL,
  password varchar(32) NOT NULL,
  role_type enum('manager','staff') NOT NULL,
  PRIMARY KEY (staff_ID),
  FOREIGN KEY (cinema_id) REFERENCES cinema (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE screens (
	screen_ID int(11) NOT NULL AUTO_INCREMENT,
	screen_number int(11) NOT NULL,
	cinema_id int(11) NOT NULL,
	capacity int(11) NOT NULL,
	PRIMARY KEY (screen_ID),
	FOREIGN KEY (cinema_id) REFERENCES cinema(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE showings (
	showing_ID int(11) NOT NULL AUTO_INCREMENT,
	screen_ID int(11) NOT NULL,
	film_ID int(11) NOT NULL,
	start_date date NOT NULL,
	end_date date NOT NULL,
	start_time time NOT NULL,
	end_time time NOT NULL,
	PRIMARY KEY (showing_ID),
	FOREIGN KEY (film_ID) REFERENCES films(film_ID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (screen_ID) REFERENCES screens(screen_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE booking (
  booking_id int(11) NOT NULL AUTO_INCREMENT,
  showing_id int(11) NOT NULL,
  customer_name varchar(50) NOT NULL,
  booking_date date NOT NULL, 
  numof_tickets int(11) NOT NULL,
  collected boolean NOT NULL,
  PRIMARY KEY (booking_id),
  FOREIGN KEY (showing_id) REFERENCES showings(showing_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

INSERT INTO cinema (name, description, location) VALUES ('JennyWorld', 'Welcome to Jenny World! lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots and lots of information goes here', 'Edinburgh');


INSERT INTO staff (cinema_id, user_name, password, role_type) VALUES ('1', 'jenny', '098f6bcd4621d373cade4e832627b4f6', 'manager');
INSERT INTO staff (cinema_id, user_name, password, role_type) VALUES ('1', 'Jamie', '098f6bcd4621d373cade4e832627b4f6', 'manager');
INSERT INTO staff (cinema_id, user_name, password, role_type) VALUES ('1', 'jonas', '9c5ddd54107734f7d18335a5245c286b', 'staff');
INSERT INTO staff (cinema_id, user_name, password, role_type) VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'manager');


INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('1', '1', '1000');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('2', '1', '1000');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('3', '1', '500');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('4', '1', '500');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('5', '1', '100');


INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) VALUES ('Harry Potter and the Deathly Hallows pt1', '146', 'Fanstasy', '12A', '2010');
INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) VALUES ('127 Hours', '96', 'Drama', '15', '2010');
INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) VALUES ('Black Swan', '108', 'Thriller', '15', '2010');
INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) VALUES ('Godfather', '170', 'crime', '18', '1980');
INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) VALUES ('Battle:LA', '132', 'action', '12', '2011');
INSERT INTO films (film_title, film_length, film_genre, film_rating, film_year) VALUES ('The attack of the shark', '12', 'horror', 'R18', '2011');


INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('1', '1', '2011-02-12', '2011-03-12', '20:30:00', '22:30:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('3', '2', '2011-02-12', '2011-03-12', '20:30:00', '22:30:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('4', '3', '2011-02-12', '2011-03-12', '20:30:00', '22:30:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('5', '3', '2011-02-12', '2011-03-12', '20:30:00', '22:30:00');


INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('1', 'John Doe', '2010-12-12', '500', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('2', 'John Doe', '2010-12-12', '600', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('3', 'John Doe', '2010-12-12', '30', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('4', 'John Doe', '2010-12-12', '90', '0');


INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description) VALUES ( 1, 'BOGOF', '2011-03-1', '2011-03-31', 'Buy one get one free.');










