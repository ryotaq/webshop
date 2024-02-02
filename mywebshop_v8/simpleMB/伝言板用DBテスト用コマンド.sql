CREATE DATABASE simpleMB;
use simpleMB;
CREATE TABLE board(
	id INT AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	message BLOB NOT NULL,
	time TIMESTAMP,
	PRIMARY KEY(id)
);
INSERT INTO board (name, message) VALUES("TANAKA", "Hello.");
SELECT * FROM board;