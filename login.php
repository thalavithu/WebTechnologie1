<?php

//Variablen definieren

 $mail = $_POST["mail"];
 $kennwort = $_POST["passwort"];

 $serverName = "ibz-tagebuch-mysqldbserver.database.windows.net,1433";
$connectionOptions = 
    array(
        "Database" => "IBZ-Tagebuch-SQL",
        "Uid" => "mysqldbuser",
        "PWD" => "LoveIBZ$2018$"
    );
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn) {
        $sql = "SELECT vorname FROM tagebuch.Benutzer  WHERE Mail = '$mail' AND Kennwort = '$kennwort'";
        echo $sql;
        $stmt = sqlsrv_query($conn, $sql);
        if ($stmt === false) {
            echo "Connection to server failed...<br>";
        } else {
            
            if (sqlsrv_has_rows($stmt) > 0) {
                header('Location: tagebuch.html');
     
            } else {
                echo "Failed to authenticate...<br>";
            }
        }
    }
?>