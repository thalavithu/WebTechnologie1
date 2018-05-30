<?php

//Variablen definieren

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
    /* echo "Connection established.<br />"; */
    $sql = ("SELECT * FROM tagebuch.Benutzer WHERE Mail = '$mail' AND Kennwort = '$kennwort';");
    $result = sqlsrv_query($conn, $sql);
    $numrows = sqlsrv_num_rows($result);
    echo $result;
    /*
    if($numrows > 0) {
        echo "Zeile vorhanden";
       // header('Location: tagebuch.html');
    }
    else {
        echo "Error in retrieveing row count.";
    }
   */
  
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}




?>