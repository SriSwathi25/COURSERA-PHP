<?php
session_start();
require_once "pdo.php";
if(isset($_SESSION['who'])){
    echo("<h1>Tracking Autos for ".$_SESSION['who']."</h1>");
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

    echo('<h1>Automobiles</h1>');
    #year make/mileage
    $res=$pdo->query("SELECT * from autos");
    echo("<ul>");
    while($row=$res->fetch(PDO::FETCH_ASSOC)){
        echo("<li>".$row['year']." ".$row['make']." / ".$row['mileage']."</li>");

    }
    echo("</ul>");
    echo("<a href='add.php'>Add New</a>");
    echo(" | ");
    echo("<a href='logout.php'>Logout</a>");
}
else{
    die("Not Logged In");
}
    ?>
<html>
<head>
<title>
Sri Swathi Nimmagadda
</title>
</head>
</html>