<?php
include 'connect.php';
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
    <title>Le Monde</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="globals.css">
</head>

<body>
    <header>
        <img src="images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
    </header>
    <nav>
        <a href="index.php" class="link">HOME</a>
        <a href="#politique" class="link">POLITIKA</a>
        <a href="#sport" class="link">SPORT</a>
        <a href="#administracija" class="link">ADMINISTRACIJA</a>
        <a href="pages/newPost.php" class="link">NOVI ČLANAK</a>
    </nav>
    <section>
        <hr />
        <h2 id="politique">Politique</h2>
        <div class="articles">
            <?php
            while ($row = mysqli_fetch_assoc($arrayPolitics))
            {
                $title          = $row['title'];
                $short          = $row['shortDescription'];
                $targetPhotoDir = $row['targetPhotoDir'];

                echo "<article class='news'>
                    <img src='$targetPhotoDir' class='newsImg'/>
                    <h4>$title</h4>
                    <p>$short</p>
                </article>";
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
                $title          = $row['title'];
                $short          = $row['shortDescription'];
                $targetPhotoDir = $row['targetPhotoDir'];
                echo "<article class='news'>
                    <img src='$targetPhotoDir' class='newsImg'/>
                    <h4>$title</h4>
                    <p>$short</p>
                </article>";
            }
            ?>
        </div>
    </section>
    <!--
    <section>
        <hr/>
        <h2 id="administracija">Administracija</h2>
        <div class="articles">
            <?php
            for ($i = 0; $i < 5; $i++)
            {
                echo "<article class='news'>
                    <img src='images/leMondeLogo.jpg' class='newsImg'/>
                    <h4>Naslov</h4>
                    <p>Paragraf</p>
                </article>";
            }
            ?>
        </div>
        
    </section>
        -->
</body>

</html>