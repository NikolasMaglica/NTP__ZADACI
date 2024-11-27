<?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['vehicle'])) {
            $selectedVehicle = $_POST['vehicle'];
            echo "<p>Odabrali ste: <strong>$selectedVehicle</strong></p>";
        } else {
            echo "<p>Niste odabrali nijedno vozilo!</p>";
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
<h1>Odabir vozila</h1>
    <form method="post" action="">
        <p>Označi vozilo:</p>
        <input type="radio" name="vehicle" value="Audi"> Audi<br>
        <input type="radio" name="vehicle" value="BMW"> BMW<br>
        <input type="radio" name="vehicle" value="Renault"> Renault<br>
        <input type="radio" name="vehicle" value="Citroen"> Citroen<br>
        <input type="submit" value="Prikaži vozilo">
    </form>
</body>
</html>
