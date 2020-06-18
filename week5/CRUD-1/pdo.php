<?php
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=coursera;",'swathi','Abcd.1234');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>