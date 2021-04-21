<?php
include "connect.php";
$id=$_GET["id"];

$query = "SELECT movie.*,fasl.id,fasl.chand_fasl,fasl.movie_id
FROM movie JOIN fasl ON fasl.movie_id = movie.id 
WHERE movie.id= $id ";
$res = $connection->prepare($query);
$res->execute();
$apps = array();
$faslha = array();

while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

    $apps["id"] = $row["id"];
    $apps["name"] = $row["name"];
    $apps["icon"] = $row["icon"];
    $apps["cat"] = $row["cat"];
    $apps["cat_id"] = $row["cat_id"];
    $apps["age"] = $row["age"];
    $apps["zaban"] = $row["zaban"];
    $apps["zir_nevis"] = $row["zir_nevis"];
    $apps["description"] = $row["description"];
    $apps["point"] = $row["point"];
    $apps["kodom_site"] = $row["kodom_site"];
    $apps["time"] = $row["time"];
    $apps["tools"] = $row["tools"];
    $apps["sale_sakh"] = $row["sale_sakh"];
    $apps["country"] = $row["country"];
    $apps["keyfiat"] = $row["keyfiat"];
    $apps["fasl_id"] = $row["fasl_id"];
    $apps["movie_id"] = $row["movie_id"];

}
$query3 = "SELECT * FROM fasl WHERE movie_id = $id";
$res3 = $connection->prepare($query3);
$res3->execute();

while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {

    $fasl = array();
    $fasl["id"] = $row3["id"];
    $fasl["chand_fasl"] = $row3["chand_fasl"];
    $fasl["movie_id"] = $id;

    $faslha[] = $fasl;
}
$apps["faslha"] = $faslha;

echo JSON_encode($apps);

