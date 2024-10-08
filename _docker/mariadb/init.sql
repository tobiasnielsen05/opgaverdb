CREATE DATABASE IF NOT EXISTS webshop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE webshop;

CREATE TABLE IF NOT EXISTS produkter (
	prodId INT AUTO_INCREMENT PRIMARY KEY,
	prodNavn VARCHAR(255) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO produkter (prodNavn) VALUES ('Bukser'), ('Bluse');

CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'secretPassword';
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%';
FLUSH PRIVILEGES;
