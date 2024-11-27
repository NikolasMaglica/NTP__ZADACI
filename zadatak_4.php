<?php
$result = null; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = isset($_POST['a']) ? (float)$_POST['a'] : 0; 
    $b = isset($_POST['b']) ? (float)$_POST['b'] : 0; 
    $result = (3 * $a - $b) / 2; 
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
    <h1>Izračunajte vrijednost varijable c</h1>
    <form method="POST" action="">
        <label for="a">Vrijednost a:</label>
        <input type="number" name="a" id="a" required step="any"><br><br>

        <label for="b">Vrijednost b:</label>
        <input type="number" name="b" id="b" required step="any"><br><br>

        <button type="submit">Pošalji</button>
    </form>

    <?php if ($result !== null): ?>
        <h2>Rezultat:</h2>
        <p>Vrijednost varijable c je: <strong><?php echo $result; ?></strong></p>
    <?php endif; ?>
</body>
</html>
