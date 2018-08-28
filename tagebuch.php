<!DOCTYPE HTML>
<?php
session_start();
?>

<html>

<head>
    <title>IBZ Tagebuch</title>
    <meta name="description" content="IBZ Tagebuch">
    <meta name="author" content="Kevin&Vithursan">
    <!-- <link rel="stylesheet" type="text/css" href="Style/style.css"> -->
    <link rel="stylesheet" type="text/css" href="Style/basic.css"> 
    <link rel="shortcut icon" href="Bilder/tagebuch.ico" />
</head>

<body>
    <div class="MainDiv">
        <div class="title">
            <h1>IBZ Tagebuch</h1>
        </div>
        <div class="inhalt">
            <h2>Tagebuch</h2>
            <div class="field buttons">
                <input type="button" class="link" VALUE="Neuer Eintrag" onClick="location.href='neuereintrag.php'" />
                <input type="button" class="link" VALUE="Alle Einträge anzeigen" onClick="location.href='alle.php'" />
                <input type="button" class="link" VALUE="Einträge filtern" onClick="location.href=''" />
                <input type="button" class="link" VALUE="Ausloggen" onClick="location.href='logout.php'" />
             </div>
            
        </div>
        <div class="footer">
            <p>&copy; by Kevin K. &amp; Vithursan S.</p>
        </div>
    </div>
</body>

</html>