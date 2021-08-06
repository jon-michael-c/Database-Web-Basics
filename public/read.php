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
