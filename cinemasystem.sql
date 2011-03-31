DROP TABLE IF EXISTS booking CASCADE;
DROP TABLE IF EXISTS showings CASCADE;
DROP TABLE IF EXISTS screens CASCADE;
DROP TABLE IF EXISTS staff CASCADE;
DROP TABLE IF EXISTS cinema CASCADE;
DROP TABLE IF EXISTS promotions CASCADE;
DROP TABLE IF EXISTS films CASCADE;
DROP VIEW IF EXISTS bookingcapacity;
DROP VIEW IF EXISTS bookingoverlaps;
DROP VIEW IF EXISTS screenfilms;
DROP VIEW IF EXISTS screenshows;

CREATE TABLE films (
	film_ID int(11) NOT NULL AUTO_INCREMENT,
	film_title varchar(255) NOT NULL,
	film_year char(4) NOT NULL,
	film_plot text(65535) NOT NULL,
	film_length int(11) NOT NULL,
	film_genre varchar(50) NOT NULL,
	film_rating varchar(5) NOT NULL,
	film_poster varchar(255) NOT NULL,
	imdb_id varchar(50) NOT NULL,
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
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('5', '1', '500');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('6', '1', '500');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('7', '1', '200');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('8', '1', '200');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('9', '1', '200');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('10', '1', '200');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('11', '1', '100');
INSERT INTO screens (screen_number, cinema_id, capacity) VALUES ('12', '1', '100');


INSERT INTO films (film_title, film_year, film_plot, film_length, film_genre, film_rating, film_poster, imdb_id) VALUES ('Harry Potter and the Deathly Hallows: Part 1', '2010', 'As Harry races against time and evil to destroy the Horcruxes, he uncovers the existence of three most powerful objects in the wizarding world: the Deathly Hallows.', '146', 'Adventure, Fantasy, Mystery', 'PG-13', 'http://ia.media-imdb.com/images/M/MV5BMTQ2OTE1Mjk0N15BMl5BanBnXkFtZTcwODE3MDAwNA@@._V1._SX320.jpg', 'tt0926084');
INSERT INTO films (film_title, film_year, film_plot, film_length, film_genre, film_rating, film_poster, imdb_id) VALUES ('127 Hours', '2010', 'A mountain climber becomes trapped under a boulder while canyoneering alone near Moab, Utah and resorts to desperate measures in order to survive.', '94', 'Adventure, Drama, Thriller', 'R', 'http://ia.media-imdb.com/images/M/MV5BMTc2NjMzOTE3Ml5BMl5BanBnXkFtZTcwMDE0OTc5Mw@@._V1._SX320.jpg', 'tt1542344');
INSERT INTO films (film_title, film_year, film_plot, film_length, film_genre, film_rating, film_poster, imdb_id) VALUES ('Star Trek','2009','A chronicle of the early days of James T. Kirk and his fellow USS Enterprise crew members.','127','Action, Adventure, Sci-Fi','PG-13','http://ia.media-imdb.com/images/M/MV5BMjE5NDQ5OTE4Ml5BMl5BanBnXkFtZTcwOTE3NDIzMw@@._V1._SX320.jpg','tt0796366');
INSERT INTO films (film_title, film_year, film_plot, film_length, film_genre, film_rating, film_poster, imdb_id) VALUES ('The Social Network','2010','A chronicle of the founding of Facebook, the social-networking Web site.','120','Biography, Drama, History','PG-13','http://ia.media-imdb.com/images/M/MV5BMTM2ODk0NDAwMF5BMl5BanBnXkFtZTcwNTM1MDc2Mw@@._V1._SX320.jpg','tt1285016');
INSERT INTO films (film_title, film_year, film_plot, film_length, film_genre, film_rating, film_poster, imdb_id) VALUES ('Happy Gilmore','1996','A rejected hockey player puts his skills to the golf course to save his grandmother\'s house.','92','Comedy, Romance, Sport','PG-13','http://ia.media-imdb.com/images/M/MV5BMjA4NjUxODg3Ml5BMl5BanBnXkFtZTcwNzcyODc5Mw@@._V1._SX320.jpg','tt0116483');


INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('1', '1', '2011-04-05', '2011-04-05', '20:00:00', '22:26:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('2', '2', '2011-04-05', '2011-04-05', '20:30:00', '22:04:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('3', '3', '2011-04-05', '2011-04-05', '20:00:00', '22:07:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('4', '4', '2011-04-05', '2011-04-05', '20:30:00', '22:30:00');
INSERT INTO showings (screen_ID, film_ID, start_date, end_date, start_time, end_time) VALUES ('5', '5', '2011-04-05', '2011-04-05', '20:00:00', '21:58:00');


INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('1', 'John Doe', '2010-12-12', '700', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('2', 'John Doe', '2010-12-12', '6', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('3', 'John Doe', '2010-12-12', '300', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('4', 'John Doe', '2010-12-12', '200', '0');
INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('5', 'John Doe', '2010-12-12', '110', '0');


INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description) VALUES ( 1, 'BOGOF', '2011-04-01', '2011-04-14', 'Buy one get one free for two weeks.');


CREATE VIEW bookingcapacity AS 
SELECT 
showings.showing_id, screens.screen_ID ,booking_id, films.film_ID AS filmid, films.film_title AS filmtitle ,start_date, end_date, start_time, end_time, sum(numof_tickets) AS tickets_sold, capacity 
FROM booking
INNER JOIN 
showings 
ON 
booking.showing_id = showings.showing_ID 
INNER JOIN 
screens 
ON 
showings.screen_ID = screens.screen_ID
INNER JOIN 
films 
ON 
showings.film_ID = films.film_ID
GROUP BY showing_id 
ORDER BY tickets_sold DESC;


CREATE VIEW bookingoverlaps AS
SELECT 
one.*
FROM bookingcapacity AS one, bookingcapacity as two 
WHERE 
two.start_date <= one.start_date <= two.end_date 
AND 
two.start_time <= one.start_time <= two.end_time
AND
one.filmid != two.filmid
GROUP BY showing_id
ORDER BY tickets_sold DESC;


CREATE VIEW screenfilms AS 
SELECT 
showing_ID, showings.screen_ID, showings.film_ID, film_title, start_date, start_time, end_date, end_time
FROM showings 
INNER JOIN 
screens 
ON 
showings.screen_ID = screens.screen_ID
INNER JOIN 
films 
ON 
showings.film_ID = films.film_ID
GROUP BY showing_id
ORDER BY start_date, film_title, start_time;

CREATE VIEW screenshows AS 
SELECT 
showings.showing_id, screens.screen_ID , films.film_ID AS filmid, films.film_title AS filmtitle ,start_date, end_date, start_time, end_time, capacity 
FROM
showings 
INNER JOIN 
screens 
ON 
showings.screen_ID = screens.screen_ID
INNER JOIN 
films 
ON 
showings.film_ID = films.film_ID
GROUP BY showing_id 
ORDER BY showings.showing_id;