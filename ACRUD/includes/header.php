<?php
include_once("db.php"); 
include_once("search.php");
$success ="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MYSQL CRUD </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    

</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class ="navbar-brand">PHP MYSQL CRUD <i class="fa fa-user"></i></a>
            <form class="d-flex" method="POST">
                <a href="login.php" class="btn btn-success" >LOGIN</a>
                <a href="registrati.php" class="btn btn-success" type="submit">REGISTRATI</a>
                <input class="form-control me-2 ml-3" name ="search" type="search" placeholder="search" aria-label="search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <?php if($success){ ?>
                <div class="alert alert-success" role="alert">
                <?php echo $success ?>
                </div>
    <?php  } ?>
