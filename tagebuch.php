<!DOCTYPE HTML>
<?php
session_start();
?>

<html>

<head>
    <title>IBZ Tagebuch</title>
    <meta name="description" content="IBZ Tagebuch">
    <meta name="author" content="Kevin&Vithursan">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <link rel="shortcut icon" href="Bilder/tagebuch.ico" />
</head>

<body>
    <div class="MainDiv">
        <div class="Title">
            <h1>IBZ Tagebuch</h1>
        </div>
        <div class="Inhalt">
            <h2>Tagebuch</h2>
            <button type="button" onClick="location.href='neuereintrag.php'">Neuer Eintrag</button>
        </div>
        <div class="footer">
            <p>&copy; by Kevin K. &amp; Vithursan S.</p>
        </div>
    </div>
</body>

</html>