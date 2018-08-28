<?php


//Variablen definieren
$kategorie = $_POST["kategorie"];
$datum = $_POST["datum"];
$text = $_POST["text"];
//$bild = $_FILES["bild"];


//Bildinfos holen
$image = $_FILES['bild']['name'];

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