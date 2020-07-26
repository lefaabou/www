<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/voisin.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Voisin($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleVoisin();

    if($item->name != null){
        // create array
        $voi_arr = array(
            "id" =>  $item->id,
            "name" => $item->name,
            "phone" => $item->phone,
            "address" => $item->address,
            "about" => $item->about,
            "favoris" => $item->favoris
        );
      
        http_response_code(200);
        echo json_encode($voi_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Voisin not found.");
    }
?>