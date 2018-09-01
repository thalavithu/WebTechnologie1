<?php

//Variablen definieren
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$mail = $_POST["mail"];
$passwort = $_POST["passwort"];

//Serververbindung
include_once './config/sql.connection.php';

if( $conn ) {
    /* echo "Connection established.<br />"; */
	
	 $sql = ("INSERT INTO tagebuch.Benutzer(Vorname, Nachname, Mail, Kennwort) VALUES ('$vorname', '$nachname', '$mail', '$passwort');");
	
    
     $daten = sqlsrv_query($conn, $sql);


     header('Location: index.html');
    
    
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>