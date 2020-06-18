<?php
session_start();
require_once "pdo.php";
require_once "bootstrap.php";
if( ! isset($_SESSION['user'])){
    die("ACCESS DENIED");
}
$sql = 'SELECT make, autos_id from autos where autos_id=:val';
$res = $pdo->prepare($sql);
$res->execute(
    array(
        ':val' => $_REQUEST['autos_id']
    ));
$row = $res->fetch(PDO::FETCH_ASSOC);
echo("<h2>Confirm: Deleting ".htmlentities($row['make'])."</h2>");
if( isset($_POST['delete']) && isset($_POST['id']) ){
    $sql = 'DELETE from autos where autos_id=:val';
$res = $pdo->prepare($sql);
$res->execute(array(
        ':val' => $_POST['id']
    ));

    $_SESSION['SUCCESS'] = "<p class='text-center' style='color:green;'>Record deleted</p>";
        header("Location: ../index.php");
        return;
}

?>
<html>
<head>
<title>
Sri Swathi Nimmagadda
</title>
</head>
<body>
    <form class="form-group" method="post">
    <input class="btn btn-lg" type="submit" name="delete" value="Delete" />
    <input type="hidden" name="id" value="<?= htmlentities($row['autos_id']) ?>">
    <a href="../index.php">Cancel</a>

    </form>
</body>
</html>