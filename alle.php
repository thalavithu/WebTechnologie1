<!DOCTYPE HTML>
<html>

<head>
    <title>IBZ Tagebuch</title>
    <meta name="description" content="IBZ Tagebuch">
    <meta name="author" content="Kevin&Vithursan">
    <link rel="stylesheet" type="text/css" href="Style/basic.css"> 
    <link rel="shortcut icon" href="Bilder/tagebuch.ico" />
</head>

<body>
    <div class="MainDiv">
        <input type="button" class="logout" VALUE="Ausloggen" onClick="location.href='logout.php'" />
        <div class="title">
            <h1>IBZ Tagebuch</h1>
        </div>
        <div class="inhalt">
            <h2>Tagebuch</h2>
            
            <?php
            
            //Sesssioninfos
            include_once './config/session.php';
            //Serververbindung
            include_once './config/sql.connection.php';

            
            //SQL Abfrage - Alle Einträge anzeigen
            $sql4 = "SELECT k.KategorieName, t.Datum, t.Freitext 
                        FROM tagebuch.Tagebuch t
                        JOIN tagebuch.Kategorie k ON k.KategorieID = t.KategorieID 
                        join tagebuch.Benutzer b on t.BenutzerID = b.BenutzerID
                        WHERE b.Mail = '$benutzerMail'";

            $result = sqlsrv_query( $conn, $sql4 );
            if( $result === false) {
                die( print_r( sqlsrv_errors(), true) );
            }

            //Tabellarisches Darstellen
            echo "<div class=\"grid-tabelle\">";
            echo "<div class=\"titel\">Kategorie</div>";
            echo "<div class=\"titel\">Datum</div>";
            echo "<div class=\"titel\">Text</div>";
            while( $obj = sqlsrv_fetch_object( $result)) {

                echo "<div>".$obj->KategorieName."</div>";
                echo "<div>".$obj->Datum->format('d.m.Y')."</div>";
                echo "<div>".$obj->Freitext."</div>";

            }
            echo "</div>";
            
            sqlsrv_free_stmt( $result);

            ?>
            <div class="field buttons">
                <input type="button" class="button width-70" VALUE="Filtern" onclick="location.href='filter.php'" />
                <INPUT Type="button" class="link" VALUE="Back" onClick="history.go(-1);return true;">
            </div>
        </div>
        <div class="footer">
            <p>&copy; by Kevin K. &amp; Vithursan S.</p>
        </div>
    </div>
</body>

</html>
