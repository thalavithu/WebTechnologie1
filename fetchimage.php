<?php


//Serververbindung
include_once './config/sql.connection.php';



$tagebuchID = $_GET['tagebuchID'];

$select_image = "SELECT Bild FROM tagebuch.Tagebuch WHERE TagebuchID='$tagebuchID'";
/*
$image = sqlsrv_query($conn, $select_image);
$row=sqlsrv_fetch_array($image,SQLSRV_FETCH_ASSOC);
*/



$stmt = sqlsrv_query( $conn, $select_image );
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
}

$data = sqlsrv_get_field( $stmt, 0, SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY));
header("content-type:image/jpeg");
fpassthru($data);

?>