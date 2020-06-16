<?php
require_once "pdo.php";
echo("<h1>Please Log In</h1>");
if(isset($_POST['cancel'])){
    header("Location:index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; 
if(isset($_POST['who']) && isset($_POST['pass']))
{
    $email = $_POST['who'];
    $password = htmlentities($_POST['pass']);
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) 
    {
        $failure = "<p style='color:red;'>User name and password are required</p>";
    } 
    
    
    else{
         if(filter_var($email, FILTER_VALIDATE_EMAIL) == False){
        $failure = "<p style='color:red;'>Email must have an at-sign (@)</p>";
        }
    else 
    {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) 
        {
            // Redirect the browser to autos.php
            error_log("Login success ".$_POST['who']);
            header("Location: autos.php?name=".urlencode($_POST['who']));
            return;
        } 
        else 
        {
            error_log("Login fail ".$_POST['who']." $check");
            $failure = "<p style='color:red;'>Incorrect password</p>";
        }
        
    }
}
    echo $failure;
    
}

?>
<html>
<head>
<title>
Sri Swathi Nimmagadda
</title>
</head>
<body>
    
    <form method="POST">
    <label for="who"><strong>User Name</strong></label>
    <input type="text" id="who" name="who"/>
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