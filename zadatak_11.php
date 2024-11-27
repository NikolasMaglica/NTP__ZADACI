<?php
// Funkcija za provjeru je li broj prost
function isPrime($number) {
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

// Priprema liste prostih brojeva manjih od 100
$primeNumbers = [];
for ($i = 2; $i < 100; $i++) {
    if (isPrime($i)) {
        $primeNumbers[] = $i;
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
<h1>Prosti brojevi manji od 100</h1>
    <p>
        <?php
        // Ispis prostih brojeva iz pripremljene liste
        echo implode(", ", $primeNumbers);
        ?>
    </p>
</body>
</html>
