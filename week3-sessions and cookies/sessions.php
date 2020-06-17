<?php
session_start(); #Session variables Are activated
#A session cookie with PHPSESSID is stored in browser and expires at the end of session
if(! isset($_SESSION['user'])){
    $_SESSION['user']=0;
    echo("Start...");
    echo("<br/>");
    echo("Users are :".$_SESSION['user']);
    echo("<br/>");
    echo("Session id :".session_id());
}
else if($_SESSION['user']<5){
    $_SESSION['user']=$_SESSION['user']+1;
    echo("Added one...");
    echo("<br/>");
    echo("Users are :".$_SESSION['user']);
    echo("<br/>");
    echo("Session id :".session_id());
}
else{
    session_destroy();#Deletes all session data
    session_start();#restarts session. Same session id as this is sent by server not browser.
}

?>