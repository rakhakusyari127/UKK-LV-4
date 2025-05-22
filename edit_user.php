<?php
include('koneksi.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$id"));
}

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', role='$role' WHERE user_id=$id");
    header('Location: superadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdecea;
            color: #b71c1c;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            border: 1px solid #b71c1c;
            border-radius: 8px;
            display: inline-block;
            padding: 30px 40px;
            box-shadow: 0 0 10px rgba(183, 28, 28, 0.2);
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background-color: #b71c1c;
            color: #fff;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #7f1212;
        }
    </style>
    <meta http-equiv="refresh" content="3;url=superadmin.php" />
</head>
<body
    <h2>Edit User</h2>
    <form method="post">
        <input type="text" name="username" value="<?= $user['username'] ?>" required>
        <input type="text" name="password" value="<?= $user['password'] ?>" required>
 
        <select name="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>user</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
            <option value="superadmin" <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>superadmin</option>
        </select>
        <input type="submit" name="update" value="UPDATE">
    </form>
</body>
</html>