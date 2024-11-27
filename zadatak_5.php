<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uneseniBroj = (int)$_POST['broj'];
    $zamisljenBroj = rand(1, 9);

    if ($uneseniBroj === $zamisljenBroj) {
        echo "<p style='color:green;'>Pogodak! Zamišljeni broj je bio $zamisljenBroj.</p>";
    } else {
        echo "<p style='color:red;'>Krivo, probaj ponovo! Zamišljeni broj je bio $zamisljenBroj.</p>";
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
<h1>Igra (pogodi broj)</h1>
    <form method="post">
        <label for="broj">Upiši jedan broj od 1 do 9:</label>
        <input type="number" id="broj" name="broj" min="1" max="9" required>
        <button type="submit">Pogodi, probaj ponovo!</button>
    </form>
</body>
</html>
