<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $broj1 = (float)$_POST['broj1'];
    $broj2 = (float)$_POST['broj2'];
    $operacija = $_POST['operacija'];
    $rezultat = "";

    switch ($operacija) {
        case '+':
            $rezultat = $broj1 + $broj2;
            break;
        case '-':
            $rezultat = $broj1 - $broj2;
            break;
        case '*':
            $rezultat = $broj1 * $broj2;
            break;
        case '/':
            if ($broj2 != 0) {
                $rezultat = $broj1 / $broj2;
            } else {
                $rezultat = "Dijeljenje s nulom nije dozvoljeno!";
            }
            break;
        default:
            $rezultat = "Nepoznata operacija.";
    }

    echo "<h3>Rezultat: $rezultat</h3>";
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
<h1>Kalkulator (Switch naredba)</h1>
    <form method="post">
        <label for="broj1">Upiši prvi broj *</label>
        <input type="number" id="broj1" name="broj1" step="any" required>
        <br><br>

        <label for="broj2">Upiši drugi broj *</label>
        <input type="number" id="broj2" name="broj2" step="any" required>
        <br><br>

        <label>Odaberite operaciju:</label>
        <br>
        <input type="radio" id="zbrajanje" name="operacija" value="+" required>
        <label for="zbrajanje">+</label>

        <input type="radio" id="oduzimanje" name="operacija" value="-">
        <label for="oduzimanje">-</label>

        <input type="radio" id="mnozenje" name="operacija" value="*">
        <label for="mnozenje">*</label>

        <input type="radio" id="dijeljenje" name="operacija" value="/">
        <label for="dijeljenje">/</label>
        <br><br>

        <button type="submit">Izračunaj</button>
    </form>

</body>
</html>
