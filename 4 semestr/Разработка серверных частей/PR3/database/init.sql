CREATE DATABASE IF NOT EXISTS store_db;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON store_db.* TO 'user'@'%';
FLUSH PRIVILEGES;

use store_db;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users(login, password)
VALUES ('admin', 'admin');


CREATE TABLE IF NOT EXISTS toys (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  count_toys int(10) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS clients (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  count_set INT(10) NOT NULL,
  amount_purchased int(30) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO toys (name, count_toys)
VALUES ('Игрушка AstroBoy', 10),
('Бейби-кукла', 33),
('Игрушка "человек-паук" ', 122),
('Ben Ten', 2),
('Lego Transformers', 234);

INSERT INTO clients (count_set,camount_purchased)
VALUES 
(30,3000),
(3,2541),
(6,1000),
(19,10000),
(1,4000),
(32,7025),
(2,8728),
(6,94292);