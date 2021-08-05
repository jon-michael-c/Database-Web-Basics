<?php

$con = mysqli_connect("localhost", "root", "12345", "testdb");
$response = array();

if($con) {
    $sql = "SELECT * FROM titles";
    $result = mysqli_query($con, $sql);

    if ($result) {
	header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
	$i=1;
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['ID'] = $row ['ID'];
            $response[$i]['Form'] = $row ['Form'];
            $response[$i]['Director'] = $row ['Director'];
            $response[$i]['Cast'] = $row ['Cast'];
            $response[$i]['Country'] = $row ['Country'];
            $response[$i]['Added'] = $row ['Added'];
            $response[$i]['Released'] = $row ['Country'];
            $response[$i]['Rating'] = $row ['Rating'];
            $response[$i]['Duration'] = $row ['Duration'];
            $response[$i]['Category'] = $row ['Category'];
            $response[$i]['Descripiton'] = $row ['Descripiton'];
            $i++;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "DB CONNECTION FALIED";
}





?>
