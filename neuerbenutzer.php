<?php
/*
//Variablen definieren
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$mail = $_POST["mail"];
$kennwort = $_POST["kennwort"];

//Variablen überprüfen
If (empty ($mail)){
	echo("<h3>Mailadresse muss angegeben werden</h3>");
}
If (empty ($kennwort)){
	echo("<h3>Kennwort muss angegeben werden</h3>");
}

If ((!empty ($mail)) AND (!empty ($kennwort)) ){

    //auf DB connecten
    $connect = mssql_connect("ibz-tagebuch-mysqldbserver.database.windows.net,1433", "mysqldbuser", "LoveIBZ$2018$"); 

    //Datenbank auswählen
    mssql_select_db('IBZ-Tagebuch-SQL'); 

    //Daten in DB schreiben
    $sql = ("INSERT INTO appuser (user_loginname, user_password, user_firstname, user_surname, user_money) VALUES ('$vorname', '$nachname', '$mail', '$kennwort');");
    $daten = mssql_query($sql);
}
*/

$serverName = "ibz-tagebuch-mysqldbserver.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "IBZ-Tagebuch-SQL",
    "Uid" => "mysqldbuser",
    "PWD" => "LoveIBZ$2018$"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);


if( $conn ) {
    echo "Connection established.<br />";
}else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>