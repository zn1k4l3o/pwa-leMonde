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
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="./politics.php" class="link">POLITIKA</a>
            <a href="./sports.php" class="link">SPORT</a>
            <a href="./administration.php" class="link">ADMINISTRACIJA</a>
            <a href="./newPost.php" class="link">NOVI ČLANAK</a>
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