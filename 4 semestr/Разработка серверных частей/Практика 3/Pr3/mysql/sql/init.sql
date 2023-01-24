CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  surname VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Alex', 'Rover') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Alex' AND surname = 'Rover'
) LIMIT 1;

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Bob', 'Marley') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Bob' AND surname = 'Marley'
) LIMIT 1;

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Admin', '$apr1$E34A6M3h$j7yIdtUsNaP.V5ltLCjNU/') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Admin' AND surname = '$apr1$E34A6M3h$j7yIdtUsNaP.V5ltLCjNU/'
) LIMIT 1;

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Kate', '$apr1$moM50nzF$DHwCz31zQe7y5GeLLyix10') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Kate' AND surname = '$apr1$moM50nzF$DHwCz31zQe7y5GeLLyix10'
) LIMIT 1;

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Lilo', 'Black') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Lilo' AND surname = 'Black'
) LIMIT 1;
