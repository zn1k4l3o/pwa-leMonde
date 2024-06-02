<?php
include '../connect.php';
define('UPLPATH', 'storage/images');
?>
<?php
$connection = mysqli_connect("localhost", "root", "", "lemonde") or die("No server connection!");
$query       = "SELECT * FROM posts WHERE section='Sport' LIMIT 6";
$arraySports = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../globals.css">
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="./politics.php" class="link">POLITIKA</a>
            <a href="./administration.php" class="link">ADMINISTRACIJA</a>
            <a href="./newPost.php" class="link">NOVI ČLANAK</a>
        </nav>
    </header>

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
                        <img src='../$targetPhotoDir' class='newsImg'/>
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