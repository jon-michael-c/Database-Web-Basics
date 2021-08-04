<?php

$con = mysqli_connect("localhost", "root", "12345", "testdb");
$response = array();

if($con) {
    echo "DB CONNECTED";
    $sql = "SELECT * FROM summer";
    $result = mysqli_query($con, $sql);

    if ($result) {
	$i=0;
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Year'] = $row ['Year'];
            $response[$i]['City'] = $row ['City'];
            $response[$i]['Athlete'] = $row ['Athlete'];
            $i++;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "DB CONNECTION FALIED";
}





?>
