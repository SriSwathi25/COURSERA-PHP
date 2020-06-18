<?php
session_start();
require_once "pdo.php";
require_once "bootstrap.php";
if( ! isset($_SESSION['user'])){
    die("ACCESS DENIED");
}
if(isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage']) ){
    if(strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1){
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>All fields are required</p>";
        header("Location:add.php");
        return;
    }
    if(! is_numeric($_POST['year']))
        {
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>Year must be an integer</p>";
        header("Location:add.php");
        return;
    }

    if(! is_numeric($_POST['mileage']))
        {
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>Mileage must be an integer</p>";
        header("Location:add.php");
        return;
    }
    else{
    $sql = "INSERT INTO autos (make,model,year,mileage) VALUES(:make,:model,:year, :mileage)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage']
    ));
        $_SESSION['SUCCESS'] = "<p class='text-center' style='color:green;'>Record added</p>";
        header("Location:index.php");
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
    Make   <input class="form-control" type="text" name="make"><br/>
    Model   <input class="form-control" type="text" name="model"><br/>
    Year   <input class="form-control" type="text" name="year"><br/>
    Mileage   <input class="form-control" type="text" name="mileage"><br/>
    
    <input class="btn btn-info" type="submit" value="Add">   
    </form>    
    </div>
    </div>
    
</body>
</html>