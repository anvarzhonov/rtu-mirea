CREATE DATABASE IF NOT EXISTS restaurants_db;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON restaurants_db.* TO 'user'@'%';
FLUSH PRIVILEGES;

use restaurants_db;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users(login, password)
VALUES ('admin', 'admin');


CREATE TABLE IF NOT EXISTS tables (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  place VARCHAR(30) NOT NULL,
  numberOfTables int(10) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS clients (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  date datetime NOT NULL,
  numberOfClients int(10) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO tables (place, numberOfTables)
VALUES ('Near the window', 10),
('On the veranda', 10),
('In the center', 12),
('Near the kitchen', 2),
('Near the entrance', 3);

INSERT INTO clients (date, numberOfClients)
VALUES ('2021-10-10', 111),
('2021-10-09',124),
('2021-10-08', 98),
('2021-10-07', 87),
('2021-10-06', 101);
