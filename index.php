<?php
include_once 'DBConnect.php';

$db = new DBConnect();
$conn = $db->connect();

$sql = 'SELECT * FROM users';
$stmt = $conn->query($sql);
$users = $stmt->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 500px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        tr, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<a href="view/add_user.php">add new</a>
<table>
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Email</td>
        <td></td>
    </tr>
    <?php foreach ($users as $key => $user): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><a onclick="return confirm('are you sure?')" href="action/delete_user.php?id=<?php echo $user['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
