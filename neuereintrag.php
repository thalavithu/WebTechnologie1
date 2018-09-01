<!DOCTYPE HTML>
<html>
<?php
session_start();
?>
<head>
    <title>IBZ Tagebuch</title>
    <meta name="description" content="IBZ Tagebuch">
    <meta name="author" content="Kevin&Vithursan">
    <!-- <link rel="stylesheet" type="text/css" href="Style/style.css"> -->
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
                <h2>Neuer Eintrag</h2>
                <form method="post" action="neuereintrag2.php" enctype="multipart/form-data">

                    <div class="control">
                        <div class="label">Kategorie:</div>
                        <div class="field">
                            <select name="kategorie">
                                    <option selected disabled>Choose here</option>
                                    <?php
                                        //Serververbindung
                                        include_once './config/sql.connection.php';
                                    

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
                        <div class="label">Datum:</div>
                        <div class="field">
                        <input name="datum" type="date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <div class="control">
                        <div class="label">Text:</div>
                        <div class="field">
                        <textarea rows="10" cols="40" name="text" maxlength="1000"></textarea>
                        </div>
                    </div>
                    
                    <div class="control">
                        <div class="label">Bild:</div>
                        <div class="field">
                        <input name="bild" type="file">
                        </div>
                    </div>

                <div>
                    <div class="label"></div>
                    <div class="field buttons">
                        <input type="submit" class="button width-70" value="Speichern" />
                        <INPUT Type="button" class="link" VALUE="Back" onClick="history.go(-1);return true;">
                    </div>
                </div>
                </form>
            </div>

            <div class="footer">
                <p>&copy; by Kevin K. &amp; Vithursan S.</p>
            </div>
        </div>
</body>

</html>
