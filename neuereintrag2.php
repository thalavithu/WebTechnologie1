<?php
session_start();

//Variablen definieren
$kategorie = $_POST["kategorie"];
$datum = $_POST["datum"];
$text = $_POST["text"];
$bild = $_POST["bild"];


/*
echo "$kategorie.<br />.$datum.<br />.$bild.<br />.$text";
echo $_SESSION['Mail'];
*/


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
$sql1 = ("SELECT BenutzerId FROM tagebuch.Benutzer WHERE Mail = '{$_SESSION['Mail']}';");
$daten1 = sqlsrv_query($conn, $sql1);
while($result1 = sqlsrv_fetch_object($daten1)){
    $benutzerId = $result1->BenutzerId;
}
echo "Hoi".$benutzerId."<br />";

//KategorieID auslesen
$sql2 = ("SELECT KategorieID FROM tagebuch.Kategorie WHERE KategorieName = 'Auto';");
$daten2 = sqlsrv_query($conn, $sql2);
while($result2 = sqlsrv_fetch_object($daten2)){
    $kategorieId = $result2->KategorieId;
}
echo "Hallo".$kategorieId;


/*
if( $conn ) {
    
	
	 $sql = ("INSERT INTO tagebuch.Tagebuch(Vorname, Nachname, Mail, Kennwort) VALUES ('$kategorie', '$datum', '$bild', '$text');");
	
    
     $daten = sqlsrv_query($conn, $sql);
    
     
     header('Location: tagebuch.html');
    
    
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}
*/
?>