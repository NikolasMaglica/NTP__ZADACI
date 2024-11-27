<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nova";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $userID = $_POST['userID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $countryID = $_POST['countryID'];

    $stmt = $conn->prepare("UPDATE Users SET FirstName = ?, LastName = ?, CountryID = ? WHERE UserID = ?");
    $stmt->bind_param("ssii", $firstName, $lastName, $countryID, $userID);
    $stmt->execute();
    $stmt->close();
}

$sql = "SELECT u.UserID, u.FirstName, u.LastName, c.CountryID, c.CountryName
        FROM Users u
        LEFT JOIN Countries c ON u.CountryID = c.CountryID";
$resultUsers = $conn->query($sql);

$sqlCountries = "SELECT CountryID, CountryName FROM Countries";
$resultCountries = $conn->query($sqlCountries);

$countries = [];
if ($resultCountries->num_rows > 0) {
    while ($row = $resultCountries->fetch_assoc()) {
        $countries[$row['CountryID']] = $row['CountryName'];
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
    <h1>Uredi korisnike i države</h1>
    <table border="1">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultUsers && $resultUsers->num_rows > 0): ?>
                <?php while ($row = $resultUsers->fetch_assoc()): ?>
                    <tr>
                        <form method="POST">
                            <td>
                                <input type="text" name="firstName" value="<?= htmlspecialchars($row['FirstName']) ?>" required>
                            </td>
                            <td>
                                <input type="text" name="lastName" value="<?= htmlspecialchars($row['LastName']) ?>" required>
                            </td>
                            <td>
                                <select name="countryID" required>
                                    <?php foreach ($countries as $countryID => $countryName): ?>
                                        <option value="<?= $countryID ?>" <?= $countryID == $row['CountryID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($countryName) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="userID" value="<?= $row['UserID'] ?>">
                                <button type="submit" name="update">Update</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
<?php
$conn->close();
?>
