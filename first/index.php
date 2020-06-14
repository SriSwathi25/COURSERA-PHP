<html>
<head>
<title>Sri Swathi</title>
</head>
<body>
<h1>Sri Swathi</h1>
    <p>
        <?php
        $name = "Sri Swathi";
        echo("The SHA256 hash of $name is");
        print hash('sha256', $name);
        ?>
    </p>
    <pre>ASCII ART:

    ***********
    **       **
    **
    ***********
             **
    **       **
    ***********
</pre>
<a href="check.php">Click here to check the error setting</a>
<br/>
<a href="fail.php">Click here to cause a traceback</a>
</body>
    
</body>
</html>