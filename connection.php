<?php

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn=new PDO("mysql:host=$servername;dbname=psespace",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection failed:".$e->getMessage();
}
?>
