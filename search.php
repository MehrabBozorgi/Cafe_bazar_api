<?php
include "connect.php";
$search = $_GET["search"];

$query1 = "SELECT * FROM game WHERE name like '%" . $search . "%' ";
$query2 = "SELECT * FROM application WHERE name like '%" . $search . "%' ";

$res1 = $connection->prepare($query1);
$res2 = $connection->prepare($query2);

$allads = array();
$allads2 = array();

$res1->bindParam(":search", $search);
$res2->bindParam(":search", $search);
$res1->execute();
$res2->execute();
while ($row1 = $res1->fetch(PDO::FETCH_ASSOC)) {

    $record1 = array();
    $record1["id"] = $row1["id"];
    $record1["name"] = $row1["name"];
    $record1["description"] = $row1["description"];
    $record1["kind"] = $row1["kind"];
    $record1["cat"] = $row1["cat"];
    $record1["cat_id"] = $row1["cat_id"];
    $record1["download"] = $row1["download"];
    $record1["size"] = $row1["size"];
    $record1["img_slide"] = $row1["img_slide"];
    $record1["version"] = $row1["version"];
    $record1["icon"] = $row1["icon"];
    $record1["developer_phone"] = $row1["developer_phone"];
    $record1["developer_name"] = $row1["developer_name"];
    $record1["developer_email"] = $row1["developer_email"];
    $record1["developer_web"] = $row1["developer_web"];

    $allads[] = $record1;
}
while ($row2 = $res2->fetch(PDO::FETCH_ASSOC)) {

    $record2 = array();
    $record2["id"] = $row2["id"];
    $record2["name"] = $row2["name"];
    $record2["description"] = $row2["description"];
    $record2["kind"] = $row2["kind"];
    $record2["cat"] = $row2["cat"];
    $record2["cat_id"] = $row2["cat_id"];
    $record2["downloads"] = $row2["downloads"];
    $record2["size"] = $row2["size"];
    $record2["img_slide"] = $row2["img_slide"];
    $record2["version"] = $row2["version"];
    $record2["icon"] = $row2["icon"];
    $record2["developer_phone"] = $row2["developer_phone"];
    $record2["developer_name"] = $row2["developer_name"];
    $record2["developer_email"] = $row2["developer_email"];
    $record2["developer_web"] = $row2["developer_web"];

    $allads[] = $record2;
}
echo json_encode($allads);

//$search=$_GET["search"];
//
//$query2="SELECT id,name FROM application WHERE name like '%".$search."%' ";
//$res2=$connection->prepare($query2);
//$allads2=array();
//$res2->bindParam(":search",$search);
//$res2->execute();
//while ($row2=$res2->fetch(PDO::FETCH_ASSOC)){
//
//    $record2 = array();
//    $record2["id"] = $row2["id"];
//    $record2["name"] = $row2["name"];
//
//    $allads2[]=$record2;
//}
//echo json_encode($allads2);