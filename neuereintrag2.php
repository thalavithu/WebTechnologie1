<?php
session_start();
//Serververbindung
include_once './config/sql.connection.php';

//Variablen definieren
$kategorie = $_POST["kategorie"];
$datum = $_POST["datum"];
$text = $_POST["text"];
//$bild = $_FILES["bild"];


//Bildinfos holen
//$image = $_FILES['bild']['name'];


//BenutzerID auslesen
$sql1 = ("SELECT BenutzerId FROM tagebuch.Benutzer WHERE Mail = '{$_SESSION['Mail']}';");
$daten1 = sqlsrv_query($conn, $sql1);
while($result1 = sqlsrv_fetch_object($daten1)){
    $benutzerId = $result1->BenutzerId;
}

$sql3 = ("INSERT INTO tagebuch.Tagebuch (BenutzerID, KategorieID, Bild, Datum, Freitext) VALUES ('$benutzerId', '$kategorie', '$image', '$datum', '$text');");


$stmt = sqlsrv_query( $conn, $sql3 );
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
}
else{
    header('Location: tagebuch.php');
}

?>