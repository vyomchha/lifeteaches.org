--Delete Table
DROP TABLE Clients;

--Create Table
CREATE TABLE Clients (
    ID int NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
    Name varchar(255) NOT NULL,
    Address varchar(255),
    Phone varchar(50),
    Email varchar(50),
    Photo varchar(255),
    Location varchar(255),
    Comments text
);

--Add Data to Table
INSERT INTO Clients ( ID , Name , Address , Phone , Email , Photo , Location , Comments ) 
VALUES 
(NULL,'Vyom Chhabra',NULL,NULL,NULL,'img/clients/cl1.jpg','Buffalo','Helped create the website<br>Tech Support'),
(NULL,'Yael Ellsworth',NULL,NULL,NULL,'img/clients/cl2.png','Chicago','Head of Lifeteaches<br>Founder of Lifeteaches');