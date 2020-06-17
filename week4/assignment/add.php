<?php
session_start();
require_once "pdo.php";
 if(isset($_POST['cancel'])){
    header('Location:view.php');
    return;
}
if(isset($_SESSION['who'])){
    echo("<h1>Tracking Autos for ".$_SESSION['who']."</h1>");
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if(isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])){
        $make=htmlentities($_POST['make']);
        $year=htmlentities($_POST['year']);
        $mileage=htmlentities($_POST['mileage']);
        if(strlen($make)<1){
            $_SESSION['error'] = "<p style='color:red;'>Make is required</p>";
            header("Location:add.php");
            return;
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

                
                $_SESSION['success'] = "<p style='color:green;'>Record Inserted</p>";
                header("Location:view.php");
            return;
            }
            else{
                $_SESSION['error'] = "<p style='color:red;'>Mileage and year must be numeric</p>";
                header("Location:add.php");
            return;
                
            }
        }

    }
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
    <input type="submit" value="Add">
<input type="submit" name="cancel" value="Cancel">
    </form>
    
</body>

</html>
