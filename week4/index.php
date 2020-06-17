<html>
<body>
<title> Sri Swathi Nimmagadda </title>
<h1> Welcome to my guessing game </h1>

<?php
$correctnumber=78;

if (isset($_GET['guess']) === False){
    echo "Missing guess parameter";

}
else if($_GET{'guess'} == ''){
    echo "Your guess is too short";}
else if (is_numeric($_GET['guess'])===FALSE)
 {
echo "Your guess is not a number";
}
else if ($_GET['guess']<$correctnumber)
 {
echo "Your guess is too low";
}
else if ($_GET['guess']>$correctnumber)
 {
echo "Your guess is too high";
}
else if ($_GET['guess']==$correctnumber)
 {
echo "Congratulations - You are right";
}

?>
</body>
</html>