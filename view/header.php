<?php
$basedir= dirname(__DIR__);
$basedir = explode("\\", $basedir);
$basedir = array_pop($basedir);
//array_pop(explode("\\", dirname(__DIR__))) 
?>
<!DOCTYPE html>
<html>    
<!-- the head section -->
<head>
    <title>Summerstar Creations</title>
    <link rel="stylesheet" type="text/css" href="/<?php echo htmlspecialchars($basedir) ?>/main.css" >
</head>
<?php var_dump($_SESSION)?>

<!-- the body section -->
<body>
<header>
    <img src="/<?php echo htmlspecialchars($basedir) ?>/images/SummerstarCreationsLogo.jpg" alt="Kissing Heart">
    <p>Planning, Decorating and Everything Wedding</p>
</header>
    



