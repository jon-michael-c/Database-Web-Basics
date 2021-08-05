<?php
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    $con = mysqli_connect("localhost", "root", "12345", "testdb");
    
    if(!$con){
    die('Could not connect: '.mysqli_error());
    }
    
    $result = mysqli_query($con, "SELECT * FROM titles");
    
    while($row = mysqli_fetch_assoc($result)){
    $output[]=$row;
    }
    
    print(json_encode($output, JSON_PRETTY_PRINT));
    
    mysqli_close($con);
    

    



?>
