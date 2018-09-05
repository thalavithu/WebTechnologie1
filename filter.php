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
            <h2>Einträge filtern</h2>
            <form method="post" action="filter2.php" enctype="multipart/form-data">
                <div class="control">
                    <div class="label">Kategorie:</div>
                    <div class="field">
                        <select name="kategorie">
                                <option selected disabled>Choose here</option>
                                <?php
                                    //Sesssioninfos
                                    include_once './config/session.php';
                                    //Serververbindung
                                    include_once './config/sql.connection.php';
                                
                                    //SQL Abfrage - Kategorie anzeigen
                                    $sql = "SELECT KategorieId, KategorieName FROM tagebuch.Kategorie";
                                    $stmt = sqlsrv_query( $conn, $sql);
                                    if( $stmt === false ) {
                                        die( print_r( sqlsrv_errors(), true));
                                    }

                                    while( $obj = sqlsrv_fetch_object( $stmt)) {
                                        echo "<option value=\"$obj->KategorieId\">$obj->KategorieName</option>";
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="control">
                    <div class="label">Datum Von:</div>
                    <div class="field">
                    <input name="datumVon" type="date">
                    </div>
                </div>

                <div class="control">
                    <div class="label">Datum Bis:</div>
                    <div class="field">
                    <input name="datumBis" type="date">
                    </div>
                </div>
                
            <div class="field buttons">
                <input type="submit" class="button width-70" value="Filtern" />
                <INPUT Type="button" class="link" VALUE="Back" onClick="history.go(-1);return true;">
            </div>
            </form>
        </div>

        <div class="footer">
            <p>&copy; by Kevin K. &amp; Vithursan S.</p>
        </div>
    </div>
</body>

</html>
