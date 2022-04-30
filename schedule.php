<?php 
require "./db.php";
require "./res.php";

switch($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        if($_POST["event_id"]) {
            return addSchedule();
        }
        break;

        // default:
            // header("HTTP/1.1 404 URL Not found");
            // die();
}

function getSchedule() {
    $db = new Database();
    $res = $db->select("SELECT * from events")->fetch_all(MYSQLI_ASSOC);
    res(1,"ambil data schedule berhasil",$res);
    var_dump($res);
   
}

getSchedule();



function addSchedule() 
{
    try {
    
        $db = new Database();
        $cek = $db->insert_data(
        "INSERT INTO events (event_id,event_type_id,created_by,event_name,event_start_time,event_end_time,event_description,batch_id,modul_id) VALUES (?,?,?,?,?,?,?,?,?)",
        'iisssssii',
            $_POST["event_id"],
            $_POST["event_type_id"],
            $_POST["created_by"],
            $_POST["event_name"],
            $_POST["event_start_time"],
            $_POST["event_end_time"],
            $_POST["event_description"],
            $_POST["batch_id"],
            $_POST["modul_id"]
        ) ;
        
 if($cek) {
   res(1,"tambah data schedule berhasil disimpan",null);
 } else {
 res(0,"tambah data schedule gagal disimpan",null);    
 }


}catch(Exception $e) {
    res(0, $e->getMessage(),null);
    die();
}



}


?>