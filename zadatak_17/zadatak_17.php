<?php
$servername = "localhost";
$username = "root";
$password = "Nikola.123";
$dbname = "nova";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u.FirstName, u.LastName, c.CountryName
        FROM Users u
        LEFT JOIN Countries c ON u.CountryID = c.CountryID";
$result = $conn->query($sql);

$conn->close();
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
    <h1>Lista korisnika i država</h1>
    <ul>
        <?php
        if ($result && $result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['FirstName']) . " " . htmlspecialchars($row['LastName']) . " (" . htmlspecialchars($row['CountryName']) . ")</li>";
            }
        } else {
            echo "<li>No users found.</li>";
        }
        ?>
    </ul>
</body>
</html>
