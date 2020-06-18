<?php
session_start();
if( ! isset($_SESSION['user'])){
    die("ACCESS DENIED");
}
require_once "pdo.php";
require_once "bootstrap.php";
$sql = 'SELECT * from autos where autos_id=:val';
$res = $pdo->prepare($sql);
$res->execute(
    array(
        ':val' => $_REQUEST['autos_id']
    ));
$row = $res->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage']) ){
    if(strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1){
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>All fields are required</p>";
        header("Location:../edit.php/?autos_id=".$_REQUEST['autos_id']);
        return;
    }
    if(! is_numeric($_POST['year']))
        {
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>Year must be an integer</p>";
        header("Location:../edit.php/?autos_id=".$_REQUEST['autos_id']);
        return;
    }

    if(! is_numeric($_POST['mileage']))
        {
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>Mileage must be an integer</p>";
        header("Location:../edit.php/?autos_id=".$_REQUEST['autos_id']);
        return;
    }
    else{
    $sql = "UPDATE autos set make=:make,model=:model,year=:year,mileage=:mileage where autos_id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage'],
        ':id' => $_REQUEST['autos_id']
    ));
        $_SESSION['SUCCESS'] = "<p class='text-center' style='color:green;'>Record edited</p>";
        header("Location:../index.php");
        return;
    }

}

?>
<html>
<head>
<title>
Sri Swathi Nimmagadda
</title>
</head>
<body>
<?php
        if(isset($_SESSION['ERROR'])){
            echo($_SESSION['ERROR']);
            unset($_SESSION['ERROR']);
        }
        if(isset($_SESSION['SUCCESS'])){
            echo($_SESSION['SUCCESS']);
            unset($_SESSION['SUCCESS']);
        }

    ?>
<div class="container">
    <div class="jumbotron">
    <form class="form-group" method="POST">
    Make   <input class="form-control" type="text" name="make" value="<?= htmlentities($row['make']) ?>"><br/>
    Model   <input class="form-control" type="text" name="model" value="<?= htmlentities($row['model']) ?>"><br/>
    Year   <input class="form-control" type="text" name="year" value="<?= htmlentities($row['year']) ?>"><br/>
    Mileage   <input class="form-control" type="text" name="mileage" value="<?= htmlentities($row['mileage']) ?>"><br/>
    
    <input class="btn btn-info" type="submit" value="Save">   
    </form>    
    </div>
    </div>
    
</body>
</html>