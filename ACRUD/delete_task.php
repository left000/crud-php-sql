<?php
include_once("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $insert =$c->query("DELETE FROM task WHERE id = $id");
        $insert->execute();
    
        $success = "Post eliminato con successo";
        header("location: index.php");
    }   
}
?>