<?php
$id = $_GET["id"];
$connection = mysqli_connect("localhost", "root", "", "lemonde") or die("No server connection!");
$query   = "SELECT * FROM posts WHERE id=$id";
$article = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="./article.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
            <a href="login.php"><img src="../images/blank_profile.png" class="profile" /></a>
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="./general.php" class="link">OPĆENITO</a>
            <a href="./sports.php" class="link">SPORT</a>
            <?php
            if (isset($_SESSION["level"]))
            {
                if ($_SESSION["level"] === 0)
                {
                    echo "<a href=\"administration.php\" class=\"link\">ADMINISTRACIJA</a>
                      <a href=\"./newPost.php\" class=\"link\">NOVI ČLANAK</a>";
                }
                else if ($_SESSION["level"] === 1)
                {
                    echo "<a href=\"./newPost.php\" class=\"link\">NOVI ČLANAK</a>";
                }
            }
            ?>

        </nav>
    </header>
    <section>
        <?php
        $row            = mysqli_fetch_assoc($article);
        $title          = $row["title"];
        $targetPhotoDir = $row['targetPhotoDir'];
        $long           = $row['longDescription'];
        echo "<h1>$title<h1>";
        if (boolval($targetPhotoDir))
        {
            echo "<img class='mainPhoto' src='../$targetPhotoDir' title='Article image' alt='Article image'/>";

        }
        echo "<p>$long</p>";
        ?>
    </section>
</body>

</html>