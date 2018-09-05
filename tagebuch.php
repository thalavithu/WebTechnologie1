<!DOCTYPE HTML>
<?php
session_start();
?>

<html>

<head>
    <title>IBZ Tagebuch</title>
    <meta name="description" content="IBZ Tagebuch">
    <meta name="author" content="Kevin&Vithursan">
    <link rel="stylesheet" type="text/css" href="Style/basic.css"> 
    <link rel="shortcut icon" href="Bilder/tagebuch.ico" />
</head>

<body>
    <div class="MainDiv">
        <a class="logout" href="logout.php">Ausloggen</a>
        <div class="title">
            <h1>IBZ Tagebuch</h1>
        </div>
        <div class="inhalt">
            <h2>Tagebuch</h2>
                <a class="list" href="neuereintrag.php">Neuer Eintrag</a>
                <a class="list"  href="alle.php" >Einträge anzeigen</a>
                <a class="mail "href="mailto:vithursan.moorthy@student.ibz.ch">Anbieter kontaktieren</a>            
        </div>
        <div class="footer">
            <p>&copy; by Kevin K. &amp; Vithursan S.</p>
        </div>
    </div>
</body>

</html>