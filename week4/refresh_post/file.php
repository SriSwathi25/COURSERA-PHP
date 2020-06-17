<?php
/*Upon refreshing a page with post data,
post data remains and is resubmitted.
To avoid this, you can do
POST, then REDIRECT to GET of same page.
Any data to be passed can be stored in session variables.
*****observing response headers in browser*****
*/
?>
<html>
<head>
<title> Sri Swathi Nimmagadda </title>
</head>
<body>

<h1> Welcome to my guessing game </h1>
<?php
if(isset($_POST['value'])){
    $_SESSION['value']=$_POST['value']+0;
    header('Location:file.php');
}
?>
<form  method="post">
<input type="number" name="value" />
<input type="submit" />
</form>

</body>
</html>

