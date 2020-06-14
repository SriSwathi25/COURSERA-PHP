<?php
require_once "bootstrap.php";
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=users",'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$res = $pdo->query("SELECT * from info");
echo("<div class='container'><div class='jumbotron'><table class='table' border='2px'><thead><td><strong>Name</strong></td><td><strong>Age</strong></td><td><strong>Message</strong></td><td><strong>DELETE</strong></td></thead>");
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    echo("<tr><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['message']."</td><td>
    <form  method='post'><input type='hidden' name='uidh' value='".$row['uid']."'/><br/><input type='submit' name='delete' value='DELETE'/></form></td>
    </tr>");
}
echo("</table></div></div>");
try{
    if(isset($_POST['delete'])){
    $sql = "DELETE FROM INFO WHERE uid=:val";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':val' => $_POST['uidh']
    ));
    header("Location:index.php");
        
    }
    #$pdo->exec("INSERT INTO info (name,age,message) VALUES('BOWW',20,'BYEE F U')");
if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['message']) ){
    $sql = "INSERT INTO info (name,age,message) VALUES(:name,:age, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':age' => $_POST['age'],
        ':message' => $_POST['message']
    ));
    header("Location:index.php");

}
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>
<html>
<head>
<title>
PHP CRUD APP
</title>
</head>
<body>
<div class="container"><h1 class="text-center">PHP CRUD APP</h1></div>
<div class="container">
    <form class="form-group" method="post">
    <label for="name">Name: </label>
    <input class="form-control" type="text" id="name" name="name" /><br/>
    <label for="age">Age: </label>
    <input class="form-control" type="number" id="age" name="age" /><br/>
    <label for="msg">Message: </label>
    <textarea class="form-control"  name="message" id="msg" cols="30" rows="10" ></textarea><br/>
    <center><input class="btn btn-lg btn-info" type="submit" value="submit"/></center>
    </form>
    </div>
</body>

</html>