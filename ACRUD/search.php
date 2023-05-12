<?php
include_once("db.php");
$search = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $search = htmlspecialchars(trim($_POST["search"]));
    $query = $c->query("SELECT * FROM task WHERE title LIKE '%$search%';");
    $query->execute();
}

?>
