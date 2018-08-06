<?php

session_start();

//Variablen definieren
$datum = $_POST["datum"];
$bild = $_POST["bild"];
$text = $_POST["text"];


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
    /* echo "Connection established.<br />"; */
	
	 $sql = ("INSERT INTO tagebuch.Tagebuch(Vorname, Nachname, Mail, Kennwort) VALUES ('$_SESSION['Mail']', '$datum', '$bild', '$text');");
	
    
     $daten = sqlsrv_query($conn, $sql);
    
     
     header('Location: tagebuch.html');
    
    
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>