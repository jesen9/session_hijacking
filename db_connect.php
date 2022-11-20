<?php $db_connect = new mysqli("localhost","root","","secprog_mid"); ?>

QUERY:

CREATE TABLE `User` (
ID INT AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(255),
Password VARCHAR(50)
);

INSERT INTO `User` (Username, Password) VALUES
('Admin', 'ae0bd9f322740f14e978c1040c137d46a2bf4a3b'),
('Maintainer', 'bb52f0e5030b95e89341de51e1966909daa645c1');
