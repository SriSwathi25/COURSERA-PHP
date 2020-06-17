<?php
session_start();
if(isset($_POST['who']) && isset($_POST['pass']) ){
    unset($_SESSION['who']);
    if($_POST['pass'] == '1234'){       
        $_SESSION['who'] = $_POST['who'];
        $_SESSION['success'] = 'Logged In.';
        header("Location:app.php");
        return;
    }
    else{
        $_SESSION['error'] = 'Incorrect password.';
        header("Location:login.php");
        return;
    }
    
}
?>
<html>
<head></head>
<body>
    <h1>
    Welcome to Login!
    </h1>
<?php
if(isset($_SESSION['error'])){
    echo("<p style='color:red;'>".$_SESSION['error']."</p>");
    unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
    echo("<p style='color:green;'>".$_SESSION['success']."</p>");
    unset($_SESSION['success']);
}
?>
    <form method="post">
    Name: <input type="text" name="who"/>
    <br>
    Password: <input type="password" name="pass" />
    <br>
    <input type="submit" />
    <br>
    <a href="app.php">Cancel</a>
    </form>
    
    
</body>
</html>