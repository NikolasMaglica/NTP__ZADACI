<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kolokvij1 = (int)$_POST['kolokvij1'];
        $kolokvij2 = (int)$_POST['kolokvij2'];

        if ($kolokvij1 < 2 || $kolokvij2 < 2) {
            echo "<p class='negative'>Krajnja ocjena je negativna jer je jedan od kolokvija negativan.</p>";
        } else {
            $prosjek = ($kolokvij1 + $kolokvij2) / 2;
            $konacnaOcjena = round($prosjek);
            echo "<p class='positive'>Prosjek ocjena: " . number_format($prosjek, 2) . "</p>";
            echo "<p class='positive'>Konačna ocjena: $konacnaOcjena</p>";
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
    <link rel="shortcut icon" type="image/x-icon" href="style.css">

</head>
<body>
<div class="container">
        <h1>Izračun konačne ocjene</h1>
        <form method="post">
            <label for="kolokvij1">Ocjena I. kolokvija (1-5):</label>
            <input type="number" id="kolokvij1" name="kolokvij1" min="1" max="5" required>
            
            <label for="kolokvij2">Ocjena II. kolokvija (1-5):</label>
            <input type="number" id="kolokvij2" name="kolokvij2" min="1" max="5" required>
            
            <button type="submit">Izračunaj</button>
        </form>
</div>
</body>
</html>
