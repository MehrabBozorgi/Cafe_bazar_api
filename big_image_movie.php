<?php
include "connect.php";
$apps=array();
$query="SELECT * FROM big_image_movie ";
$res=$connection->prepare($query);
$res->execute();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["id"]=$row["id"];
    $record["image"]=$row["image"];


    $apps[]=$record;
}

echo JSON_encode($apps);
