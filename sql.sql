DROP TABLE IF EXISTS promotions;
DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS showings;
DROP TABLE IF EXISTS films;
DROP TABLE IF EXISTS screens;
DROP TABLE IF EXISTS staff;

CREATE TABLE staff (
	staff_ID INTEGER NOT NULL AUTO_INCREMENT,
	user_name VARCHAR(15) NOT NULL,
	password VARCHAR(32) NOT NULL,
	role_type ENUM('manager','staff') NOT NULL,
	PRIMARY KEY (staff_ID)

)ENGINE = InnoDB;

CREATE TABLE screens (
	screen_ID INTEGER NOT NULL,
	capacity INTEGER NOT NULL,
	PRIMARY KEY (screen_ID)
)ENGINE = InnoDB;

CREATE TABLE films (
	film_ID INTEGER NOT NULL AUTO_INCREMENT,
	film_title VARCHAR(255) NOT NULL,
	film_length INTEGER NOT NULL,
	film_genre VARCHAR(20) NOT NULL,
	film_rating VARCHAR(5) NOT NULL,
	film_year INTEGER NOT NULL,
	PRIMARY KEY (film_ID)
)ENGINE = InnoDB;

CREATE TABLE showings (
	showing_ID INTEGER NOT NULL AUTO_INCREMENT,
	start_date DATE NOT NULL,
	end_date DATE NOT NULL,
	start_time TIME NOT NULL,
	end_time TIME NOT NULL,
	film_ID INTEGER NOT NULL,
	screen_ID INTEGER NOT NULL,
	available_tickets INTEGER NOT NULL,
	audience_size INTEGER NOT NULL,
	demand_for_more INTEGER NOT NULL,
	PRIMARY KEY (showing_ID),
	FOREIGN KEY (film_ID) REFERENCES films(film_ID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (screen_ID) REFERENCES screens(screen_ID) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE booking (
	booking_id INTEGER NOT NULL AUTO_INCREMENT,
	film_ID INTEGER NOT NULL,
	customer_name VARCHAR(50) NOT NULL,
	booking_date DATE NOT NULL,
	numof_tickets INTEGER NOT NULL,
	collected VARCHAR(3) NOT NULL,
	PRIMARY KEY (booking_id),
	FOREIGN KEY (film_ID) REFERENCES films(film_ID) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE promotions (
	promo_id INTEGER NOT NULL AUTO_INCREMENT,
	film_ID INTEGER NOT NULL,
	promo_name VARCHAR(50) NOT NULL,
	start_date DATE NOT NULL,
	end_date DATE NOT NULL,
	description VARCHAR(200) NOT NULL,
	PRIMARY KEY (promo_id),
	FOREIGN KEY (film_ID) REFERENCES films(film_ID) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

INSERT INTO staff (user_name, password, role_type)  VALUES ('jenny', 'test', 'manager');

INSERT INTO screens (screen_ID, capacity)  VALUES (1, 1000);
INSERT INTO screens (screen_ID, capacity)  VALUES (2, 1000);
INSERT INTO screens (screen_ID, capacity)  VALUES (3, 500);
INSERT INTO screens (screen_ID, capacity)  VALUES (4, 500);
INSERT INTO screens (screen_ID, capacity)  VALUES (5, 100);

INSERT INTO films (film_title, film_length, film_genre , film_rating, film_year)  VALUES ('Harry Potter and the Deathly Hallows pt1', 146, 'Fanstasy', '12A', 2010);
INSERT INTO films (film_title, film_length, film_genre , film_rating, film_year)  VALUES ('127 Hours', 96, 'Drama', '15', 2010);
INSERT INTO films (film_title, film_length, film_genre , film_rating, film_year)  VALUES ('Black Swan', 108, 'Thriller', '15', 2010);

INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2010-12-12', '2011-01-12', '15:30:00', '17:30:00', 1, 1, 1000);
INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2010-12-12', '2011-01-12', '18:00:00', '20:00:00', 1, 1, 1000);
INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2010-12-12', '2011-01-12', '20:30:00', '22:30:00', 1, 1, 1000);

INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2011-01-12', '2011-02-12', '15:30:00', '17:30:00', 2, 2, 1000);
INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2011-01-12', '2011-02-12', '18:00:00', '20:00:00', 2, 2, 1000);
INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2011-01-12', '2011-02-12', '20:30:00', '22:30:00', 2, 2, 1000);

INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2011-02-12', '2011-03-12', '15:30:00', '22:30:00', 3, 3, 500);
INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2011-02-12', '2011-03-12', '18:00:00', '22:00:00', 3, 3, 500);
INSERT INTO showings (start_date, end_date, start_time, end_time, film_ID, screen_ID, available_tickets)  VALUES ('2011-02-12', '2011-03-12', '20:30:00', '22:30:00', 3, 3, 500);

INSERT INTO booking (film_ID, customer_name, booking_date, numof_tickets)  VALUES (1, 'DaveMurray', '2010-12-12', 4);

INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description)  VALUES (1, 'BOGOF', '2010-12-12', '2011-01-12', 'Buy one get one free.');

