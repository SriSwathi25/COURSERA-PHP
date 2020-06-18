<?php
session_start();
require_once "pdo.php";
require_once "bootstrap.php";
#echo("<h1 class='text-center'>Please log in</h1>");
if( isset($_POST['email']) && isset($_POST['pass']) ){
    if(strlen($_POST['email'])<1 || strlen($_POST['pass'])<1  ){
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red'>User name and password are required</p>";
    header("Location:login.php");
    return;

    }
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == False){
        echo("BOOO");
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>Email must have an at-sign (@)</p>";
        header("Location:login.php");
        return;
        
    }
    if($_POST['pass'] != 'php123'){
        echo("BOww");
        $_SESSION['ERROR'] = "<p class='text-center' style='color:red;'>Incorrect password</p>";
        header("Location:login.php");
        return;
        
    }
    else if($_POST['pass'] == 'php123'){
        echo("MEOW");
        error_log("Login Success  for ".$_POST['email']);
        unset($_SESSION['user']);
        $_SESSION['user'] = $_POST['email'];
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
<h1 class='text-center'>Please log in</h1>
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
    <form method="POST">
    User Name <input class="form-control" type="text" name="email"><br/>
    Password <input class="form-control" type="text" name="pass"><br/>
    <input class="btn btn-info" type="submit" value="Log In"> 
    <a href='index.php'>Cancel</a>   
    </form>    
    </div>
    </div>
   
</body>
</html>