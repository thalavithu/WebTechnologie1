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
        <a class="logout" href="logout.php">Ausloggen</a>
        <div class="title">
            <h1><a href="tagebuch.php">IBZ Tagebuch</a></h1>
        </div>
        <div class="inhalt">
            <h2>Filter Anzeige</h2>

        <?php

            //Variablen definieren
            $kategorie = $_POST["kategorie"];
            $datumVon = $_POST["datumVon"];
            $datumBis = $_POST["datumBis"];

            //Sesssioninfos
            include_once './config/session.php';
            //Serververbindung
            include_once './config/sql.connection.php';

            //SQL Abfrage - Filtern der Einträge
            $sql4 = "SELECT k.KategorieName, t.Datum, t.Freitext 
                        FROM tagebuch.Tagebuch t
                        JOIN tagebuch.Kategorie k ON k.KategorieID = t.KategorieID 
                        join tagebuch.Benutzer b ON t.BenutzerID = b.BenutzerID
                        WHERE b.Mail = '$benutzerMail'AND (k.KategorieId='$kategorie' OR t.Datum BETWEEN '$datumVon' AND '$datumBis')";

            $result = sqlsrv_query( $conn, $sql4 );
            if( $result === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
           
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
                <INPUT Type="button" class="button width-70" VALUE="Alle Einträge" onClick="location.href='alle.php'">
            </div>
        </div>

        <div class="footer">
            <p>&copy; by Kevin K. &amp; Vithursan S.</p>
        </div>
    </div>
</body>

</html>



