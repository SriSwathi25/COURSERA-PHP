<?php
session_start();
require_once "pdo.php";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':name'=>$_POST['name'],
        ':email'=>$_POST['email'],
        ':password'=>$_POST['password']
    ));
    $_SESSION['success']="<p style='color:green'>Record Inserted</p>";
    header('Location:add.php');
    return;
}
?>
<html>
<head>
<title>Add Users</title>
</head>
<body>
    <h1>Users Data</h1>
    <?php
    $res = $pdo->query("SELECT * from users");
    
    if($res == False){
        $_SESSION['error']="<h2 style='color:red'>No data to Show.</h2>";
        header('Location:add.php');
        return;
    }
    else{
        echo("<table border='2px solid blue'>
        <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Password</td>
        <td>Acion</td>
        </tr>
        ");
        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            echo("<tr>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['password']."</td>
        <td><a href='edit.php/?uid=".$row['uid']."'>Edit</a> |  <a href='delete.php/?uid=".$row['uid']."'>Delete</a> </td>
        </tr>
        ");
        }
        echo("</table>");
        }

    ?>
    <h1>Add Users</h1>
    <?php
    if(isset($_SESSION['success'])){
        echo($_SESSION['success']);
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo($_SESSION['error']);
        unset($_SESSION['error']);
    }
    ?>
    <form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" />
    <br>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" />
    <br>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" />
    <br>
    <br>
    <input type="submit" value="Add" />
    </form>
</body>
</html>