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
        ID VARCHAR(255) NOT NULL,
        Form VARCHAR(255) NOT NULL,
        Title VARCHAR(255) NOT NULL,
        Director VARCHAR(255) NOT NULL,
        Country VARCHAR(255) NOT NULL,
        Released VARCHAR(255) NOT NULL,
        Rating VARCHAR(255) NOT NULL,
        Duration VARCHAR(255) NOT NULL,
        Category VARCHAR(255) NOT NULL,
        Descripiton VARCHAR(255) NOT NULL
);

LOAD DATA LOCAL INFILE '/var/www/html/Database-Web-Basics/netflix_titles.csv'
INTO TABLE titles
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 31 ROWS

