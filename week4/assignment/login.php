<?php
session_start();
require_once "pdo.php";
echo("<h1>Please Log In</h1>");
if(isset($_POST['cancel'])){
    header("Location:index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; 
if(isset($_POST['email']) && isset($_POST['pass']))
{
    unset($_SESSION['who']);


    $email = $_POST['email'];
    $password = htmlentities($_POST['pass']);
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) 
    {
        $_SESSION['error'] = "<p style='color:red;'>User name and password are required</p>";
        header("Location:login.php");
    return;
    } 
    
    
    else{
         if(filter_var($email, FILTER_VALIDATE_EMAIL) == False){
            $_SESSION['error'] = "<p style='color:red;'>Email must have an at-sign (@)</p>";
            header("Location:login.php");
            return;
        }
    else 
    {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) 
        {
            // Redirect the browser to add.php
            $_SESSION['who'] = htmlentities($_POST['email']);
            error_log("Login success ".$_SESSION['who']);
            header("Location: view.php");
            return;
        } 
        else 
        {
            error_log("Login fail ".$_POST['email']." $check");
            $_SESSION['error']  = "<p style='color:red;'>Incorrect password</p>";
            header("Location:login.php");
    return; 
        }
        
    }
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
if(isset($_SESSION['error'])){
    echo($_SESSION['error']);
    unset($_SESSION['error']);
}

?>
    
    <form method="POST">
    <label for="who"><strong>User Name</strong></label>
    <input type="text" id="who" name="email"/>
    <br/>
    <label for="pass"><strong>Password  </strong></label>
    <input type="password" id="pass" name="pass"/>
    <br/>
    <input type="submit" value="Log In" />
    <input type="submit" name='cancel' value="Cancel" />
    <br/>
    </form>
    <pre>
For a password hint, view source and find a password hint in the
HTML comments.
    </pre>
    <!-- password is 'php123' -->

</body>
</html>