--Delete Table
DROP TABLE Main;

--Create Table
CREATE TABLE Main (
    ID int NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
    Name varchar(50) NOT NULL,
    Address varchar(255),
    Phone varchar(50),
    Website varchar(50),
    Email varchar(50),
    Services varchar(255),
    Areas varchar(255)
);

--Add Data to Table
INSERT INTO Main ( ID , Name , Address , Phone , Website , Email , Services , Areas ) 
VALUES 
(NULL,'Ravenswood Community Serv.','Ravenswood Community Serv.','(773) 769-0282',NULL,NULL,'Food Pantry',NULL),		
(NULL,'Lakeview Pantry - West','1414 W. Oakdale','(773) 404-6333',NULL,NULL,'Food Pantry','Montrose-Irv Pk; Damen-Clark'),
(NULL,'New Seed Pantry','4716 N. Malden St.','(312) 450-5021',NULL,NULL,'Food Pantry',NULL),		
(NULL,'North Park Friendship Center','3448 W.Foster Ave.','(773) 267-8395',NULL,NULL,'Food Pantry',NULL),		
(NULL,'North Side Church of G-d','5145 N. Broadway St.','(845) 893-8825',NULL,NULL,'Food Pantry',NULL),	
(NULL,'Philipino American SSHRC','1511 W. Irving Pk Rd','(773) 296-4532',NULL,NULL,'Food Pantry',NULL),
(NULL,'Uptown Food for Families','1001 W. Wilson Ave','(773) 562-3320',NULL,NULL,'Food Pantry',NULL),
(NULL,'St. Thomas of Canterbury','4827 N. Kenmore Ave','(773) 878-5507',NULL,NULL,'Food Pantry','60640'),
(NULL,'Regional Transport Authority',NULL,NULL,NULL,NULL,'Reduced Fare','Counties of Cook, Dupage, Kane, Lake, McHenry, Will'),
(NULL,'Share Our Strength (No Koid Hungry Campaign)',NULL,'Text "FOOD" to 877877',NULL,NULL,NULL,'All'),
(NULL,'ADA ParaTransit',NULL,'(312) 663-4357',NULL,NULL,NULL,NULL),
(NULL,'Southeast Asia Center','5120 N Broadway','(773) 989-6927',NULL,NULL,'Energy Assistance',NULL),		
(NULL,'Housing Opportunities & Maint for the Elderly (H.O.M.E.)',NULL,'(773) 295-2709',NULL,NULL,'movers','Chicago IL'),
(NULL,'Transitions',NULL,'(844)244-1066','transitionshomemedicalgroup.com',NULL,'Palliative Care (quality of Life)','North & Central counties in Illinois'),
(NULL,'Transitions',NULL,'(877)726-6494','transitionshospice.com',NULL,'Hospice','North & Central counties in Illinois'),
(NULL,'A Just Harvest','7649 N. Paulina Ave.','(773) 262-2297',NULL,NULL,'Food Pantry',NULL);		