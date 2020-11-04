<?php

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

include_once '../DBConnect.php';

$db = new DBConnect();
$conn = $db->connect();

try {
    $sql = 'INSERT INTO users(name, email, phone) VALUES (:name, :email, :phone)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    header('location: ../index.php');

}catch (PDOException $exception){
    echo $exception->getMessage();
    die();
}


