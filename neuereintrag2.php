<?php
session_start();
//Serververbindung
include_once './config/sql.connection.php';

//Variablen definieren
$kategorie = $_POST["kategorie"];
$datum = $_POST["datum"];
$text = $_POST["text"];
$image = $_FILES["bild"]["name"];


//Bildspeicherort
$uploaddir ="images/";
$uploadfile = $uploaddir . basename($_FILES["bild"]["name"]);


//Bild kopieren auf den Server
if(move_uploaded_file($_FILES["bild"]["tmp_name"], $uploadfile)) {
    echo "Datei ist valide und wurde erfolgreich hochgeladen.\n";
} else {
    echo "Möglicherweise eine Dateiupload-Attacke!\n";
}



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