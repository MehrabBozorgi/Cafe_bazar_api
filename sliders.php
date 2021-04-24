<?php
include "connect.php";
$apps=array();
$query="SELECT id,name,download,icon,image,size FROM sliders ";
$res=$connection->prepare($query);
$res->execute();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["id"]=$row["id"];
    $record["name"]=$row["name"];
    $record["download"]=$row["download"];
    $record["icon"]=$row["icon"];
    $record["image"]=$row["image"];
    $record["size"]=$row["size"];

    $apps[]=$record;
}

echo JSON_encode($apps);
