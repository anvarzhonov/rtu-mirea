CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT, DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

SET collation_connection = 'utf8_general_ci';

USE appDB;

DROP TABLE IF EXISTS employers;
DROP TABLE IF EXISTS staff;


CREATE TABLE IF NOT EXISTS zoo (
    id INT(4) NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    amount  INT(6) NOT NULL,
    PRIMARY KEY(id)
);
 
INSERT INTO zoo (name, amount) 
SELECT * FROM (SELECT 'Kurica', 10) as tmp 
WHERE NOT EXISTS ( 
 SELECT name FROM zoo where name = 'Kurica' and amount = 10 
) LIMIT 1; 
 
INSERT INTO zoo (name, amount) 
SELECT * FROM (SELECT 'Beer', 3) as tmp 
WHERE NOT EXISTS ( 
 SELECT name FROM zoo where name = 'Beer' and amount = 3 
) LIMIT 1; 
 
INSERT INTO zoo (name, amount) 
SELECT * FROM (SELECT 'Giraffe', 2) as tmp 
WHERE NOT EXISTS ( 
 SELECT name FROM zoo where name = 'Giraffe' and amount = 2 
) LIMIT 1; 
 
INSERT INTO zoo (name, amount) 
SELECT * FROM (SELECT 'Zebra', 5) as tmp 
WHERE NOT EXISTS ( 
 SELECT name FROM zoo where name = 'Zebra' and amount = 5 
) LIMIT 1; 
 
INSERT INTO zoo (name, amount) 
SELECT * FROM (SELECT 'Tiger', 2) as tmp 
WHERE NOT EXISTS ( 
 SELECT name FROM zoo where name = 'Tiger' and amount = 2 
) LIMIT 1; 
 
INSERT INTO zoo (name, amount) 
SELECT * FROM (SELECT 'Mammoth', 1) as tmp 
WHERE NOT EXISTS ( 
 SELECT name FROM zoo where name = 'Mammoth' and amount = 1 
) LIMIT 1;

CREATE TABLE IF NOT EXISTS employers (
    id INT(5) NOT NULL AUTO_INCREMENT,
    firstName TEXT NOT NULL,
    surname TEXT NOT NULL,
    post TEXT NOT NULL,
    salary INT(8) NOT NULL,
    age INT(3) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO employers (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Nikolay', 'Modin', 'Director', 500000, 56) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM employers where firstName = 'Nikolay' and surname = 'Modin' and post = 'Director' and salary = 500000 and age = 56
) LIMIT 1;

INSERT INTO employers (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Nikita', 'Bodkin', 'Okhrannyk', 150000, 47) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM employers where firstName = 'Nikita' and surname = 'Bodkin' and post = 'Okhrannyk' and salary = 150000 and age = 47
) LIMIT 1;


INSERT INTO employers (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Irina', 'Zabolotnaya', 'ABOBAS', 90000, 29) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM employers where firstName = 'Irina' and surname = 'Zabolotnaya' and post = 'ABOBAS' and salary = 90000 and age = 29
) LIMIT 1;

INSERT INTO employers (firstName, surname, post, salary, age)
SELECT * FROM (SELECT 'Aleksey', 'Kotanin', 'Ubershik', 50000, 56) as tmp
WHERE NOT EXISTS (
    SELECT firstName FROM employers where firstName = 'Aleksey' and surname = 'Kotanin' and post = 'Ubershik' and salary = 50000 and age = 56
) LIMIT 1;

-- CREATE TABLE IF NOT EXISTS staff (
--     id INT(5) NOT NULL AUTO_INCREMENT,
--     firstName TEXT NOT NULL,
--     surname TEXT NOT NULL,
--     post TEXT NOT NULL,
--     age INT(3) NOT NULL,
--     PRIMARY KEY(id)
-- );

-- INSERT INTO staff (firstName, surname, post, salary, age)
-- SELECT * FROM (SELECT 'Aleksey', 'Kotanin', 'Officiant', 56) as tmp
-- WHERE NOT EXISTS (
--     SELECT firstName FROM staff where firstName = 'Aleksey' and surname = 'Kotanin' and post = 'Uborshik' and salary = 50000 and age = 56
-- ) LIMIT 1;


CREATE TABLE IF NOT EXISTS person (
id int unsigned NOT NULL auto_increment,
login varchar(30) NOT NULL,
password varchar(32) NOT NULL,
privelegy int NOT NULL default 0,
PRIMARY KEY (id)
) ;

CREATE TABLE `images` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `uploaded_on` datetime NOT NULL,
 `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER DATABASE appDB CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE person CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO person (login, password, privelegy) 
SELECT * FROM (SELECT 'user', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0) AS tmp
WHERE NOT EXISTS (
    SELECT login FROM person WHERE login = 'user' AND password = 'd8578edf8458ce06fbc5bb76a58c5ca4' AND privelegy = 0
) LIMIT 1;

INSERT INTO person (login, password, privelegy) 
SELECT * FROM (SELECT 'admin', '698d51a19d8a121ce581499d7b701668', 0) AS tmp
WHERE NOT EXISTS (
    SELECT login FROM person WHERE login = 'user' AND password = 'd8578edf8458ce06fbc5bb76a58c5ca4' AND privelegy = 0
) LIMIT 1;

INSERT INTO person (login, password, privelegy) 
SELECT * FROM (SELECT 'ivan', '202cb962ac59075b964b07152d234b70', 0) AS tmp
WHERE NOT EXISTS (
    SELECT login FROM person WHERE login = 'admin' AND password = '202cb962ac59075b964b07152d234b70' AND privelegy = 0
) LIMIT 1;