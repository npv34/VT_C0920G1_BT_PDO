<?php

$idUser = $_REQUEST['id'];
include_once '../DBConnect.php';

$db = new DBConnect();
$conn = $db->connect();

$sql = 'DELETE FROM users WHERE id=' . $idUser;
$conn->query($sql);
header('location: ../index.php');
