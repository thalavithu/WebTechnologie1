<?php

//Session wird gestartet
session_start();

//BenutzerInformationen auslesen
$benutzerId = $_SESSION['BenutzerId'];
$benutzerMail =  $_SESSION['Mail'];
$benutzerVorname = $_SESSION['Vorname'];

?>