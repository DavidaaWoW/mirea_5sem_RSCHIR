CREATE DATABASE IF NOT EXISTS RSCHIR3;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON RSCHIR.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE RSCHIR3;
CREATE TABLE IF NOT EXISTS brand (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  logo TEXT,
  PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS car (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  image TEXT,
  brandId INT(11),
  PRIMARY KEY (ID)
);

INSERT INTO brand (name, logo)
SELECT * FROM (SELECT 'audi', 'https://autocomplex78.ru/wp-content/uploads/2020/07/audi-2048x1152.png') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM brand WHERE name = 'audi' AND logo = 'https://autocomplex78.ru/wp-content/uploads/2020/07/audi-2048x1152.png'
) LIMIT 1;

INSERT INTO brand (name, logo)
SELECT * FROM (SELECT 'bmw', 'https://main-cdn.sbermegamarket.ru/big2/hlr-system/1481104/100023608402b0.jpg') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM brand WHERE name = 'bmw' AND logo = 'https://main-cdn.sbermegamarket.ru/big2/hlr-system/1481104/100023608402b0.jpg'
) LIMIT 1;

INSERT INTO car (name, image, brandId)
SELECT * FROM (SELECT 'Audi Q7', 'http://cdn.motorpage.ru/Photos/800/3C97.jpg', 1) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM car WHERE name = 'Audi Q7' AND image = 'http://cdn.motorpage.ru/Photos/800/3C97.jpg' AND brandId = 1
) LIMIT 1;

INSERT INTO car (name, image, brandId)
SELECT * FROM (SELECT 'BMW i8', 'https://stylegarage.ru/uploads/_carbrand/id487/bmw-i8.jpg', 2) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM car WHERE name = 'BMW i8' AND image = 'https://stylegarage.ru/uploads/_carbrand/id487/bmw-i8.jpg' AND brandId = 2
) LIMIT 1;
