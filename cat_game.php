<?php
include "connect.php";
$apps=array();
$query="SELECT id,cat_name,cat_icon FROM cat_game ";
$res=$connection->prepare($query);
$res->execute();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["id"]=$row["id"];
    $record["cat_name"]=$row["cat_name"];
    $record["cat_icon"]=$row["cat_icon"];

    $apps[]=$record;
}

echo JSON_encode($apps);
