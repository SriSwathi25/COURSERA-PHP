<?php
if(! isset($_COOKIE['swathi'])){
    setcookie('swathi','secret agent'); // expires at end of session

    setcookie('doggie','barkss',time()+3600); // expires at 1 hr from now
}
else{
    setcookie('swathi','boww', ); // overriding a cookie
    setcookie('doggie','barkss',time()-3600); // to delete a cookie set time to past
}

echo("Hii ".$_COOKIE['doggie']);
?>