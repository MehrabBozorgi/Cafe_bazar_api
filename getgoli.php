<?php
include "connect.php";
$apps=array();
$query="SELECT id,name,kind,icon,big_img FROM getgoli ";
$res=$connection->prepare($query);
$res->execute();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["id"]=$row["id"];
    $record["name"]=$row["name"];
    $record["kind"]=$row["kind"];
    $record["icon"]=$row["icon"];
    $record["big_img"]=$row["big_img"];

    $apps[]=$record;
}

echo JSON_encode($apps);
