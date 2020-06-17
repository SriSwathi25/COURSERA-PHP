<?php
session_start();
echo("<h1>Welcome to My App</h1>");
if(isset($_SESSION['success'])){
    echo("<p style='color:green;'>".$_SESSION['success']."</p>");
    unset($_SESSION['success']);
}
if( ! isset($_SESSION['who'])){
    echo("<p>Please <a href='login.php'>Log In</a> to continue ...");
}
else{
    echo("<pre>THis is a wonderful App. Welcome my boiisss.</pre>");
    echo("<h2><a href='logout.php'>Log Out</a></h2>");
}
?>
