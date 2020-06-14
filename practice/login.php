<?php
try{
$pdo = new  PDO("mysql:host=localhost;port=3306;dbname=users",'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($pdo){
    echo("Succes connection");
    echo "\n";
    $sql = "INSERT INTO INFO(name,age,message) VALUES('TEJA',23,'i AM FAT LADY')";
    $pdo->exec($sql);

    $res = $pdo->query("SELECT * FROM INFO");
    while($row = $res->fetch(PDO::FETCH_ASSOC)){
        print_r($row);
    }
}
else{
    echo("Unsuccessful");
}}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
    

if(isset($_POST['username']) && isset($_POST['password']))
{
    if($_POST['password'] == "Abcd.1234"){
        echo("Correct");
        header("Location: welcome.php?name=".urlencode($_POST['username']));
    }
    else{
        echo("Wromg");
        die("<p style='color:red;'>Invalid Username and Password</p>");
    }
}
?>
<html>
<head>
<title>
Log In
</title>
</head>
<body>
    <form method="post">
    <label for="username">Enter Username :</label>
        <input type="text" id="username" name="username" placeholder="Username" />
    <label for="password">Enter Password :</label>
        <input type="password" id="password" name="password" placeholder="Password" />
    <input type="submit" value="Login"/>

    </form>
</body>

</html>