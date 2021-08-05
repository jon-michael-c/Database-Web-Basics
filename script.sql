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
CREATE TABLE summer (
        Year INT NOT NULL,
        City VARCHAR(255) NOT NULL,
        Sport VARCHAR(255) NOT NULL,
        Discipline VARCHAR(255) NOT NULL,
        Athlete VARCHAR(255) NOT NULL ,
        Country VARCHAR(255) NOT NULL,
        Gender VARCHAR(255) NOT NULL,
        Event VARCHAR(255) NOT NULL,
        Medal VARCHAR(255) NOT NULL
);

LOAD DATA LOCAL INFILE '/var/www/html/Database-Web-Basics/summer.csv'
INTO TABLE summer
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS

-- Dropping Database
DROP DATABASE testdb;

