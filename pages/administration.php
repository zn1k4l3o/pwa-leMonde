<?php
include '../connect.php';
define('UPLPATH', 'storage/images');
?>
<?php
$connection = mysqli_connect("localhost", "root", "", "lemonde") or die("No server connection!");
$query               = "SELECT * FROM posts WHERE section='Politics'";
$arrayPolitics       = mysqli_query($connection, $query);
$query               = "SELECT * FROM posts WHERE section='Sports'";
$arraySports         = mysqli_query($connection, $query);
$query               = "SELECT * FROM posts WHERE section='Administration'";
$arrayAdministration = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde administration</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="./newPost.css">
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="../index.php#politique" class="link">POLITIQUE</a>
            <a href="../index.php#sport" class="link">SPORT</a>
            <a href="./newPost.php" class="link">NOVI ČLANAK</a>
        </nav>
    </header>
</body>

</html>