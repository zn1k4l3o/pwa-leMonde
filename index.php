<?php
include 'connect.php';
define('UPLPATH', 'storage/images');
?>
<?php
$connection = mysqli_connect("localhost", "root", "", "lemonde") or die("No server connection!");
$query        = "SELECT * FROM posts WHERE section='General' LIMIT 3";
$arrayGeneral = mysqli_query($connection, $query);
$query        = "SELECT * FROM posts WHERE section='Sport' LIMIT 3";
$arraySports  = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="globals.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">
</head>

<body>
    <header>
        <div class="top">
            <img src="images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
            <a href="pages/login.php"><img src="images/blank_profile.png" class="profile" /></a>
        </div>
        <nav>
            <a href="index.php" class="link">HOME</a>
            <a href="pages/general.php" class="link">OPĆENITO</a>
            <a href="pages/sports.php" class="link">SPORT</a>
            <?php
            session_start();
            if (isset($_SESSION["level"]))
            {
                if ($_SESSION["level"] === 0)
                {
                    echo "<a href=\"pages/administration.php\" class=\"link\">ADMINISTRACIJA</a>
                      <a href=\"pages/newPost.php\" class=\"link\">NOVI ČLANAK</a>";
                }
                else if ($_SESSION["level"] === 1)
                {
                    echo "<a href=\"pages/newPost.php\" class=\"link\">NOVI ČLANAK</a>";
                }
            }
            ?>

        </nav>
    </header>
    <section>
        <hr />
        <h2 id="general">Općenito</h2>
        <div class="articles">
            <?php
            while ($row = mysqli_fetch_assoc($arrayGeneral))
            {
                $id             = $row["id"];
                $title          = $row['title'];
                $short          = $row['shortDescription'];
                $targetPhotoDir = $row['targetPhotoDir'];
                if (boolval($targetPhotoDir) != true)
                {
                    $targetPhotoDir = './images/noImage.jpg';
                }

                echo "
                <a class='card' href='./pages/article.php?id=" . $id . "' >
                    <article class='news'>
                        <img src='$targetPhotoDir' class='newsImg'/>
                        <h4>$title</h4>
                        <p>$short</p>
                    </article>
                </a>";
            }
            ?>
        </div>
    </section>

    <section>
        <hr />
        <h2 id="sport">Sport</h2>
        <div class="articles">
            <?php
            while ($row = mysqli_fetch_assoc($arraySports))
            {
                $id             = $row["id"];
                $title          = $row['title'];
                $short          = $row['shortDescription'];
                $targetPhotoDir = $row['targetPhotoDir'];
                if (boolval($targetPhotoDir) != true)
                {
                    $targetPhotoDir = './images/noImage.jpg';
                }

                echo "
                <a class='card' href='./pages/article.php?id=" . $id . "' >
                    <article class='news'>
                        <img src='$targetPhotoDir' class='newsImg'/>
                        <h4>$title</h4>
                        <p>$short</p>
                    </article>
                </a>";
            }
            ?>
        </div>
    </section>
</body>

</html>