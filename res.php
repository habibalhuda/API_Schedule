<?php 
function res($status, $message, $data)  {
    $res = [
        "status" => $status,
        "message" => $message,
        "data" => $data
    ];
    header("Content-Type: application/json");
    echo json_encode($res);
}   
?>