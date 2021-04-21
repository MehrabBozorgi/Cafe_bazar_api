<?php
include "connect.php";

$email = $_POST["email"];
$pass = $_POST["pass"];

$query = "SELECT * FROM user WHERE email=:email AND pass=:pass";
$res = $connection->prepare($query);
$res->bindParam(":email", $email);
$res->bindParam(":pass", $pass);
$res->execute();
$row=$res->fetch(PDO::FETCH_ASSOC);

if ($row == false) {
    echo '{"result":"success","message":"ثبت نام با موفقیت انجام شد"}';
} else {
    echo '{"result":"field","message":"این ایمیل قبلا ثبت شده"}';
}


