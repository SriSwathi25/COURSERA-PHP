<?php
session_start();
require_once "pdo.php";
if(isset($_POST['cancel'])){
    header('Location:http://localhost/Coursera/week5/CRUD-1/add.php');
    return;
}
if(isset($_POST['delete']) && $_POST['uid']){
    $sql = 'DELETE from users where uid=:val';
$res = $pdo->prepare($sql);
$res->execute(array(
    ':val'=>$_POST['uid']
));
$_SESSION['success']="<p style='color:green'>Record Deleted Successfully.</p>";
header('Location:http://localhost/Coursera/week5/CRUD-1/add.php');
    return;
    
}

        
    
$sql = 'SELECT name, uid from users where uid=:val';
$res = $pdo->prepare($sql);
$res->execute(array(
    ':val'=>$_GET['uid']
));
$row = $res->fetch(PDO::FETCH_ASSOC);
if($row == False){
    $_SESSION['error']="<p style='color:red'>Bad Delete Request.</p>";
    header('Location:add.php');
    return;
}
?>
<html>
<head></head>
<body>
    <span><h1>Confirm Deleting : <?= htmlentities($row['name']); ?>  ?</h1></span>
    <form  method="post">
    <input type="hidden" name="uid" value="<?= htmlentities($row['uid']); ?>" />
    <input type="submit" name="delete" value="DELETE" />
    <br><br>
    <input type="submit" name="cancel" value="CANCEL" />
    
    </form>
</body>
</html>