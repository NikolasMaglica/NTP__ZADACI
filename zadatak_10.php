
<?php
$wordCount = null; 
$errorMessage = null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sentence = $_POST['sentence'];

    if (!empty($sentence)) {
        $wordCount = str_word_count($sentence);
    } else {
        $errorMessage = "Molimo unesite rečenicu.";
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <title>NTP</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Nikolas Maglica">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

</head>
<body>
    <h1>Prebrojavanje riječi u rečenici</h1>
    <form method="post" action="">
        <label for="sentence">Unesite rečenicu:</label><br>
        <textarea id="sentence" name="sentence" rows="4" cols="50" placeholder="Upišite tekst ovdje..."></textarea><br><br>
        <input type="submit" value="Izračunaj broj riječi">
    </form>

    <?php
    if ($wordCount !== null) {
        echo "<p>Broj riječi u zadanoj rečenici je: <strong>$wordCount</strong>.</p>";
    } elseif ($errorMessage !== null) {
        echo "<p>$errorMessage</p>";
    }
    ?>
</body>
</html>
