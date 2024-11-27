<?php
date_default_timezone_set('Europe/Zagreb');
$currentTime = date('H:i');
$currentDay = date('l');
$isOpen = false;

if ($currentDay == 'Saturday') {
    $isOpen = ($currentTime >= '09:00' && $currentTime <= '14:00');
} elseif ($currentDay != 'Sunday') {
    $isOpen = ($currentTime >= '08:00' && $currentTime <= '20:00');
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
<h1>Status dućana</h1>
    <?php if ($isOpen): ?>
        <p>Dućan je otvoren!</p>
    <?php else: ?>
        <p>Dućan je zatvoren!</p>
    <?php endif; ?>
</body>
</html>
