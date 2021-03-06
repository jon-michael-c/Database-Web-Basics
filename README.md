# Database and Web Basics
<img src="https://user-images.githubusercontent.com/53241212/128379975-4fe90fe8-c277-49bb-abc3-400d041e996a.jpg" width=700px text-align="center" >
<h2>Tasks</h2>
<ol>
  <li><a href="#creating-a-database">Create a simple database</a></li>
  <li><a href="#creating-an-api-server">Set up an API server</a></li>
  <li><a href="#webpage-and-deploying-to-a-server">Create a webpage and deploy to a server </a></li>
</ol>

This project will use a LAMP stack for the web application. The goal of this application is to search Netflix titles from an API made from an database. 

<h3>Technologies Used</h3>
<ul>
  <li><a href="https://ubuntu.com/">Linux(Ubuntu)</a></li>
  <li><a href="https://www.apache.org/">Apache 2</a></li>
  <li><a href="https://www.mysql.com/">MySQL</a></li>
  <li><a href="https://www.php.net/">PHP</a></li>
  <li><a href="https://console.cloud.google.com/getting-started">Google Cloud Platform (For Deployment)</a></li>
</ul>

<h3><a href="http://34.121.233.142">Preview of Web App</a></h3>

# Creating a Database
MySQL was used for the back-end database for this web application. It was installed using `apt install mysql` command on linux. By default, the installation process should prompt you to configure the database and accounts that will be using it. From there, `mysql -u root -p` command can be used to enter queries into the databases.`SHOW DATABASES` displays all the current databases.

![Screenshot from 2021-08-05 12-54-19](https://user-images.githubusercontent.com/53241212/128390293-6ab49d9c-b33c-4772-ac0c-5795fa02a4d8.png)


<h3>Creating Database and Table</h3>

Use `CREATE DATABASE [DBNAME]` to create an database.

![Screenshot from 2021-08-05 12-56-22](https://user-images.githubusercontent.com/53241212/128390535-5d17d5d2-6840-4ddf-8cee-340a26ea4085.png)

To make a table select a database using `USE [DBNAME]` and `CREATE TABLE [TBNAME]` followed by the table parameters.

![Screenshot from 2021-08-05 13-19-46](https://user-images.githubusercontent.com/53241212/128393737-e3a88962-837b-4565-be53-55c77ad6e1bd.png)

<h3>Inserting records and deleting records</h3>

Inserting an entry into table can be done through `INSERT INTO` query. Deleting an entry is done by `DELETE FROM [TBNAME] WHERE [CONDITION]`.

![Screenshot from 2021-08-05 13-45-00](https://user-images.githubusercontent.com/53241212/128396776-754a0eb9-2149-4ead-88d7-d71d3d0c8666.png)

![Screenshot from 2021-08-05 13-46-33](https://user-images.githubusercontent.com/53241212/128397002-b02b27f3-d554-44df-897c-9da4a4e0e214.png)

<h3>Updating records</h3>

Updating records can be accomplished by `UPDATE [TBNAME] SET [VALUE] WHERE [CONDITION]`.

![Screenshot from 2021-08-05 13-48-06](https://user-images.githubusercontent.com/53241212/128397734-c0b3b94f-3342-4a49-8418-6f556bdac10c.png)

<h3>Dropping table(s) and database</h3>

To drop tables and databases, use `DROP TABLE` or `DROP DATABASE`.

![Screenshot from 2021-08-05 13-53-26](https://user-images.githubusercontent.com/53241212/128397829-201f9dc8-532e-4e7e-886c-694e7541e5c3.png)

<h3>Importing from CSV</h3>

Putting a csv into a table set can be completed by using SQL's `LOAD DATA LOCAL INFILE` query. First you must create the table on which you are placing the data into. Then specify the file location and enter the proper csv parameters. 
<br/>
<br/>
For example, in this project, a csv file was imported from <a href="https://www.kaggle.com/shivamb/netflix-shows">Kaggle<a> with Netflix titles data. This file can be found <a href="https://github.com/jon-michael-c/Database-Web-Basics/blob/main/netflix_titles.csv"> here </a> in the repository.
  
  
<pre><code>CREATE TABLE titles (
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
INTO TABLE summer
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROW
  </code></pre>
<br/>
<br/>

<h3>Link to SQL script can be found <a href="https://github.com/jon-michael-c/Database-Web-Basics/blob/main/script.sql"> here </a> in the repository.</h3>


# Creating an API Server
An Rest API Server was created fron the Netflix title table in the database. The server was created using PHP to convert the MySQL table data into JSON format for an user to access.   
  
````
<?php
       // API Headers
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    // Connect to Database
    $con = mysqli_connect("localhost", "root", "12345", "testdb");
    
    // If no connection, display error.
    if(!$con){
    die('Could not connect: '.mysqli_error());
    }
    
    //Select Table
    $result = mysqli_query($con, "SELECT * FROM titles");
    
    while($row = mysqli_fetch_assoc($result)){
        $output[]=$row;
    }
    
    //Output in JSON Format.
    print(json_encode($output, JSON_PRETTY_PRINT));
    
    mysqli_close($con);
?>
````
 
  <h3>Link to the php file can be found <a href="https://github.com/jon-michael-c/Database-Web-Basics/blob/main/public/read.php">here</a> in the repository.</h3>
The API contains 12 attributes of titles on netflix.
<ol>
  <li>ID - Neflix ID</li>
  <li>Form - Movie or TV Show</li>
  <li>Title - Name</li>
  <li>Director - Director(s) of the film</li>
  <li>Cast - Cast of the film</li>
  <li>Country - Country in which it was filmed</li>
  <li>Added - Date it was added to Netflix</li>
  <li>Released - Year film was released</li>
  <li>Rating - Suitability for audiences</li>
  <li>Duration - Duration of the film</li>
  <li>Category - Genre Tag(s)</li>
  <li>Descripition - Short synopsis</li>
</ol>
    
# Webpage and Deploying to a Server

To interact with the data within an API on a webpage, we must fetch it's content with a javascript function. 
<pre><code>
const loadTitles = async () => {
    try {
        const res = await fetch('http://34.121.233.142/Database-Web-Basics/public/read.php');
        titleData = await res.json();
        console.log(titleData);
    
    } catch (err) {
        console.error(err);
    }
};

</code></pre>
  
We can use this data to create an event listener function where it will display the results based on the input from the user. Link the <a href="https://github.com/jon-michael-c/Database-Web-Basics/blob/main/public/app.js">script</a> to the <a href="https://github.com/jon-michael-c/Database-Web-Basics/blob/main/public/index.html">html</a> and <a href="https://github.com/jon-michael-c/Database-Web-Basics/blob/main/public/styles.css">style</a> with css. 

For deployment of the web app, Google Cloud Platform was used as a hosting service. The platform allows virtual machine instances to be run on their network. This particular web application is hosted on a linux(ubuntu) VM instance running an apache server. <br/>
  
All project files were created in the server directory on the linux machine. A html file lies in the parent folder for when a client enters the server it redirects to the <a href="https://github.com/jon-michael-c/Database-Web-Basics/tree/main/public">public folder</a> where the web app's main contents reside. <br />

 The apache server address is <a href="http://34.121.233.142">http://34.121.233.142</a>
  
![Screenshot from 2021-08-05 21-30-21](https://user-images.githubusercontent.com/53241212/128442273-b9535275-a75e-4a4b-a536-bc62cae73642.png)

