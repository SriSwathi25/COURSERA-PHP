<?php
session_start();
require_once "pdo.php";
if(isset($_POST['cancel'])){
    header('Location:http://localhost/Coursera/week5/CRUD-1/add.php');
    return;
}
$sql = 'SELECT * from users where uid=:val';
$res = $pdo->prepare($sql);
$res->execute(array(
    ':val'=>$_GET['uid']
));
$row = $res->fetch(PDO::FETCH_ASSOC);
if($row == False){
    $_SESSION['error']="<p style='color:red'>Bad EDIT Request.</p>";
    header('Location:add.php');
    return;
}
if(isset($_POST['edit']) && $_POST['uid'] && $_POST['name'] && isset($_POST['email']) && isset($_POST['password'])){
    $sql = "Update users set name=:name, email=:email, password=:password WHERE uid=:val";
    $res = $pdo->prepare($sql);
$res->execute(array(
    ':name'=>$_POST['name'],
    ':email'=>$_POST['email'],
    ':password'=>$_POST['password'],
    ':val'=>$_POST['uid']
));
$_SESSION['success']="<p style='color:green'>Record Editted Successfully.</p>";
header('Location:http://localhost/Coursera/week5/CRUD-1/add.php');
    return;
    
}


?>
<html>
<head></head>
<body>
<form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?= htmlentities($row['name']) ?>" />
    <br>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlentities($row['email']) ?>" />
    <br>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?= htmlentities($row['password']) ?>" />
    <br>
    <br>
    <input type="hidden" name="uid" value="<?= htmlentities($row['uid']); ?>" />
    <input type="submit" name="edit" value="UPDATE" />
    <br><br>
    <input type="submit" name="cancel" value="Cancel" />
    </form>
    
    </form>
</body>
</html>