<?php
require_once "pdo.php";
 if(isset($_POST['logout'])){
    header('Location:index.php');
    return;

}
$failure = False;
$success = False;
if(isset($_REQUEST['name'])){
    echo("<h1>Tracking Autos for ".$_REQUEST['name']."</h1>");
    if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
        $make=htmlentities($_POST['make']);
        $year=$_POST['year'];
        $mileage=$_POST['mileage'];
        if(strlen($make)<1){
            $failure = "<p style='color:red;'>Make is required</p>";
        }
        else{
            if(is_numeric($mileage) && is_numeric($year)){
                $sql = "INSERT INTO autos (make,year,mileage) values(:make, :year, :mileage)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':make'=>$make,
                    ':year'=>$year,
                    ':mileage'=>$mileage
                ));

                
                $failure = "<p style='color:green;'>Record Inserted</p>";
            }
            else{
                $success = "<p style='color:red;'>Mileage and year must be numeric</p>";
                
            }
        }

    }

    echo $failure;
    echo $success;



}
else{
    die("Name parameter missing");
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
    <label for="make">Make:</label>
    <input type="text" name="make" id="make"/><br/>
    <label for="year">Year:</label>
    <input type="text" name="year" id="year"/><br/>
    <label for="mileage">Mileage:</label>
    <input type="text" name="mileage" id="mileage"/><br/>
    <input type="submit" value='Add'>
    <input type="submit" name='logout' value='Logout'>
    </form>
    <?php
    echo('<h1>Automobiles</h1>');
    #year make/mileage
    $res=$pdo->query("SELECT * from autos");
    echo("<ul>");
    while($row=$res->fetch(PDO::FETCH_ASSOC)){
        echo("<li>".$row['year']." ".$row['make']." / ".$row['mileage']."</li>");

    }
    echo("</ul>");
    ?>
</body>

</html>
