<?php
// Povezivanje na bazu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nova";

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjera konekcije
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Provjera i spremanje podataka iz forme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = $_POST['country'];

    $stmt = $conn->prepare("INSERT INTO korisnik (FirstName, LastName, Email, Username, Password, Country) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $username, $password, $country);

    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <h1>Registration Form</h1>
    <?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
    <form action="zadatak_16.php" method="POST">
        <label for="firstname">First Name *</label><br>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Last Name *</label><br>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">Your E-mail *</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="username">Username *</label><br>
        <input type="text" id="username" name="username" minlength="5" maxlength="10" required><br><br>

        <label for="password">Password *</label><br>
        <input type="password" id="password" name="password" minlength="4" required><br><br>

        <label for="country">Country</label><br>
        <select id="country" name="country">
            <option value="" disabled selected>molimo odaberite</option>
            <option value="Croatia">Croatia</option>
            <option value="Serbia">Serbia</option>
            <option value="Bosnia">Bosnia</option>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
