<!DOCTYPE HTML>
<html>

<head>
    <title>IBZ Tagebuch</title>
    <meta name="description" content="IBZ Tagebuch">
    <meta name="author" content="Kevin&Vithursan">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <link rel="shortcut icon" href="Bilder/tagebuch.ico" />
</head>

<body>
    <div class="MainDiv">
        <div class="Title">
            <h1>IBZ Tagebuch</h1>
        </div>
        <div class="Inhalt">
            <div class="Inhalt">
                <h2>Neuer Eintrag</h2>
                <form method="post" action="neuereintrag2.php">
                    <table>
                        <tr>
                            <th>
                                <p class="Table">Kategorie:</p>
                            </th>
                            <th>
                                <select>
                                    <?php 

                                        $sql = "SELECT KategorieName FROM tagebuch.Kategorie;"; 
                                        $result = mysql_query($sql) OR die(mysql_error()); 
                                        while($row = mysql_fetch_assoc($result)) { 
                                            echo "<option>"$row['options']"</option>"; 
                                        } 
                                    ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="Table">Datum</p>
                            </th>
                            <th>
                                <input name="datum" type="date">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="Table">Text:</p>
                            </th>
                            <th>
                                <textarea rows="10" cols="60" name="text" maxlength="1000"></textarea>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p class="Table">Bild:</p>
                            </th>
                            <th>
                                <input name="bild" type="file">
                            </th>
                        </tr>
                    </table>
                    <p>
                        <INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;">
                        <input type="submit" value="Speichern" />
                    </p>
                </form>
            </div>
            <div class="footer">
                <p>&copy; by Kevin K. &amp; Vithursan S.</p>
            </div>
        </div>
</body>

</html>