CREATE DATABASE incometax;

use incometax;

CREATE TABLE users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	phone INT(10) NOT NULL,
	address VARCHAR(50),
	email VARCHAR(50) NOT NULL,
	id_type VARCHAR(20) NOT NULL,
	id_number VARCHAR(6) unique NOT NULL,
	date TIMESTAMP
);
