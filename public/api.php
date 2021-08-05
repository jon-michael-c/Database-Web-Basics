<?php

$con = mysqli_connect("localhost", "root", "12345", "testdb");
$response = array();

if($con) {
    $sql = "SELECT * FROM summer";
    $result = mysqli_query($con, $sql);

    if ($result) {
	header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
	$i=1;
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Year'] = $row ['Year'];
            $response[$i]['City'] = $row ['City'];
            $response[$i]['Discipline'] = $row ['Discipline'];
            $response[$i]['Athlete'] = $row ['Athlete'];
            $response[$i]['Country'] = $row ['Country'];
            $response[$i]['Gender'] = $row ['Gender'];
            $response[$i]['Event'] = $row ['Event'];
            $response[$i]['Medal'] = $row ['Medal'];
            $i++;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "DB CONNECTION FALIED";
}





?>
