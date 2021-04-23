<?php
include "connect.php";
$apps = array();
$query = "SELECT * FROM application ";
$res = $connection->prepare($query);
$res->execute();
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $record = array();
    $record["id"] = $row["id"];
    $record["name"] = $row["name"];
    $record["description"] = $row["description"];
    $record["kind"] = $row["kind"];
    $record["cat"] = $row["cat"];
    $record["cat_id"] = $row["cat_id"];
    $record["downloads"] = $row["downloads"];
    $record["size"] = $row["size"];
    $record["img_slide"] = $row["img_slide"];
    $record["version"] = $row["version"];
    $record["icon"] = $row["icon"];
    $record["developer_phone"] = $row["developer_phone"];
    $record["developer_name"] = $row["developer_name"];
    $record["developer_email"] = $row["developer_email"];
    $record["developer_web"] = $row["developer_web"];

    $apps[] = $record;
}
shuffle($apps);

echo JSON_encode($apps);