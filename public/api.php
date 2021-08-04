<?php

require_once __DIR__ . '/config.php';

class API {
    function Select() {
        $db = new Connect;
        $summer = array();
        $data = $db->prepare('SELECT * FROM summer');
        $data->execute();

        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $summer[$OutputData['Year']] = array(
                'Year' => $OutputData['Year'],
                'City' => $OutputData['City'],
                'Sport' => $OutputData['Sport']
            );
        }

        return json_encode($summer);
    }



}

    $API = new API;

    header('Content-Type: application/json');

    echo $API->Select();
?>
