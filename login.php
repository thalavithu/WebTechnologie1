<?php
    //Variablen definieren
    $mail = htmlspecialchars($_POST["mail"]);
    $kennwort = htmlspecialchars($_POST["passwort"]);

    //Sesssioninfos
    include_once './config/session.php';
    //Serververbindung
    include_once './config/sql.connection.php';

    if ($conn) {
        $sql = "SELECT BenutzerId, vorname FROM tagebuch.Benutzer  WHERE Mail = ? AND Kennwort = ?";
        $parameter = array($mail, $kennwort);

        $stmt = sqlsrv_query($conn, $sql, $parameter);
        if ($stmt === false) {
            echo "Connection to server failed...<br>";
        } else {
            
            while( $obj = sqlsrv_fetch_object( $stmt)) {
                $_SESSION['BenutzerId'] = $obj->BenutzerId;
                $_SESSION['Vorname'] = $obj->vorname;
            }

            if (sqlsrv_has_rows($stmt) > 0) {
                $_SESSION['Mail'] = $mail;
                
                header('Location: tagebuch.php');
     
            } else {
                header('Location: index.html');
            }
        }
    }
?>