<?php
if(isset($_POST['value'])){
    if($_POST['value'] == 1){
        header("Location:one.php");
        return;
    }
    else if($_POST['value'] == 2){
        header("Location:two.php");
        return;
    }
    else if($_POST['value'] == 3){
        header("Location:three.php");
        return;
    }
}
?>
<html>
<body>
<h1>In page 3</h1>
    <form method="POST">
    <h1>Enter a number(1-3)</h1>
    <input type="text" name="value" />
    <br/>
    <input type="submit" value="GO" />
    </form>
</body>
</html>