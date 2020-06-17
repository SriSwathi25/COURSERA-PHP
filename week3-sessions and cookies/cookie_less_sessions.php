<?php
#to use sessions without cookies
#send as post data or get data
ini_set('session.use_cookies', 0);
ini_set('session.use_only_cookies', 0);
ini_set('session.use_trans_sid', 1);

?>
<?php
if(isset($_POST['PHPSESSID'])){
    header("Location:cookie_less_sessions.php/PHPSESSID=".$_POST['PHPSESSID']);
}
else{
    session_start();
}

?>
<?php
echo("<form method='POST'>");
echo("<input type='submit' value='NEXT PAGE' />");
echo("</form>");    
?>
<p>Session id : <?php echo(session_id()); ?></p>