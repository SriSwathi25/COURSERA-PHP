<?php
session_start();
require_once "pdo.php";
require_once "bootstrap.php";
echo("<h1>Welcome to the Automobiles Database</h1>");
//*******************************
if(isset($_SESSION['ERROR'])){
    echo($_SESSION['ERROR']);
    unset($_SESSION['ERROR']);
}
if(isset($_SESSION['SUCCESS'])){
    echo($_SESSION['SUCCESS']);
    unset($_SESSION['SUCCESS']);
}
//**********************************
if(! isset($_SESSION['user'])){
    echo("<a href='login.php'>Please log in</a>");
}
else{
    $res = $pdo->query("SELECT * FROM autos");
    if($res->rowCount()==0){
        echo("<h2>No rows found.</h2>");
    }
    else{
        echo("<table class='table table-bordered'>
        <thead><td><strong>Make</strong></td>
        <td><strong>Model</strong></td>
        <td><strong>Year</strong></td>
        <td><strong>Mileage</strong></td>
        <td><strong>Action</strong></td>
        </thead>
        ");
        $res = $pdo->query('SELECT * FROM autos');
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo("<tr><td>".htmlentities($row['make'])."</td>
            <td>".htmlentities($row['model'])."</td>
            <td>".htmlentities($row['year'])."</td>
            <td>".htmlentities($row['mileage'])."</td>
            <td><a href='edit.php/?autos_id=".$row['autos_id']."'>Edit</a> / <a href='delete.php/?autos_id=".$row['autos_id']."'>Delete</a></td>
            </tr>");
        }
        echo("</table>");

    }
    echo("<br>");
    echo("<br>");

    echo("<a href='add.php'>Add New Entry</a>");
    echo("<br>");
    echo("<br>");
    echo("<a href='logout.php'>Logout</a>");
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
        

    ?>
</body>
</html>