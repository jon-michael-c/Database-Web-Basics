-- Create Database and Table
CREATE DATABASE testdb;

USE testdb;

CREATE TABLE Person (Id int(10) NOT NULL, First_Name varchar(10), Last_Name varchar(10));

-- Inserting and Deleting Records
INSERT INTO Person (Id, First_Name, Last_Name) VALUES (1, 'John', 'Smith');
INSERT INTO Person (Id, First_Name, Last_Name) VALUES (2, 'Michael', 'Jordan');
INSERT INTO Person (Id, First_Name, Last_Name) VALUES (3, 'Joe', 'Brown');
DELETE FROM Person WHERE Id=3;

-- Updating Table
UPDATE Person SET last_name = 'Jackson' WHERE Id=2; 

-- Dropping Table 
DROP TABLE Person;

-- Importing CSV
CREATE TABLE titles (
        ID VARCHAR(700) NOT NULL,
        Form VARCHAR(700) NOT NULL,
        Title VARCHAR(700) NOT NULL,
        Director VARCHAR(700) NOT NULL,
	Cast VARCHAR(700) NOT NULL,
        Country VARCHAR(700) NOT NULL,
        Added VARCHAR(700) NOT NULL,
        Released VARCHAR(700) NOT NULL,
        Rating VARCHAR(700) NOT NULL,
        Duration VARCHAR(700) NOT NULL,
        Category VARCHAR(700) NOT NULL,
	Descripition VARCHAR(1000) NOT NULL
);

LOAD DATA LOCAL INFILE '/var/www/html/Database-Web-Basics/netflix_titles.csv'
INTO TABLE titles
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 200 ROWS

