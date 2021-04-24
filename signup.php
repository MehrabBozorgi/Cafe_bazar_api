<?php
include "connect.php";

$phone = $_POST["phone"];

$query = "SELECT * FROM user WHERE phone=:phone";
$res = $connection->prepare($query);
$res->bindParam(":phone", $phone);
$res->execute();
$row = $res->fetchColumn();

    if ($row > 0) {
        echo '{"status":"success","message":"این ایمیل قبلا ثبت شده"}';
    }
else {
    $sql = "INSERT INTO user (phone) value (:phone)";
    $res = $connection->prepare($sql);
    $res->bindParam(":phone", $phone);
    $res->execute();

    echo '{"status":"success","message":"ثبت نام با موفقیت انجام شد"}';
}
