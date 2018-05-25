<?php

//Variablen definieren
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$mail = $_POST["mail"];
$kennwort = $_POST["kennwort"];

//Serververbindung
$serverName = "ibz-tagebuch-mysqldbserver.database.windows.net,1433";
$connectionOptions = 
    array(
        "Database" => "IBZ-Tagebuch-SQL",
        "Uid" => "mysqldbuser",
        "PWD" => "LoveIBZ$2018$"
    );
$conn = sqlsrv_connect($serverName, $connectionOptions);


if( $conn ) {
    /*
    echo "Connection established.<br />";
	
     */
	
	 $sql = ("INSERT INTO tagebuch.Benutzer(Vorname, Nachname, Mail, Kennwort) VALUES ('$vorname', '$nachname', '$mail', '$kennwort');");
	
    
     $daten = sqlsrv_query($conn, $sql);
    
     
     header('Location: index.html');
    
    
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>