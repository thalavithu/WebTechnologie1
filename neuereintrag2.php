<?php
session_start();

//Variablen definieren
$kategorie = $_POST["kategorie"];
$datum = $_POST["datum"];
$text = $_POST["text"];
$bild = $_POST["bild"];


//Serververbindung
$serverName = "ibz-tagebuch-mysqldbserver.database.windows.net,1433";
$connectionOptions = 
    array(
        "Database" => "IBZ-Tagebuch-SQL",
        "Uid" => "mysqldbuser",
        "PWD" => "LoveIBZ$2018$"
    );
    $conn = sqlsrv_connect($serverName, $connectionOptions);

//BenutzerID auslesen
$sql1 = ("SELECT BenutzerID FROM tagebuch.Benutzer WHERE Mail = '{$_SESSION['Mail']}';");
$daten1 = sqlsrv_query($conn, $sql1);
while($result1 = sqlsrv_fetch_object($daten1)){
    $benutzerId = $result1->BenutzerID;
}

//KategorieID auslesen
$sql2 = ("SELECT KategorieID FROM tagebuch.Kategorie WHERE KategorieName = '$kategorie';");
$daten2 = sqlsrv_query($conn, $sql2);
while($result2 = sqlsrv_fetch_object($daten2)){
        $kategorieId = $result2->KategorieID;
}

if( $conn ) {
$sql3 = ("INSERT INTO tagebuch.Tagebuch (BenutzerID, KategorieID, Bild, Datum, Freitext) VALUES ('$benutzerId', '$kategorieId', '$bild', '$datum', '$text');");
$daten = sqlsrv_query($conn, $sql3);
    
header('Location: tagebuch.php');
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>