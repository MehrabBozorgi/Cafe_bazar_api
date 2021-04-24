<?php
include "connect.php";
$id = $_GET["id"];

$query = "SELECT game.* ,cat_game.cat_name ,img_slide.img_url FROM game JOIN
 cat_game ON game.cat_id=cat_game.id JOIN img_slide ON game.img_slide=img_slide.application_id WHERE game.id=$id ";
//$res->bindParam(":id", $id);
$apps = array();
$slide = array();
$res = $connection->prepare($query);

$res->execute();
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

    $record = array();

    $record["id"] = $row["id"];
    $record["name"] = $row["name"];
    $record["description"] = $row["description"];
    $record["kind"] = $row["kind"];
    $record["cat_id"] = $row["cat_id"];
    $record["download"] = $row["download"];
    $record["size"] = $row["size"];
    $record["img_slide"] = $row["img_slide"];
    $record["version"] = $row["version"];
    $record["icon"] = $row["icon"];
    $record["developer_phone"] = $row["developer_phone"];
    $record["developer_name"] = $row["developer_name"];
    $record["developer_email"] = $row["developer_email"];
    $record["developer_web"] = $row["developer_web"];
    $record["apk"] = $row["apk"];
//    $record["cat_name"] = $row["cat_name"];
//    $record["cat_icon"] = $row["cat_icon"];
//    $record["application_id"] = $row["application_id"];
//    $record["img_url"] = $row["img_url"];

    $apps[] = $record;

}

echo JSON_encode($apps);

