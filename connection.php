<?php

$servername = "localhost";
$username = "root";
$password = "root";


try {
    $conn=new PDO("mysql:host=$servername;dbname=psespace",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

} catch(PDOException $e){
    echo "Connection faile:".$e->getMessage();
}






