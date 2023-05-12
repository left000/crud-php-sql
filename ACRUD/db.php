<?php
session_start();
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
$c = new pdo("mysql:host=localhost;dbname=php_mysql_crud;charset=utf8mb4;", "root", "", $options);




// function connesione(){
//     session_start();
//     $options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false
//     ];
//      return new pdo("mysql:host=localhost;dbname=php_mysql_crud;charset=utf8mb4;", "root", "", $options);



// }
// function getUsers($c){

//    $stmt = $c->prepare("SELECT * FROM users");
//    $stmt->execute();
//     return $stmt;
// }





?>                                                    
