<?php
include "connect.php";

$id=$_GET["id"];

$query = "SELECT application.*
,img_slide.application_id,img_slide.img_url
FROM application JOIN img_slide ON img_slide.application_id = application.id 
WHERE application.id= $id";
$res = $connection->prepare($query);
$res->execute();
$slide = array();
$apps = array();
$comments = array();

while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

    $apps["id"] = $row["id"];
    $apps["name"] = $row["name"];
    $apps["description"] = $row["description"];
    $apps["kind"] = $row["kind"];
    $apps["cat"] = $row["cat"];
    $apps["cat_id"] = $row["cat_id"];
    $apps["downloads"] = $row["downloads"];
    $apps["size"] = $row["size"];
    $apps["img_slide"] = $row["img_slide"];
    $apps["version"] = $row["version"];
    $apps["icon"] = $row["icon"];
    $apps["developer_phone"] = $row["developer_phone"];
    $apps["developer_name"] = $row["developer_name"];
    $apps["developer_email"] = $row["developer_email"];
    $apps["developer_web"] = $row["developer_web"];
    $apps["apk"] = $row["apk"];
    $apps["application_id"] = $row["application_id"];

//    $apps["img_url"] = $row["img_url"];

}
$query2="SELECT * FROM img_slide WHERE application_id = $id";
$res2=$connection->prepare($query2);
$res2->execute();

while($row2=$res2->fetch(PDO::FETCH_ASSOC)){

    $slide[]=$row2["img_url"];

}
$apps["slide"]=$slide;


$query3 = "SELECT * FROM comment_application WHERE application_id = $id";
$res3 = $connection->prepare($query3);
$res3->execute();

while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)) {

    $comment = array();

    $comment["id"] = $row3["id"];
    $comment["comment_name"] = $row3["comment_name"];
    $comment["date"] = $row3["date"];
    $comment["comment"] = $row3["comment"];
    $comment["application_id"] = $id;


    $comments[] = $comment;
}
$apps["comment"] = $comments;

echo JSON_encode($apps);
//print_r($apps);

