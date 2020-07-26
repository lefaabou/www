<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/voisin.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Voisin($db);

    $stmt = $items->getVoisin();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0){
        
        $voisinArr = array();
        $voisinArr["body"] = array();
        $voisinArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "phone" => $phone,
                "address" => $address,
                "about" => $about
            );

            array_push($voisinArr["body"], $e);
        }
        echo json_encode($voisinArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>