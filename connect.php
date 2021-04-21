<?php
$server="localhost";
$user="root";
$pass="";
$dbname="update_cafe_bazar";

$dsn="mysql:host=$server;dbname=$dbname";
try{
    $connection=new PDO($dsn,$user,$pass);
    $connection->exec("SET character_set_connection='utf8'");
    $connection->exec("SET NAMES 'UTF8'");

}catch(PDOException $error){
    echo "unable to connect ".$error->getMessage();
}



?>


