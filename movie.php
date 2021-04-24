<?php
include "connect.php";
$apps=array();
$query="SELECT * FROM movie ";
$res=$connection->prepare($query);
$res->execute();
while($row=$res->fetch(PDO::FETCH_ASSOC)){

    $record=array();
    $record["id"]=$row["id"];
    $record["name"]=$row["name"];
    $record["icon"]=$row["icon"];
    $record["cat"]=$row["cat"];
    $record["cat_id"]=$row["cat_id"];
    $record["age"]=$row["age"];
    $record["zaban"]=$row["zaban"];
    $record["zir_nevis"]=$row["zir_nevis"];
    $record["description"]=$row["description"];
    $record["point"]=$row["point"];
    $record["kodom_site"]=$row["kodom_site"];
    $record["time"]=$row["time"];
    $record["tools"]=$row["tools"];
    $record["sale_sakh"]=$row["sale_sakh"];
    $record["country"]=$row["country"];
    $record["keyfiat"]=$row["keyfiat"];

    $apps[]=$record;
}
shuffle($apps);


echo JSON_encode($apps);
