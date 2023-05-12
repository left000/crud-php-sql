<?php
include_once("db.php");
// $c = connesione();
// $users = getUsers($c);

// echo $_SERVER['REQUEST_METHOD'];
$success = $title_error = $description_error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST["save_task"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        if(empty($title))  $title_error = "Campo obligatorio";
        if(empty($description)) $description_error = "Campo obligatorio";
        // if(strlen($title) < 5) $title_error = "Campo troppo corto";
        // if(strlen($description) < 5) $description_error = "Campo troppo corto";
        if($title != "" && $description !=""){
        $insert = $c->prepare("INSERT INTO task (title, description) VALUES (:title, :description)");
        $insert->bindParam(':title', $title);
        $insert->bindParam(':description', $description);
        $insert->execute();
        $success = "Post creato con successo";
        }
        header("location: index.php");
        
    }
}




?>