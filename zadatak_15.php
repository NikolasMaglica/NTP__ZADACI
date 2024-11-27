<?php
$con = mysqli_connect("localhost", "root", "", "nova");

if (!$con) {
    die("Povezivanje nije uspjelo: " . mysqli_connect_error());
}

$result = null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchInput = mysqli_real_escape_string($con, $_POST['search']); 

    $query = "SELECT name, lastname FROM users WHERE name LIKE '%$searchInput%' OR lastname LIKE '%$searchInput%'";
    $result = mysqli_query($con, $query);
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
    <h1>Pretraživanje korisnika</h1>

    <form method="post" action="">
        <label for="search">Unesite ime ili prezime:</label><br>
        <input type="text" id="search" name="search" required><br><br>
        <input type="submit" value="Pretraži">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h2>Rezultati pretraživanja:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . htmlspecialchars($row['name']) . " " . htmlspecialchars($row['lastname']) . "</p>";
            }
        } else {
            echo "<p>Nema rezultata za pretragu.</p>";
        }
    }
    ?>

    <?php mysqli_close($con);  ?>
</body>
</html>
