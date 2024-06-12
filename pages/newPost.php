<?php
include '../connect.php';
define('UPLPATH', 'storage/images/');
?>
<?php
session_start();
if (isset($_POST['title']))
{
    $konekcija = mysqli_connect("localhost", "root", "", "lemonde") or die("Nema konekcije na server!");
    $title   = $_POST['title'];
    $short   = $_POST['shortDescription'];
    $long    = $_POST['longDescription'];
    $section = $_POST['section'];

    $targetPhotoDir = null;
    if ($_FILES != null && isset($_FILES['photo']))
    {
        if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE)
        {

            $file = $_FILES["photo"]["tmp_name"];

            if (isset($file))
            {
                $image_size = getimagesize($_FILES['photo']['tmp_name']);

                if ($image_size == FALSE)
                    echo "That's not an image.";
                else
                {
                    $targetPhotoDir = UPLPATH . $_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], "../$targetPhotoDir");
                }
            }

        }

    }

    $query  = "INSERT INTO posts (title, shortDescription, longDescription, targetPhotoDir, section, userId) VALUES ('$title', '$short', '$long', '$targetPhotoDir', '$section', " . $_SESSION["id"] . ")";
    $result = mysqli_query($konekcija, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New post</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="./newPost.css">
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
                    echo "<a href=\"administration.php\" class=\"link\">ADMINISTRACIJA</a>";
                }
            }
            ?>

        </nav>
    </header>
    <section>
        <form enctype="multipart/form-data" action="newPost.php" method="POST">
            <label for="title">Title</label>
            <br />
            <input class="textInput" name="title" required />
            <br />
            <label for="photo">Image</label>
            <br />
            <input class="textInput" name="photo" type="file" />
            <br />
            <label for="shortDescription">Short description</label>
            <br />
            <input class="textInput" name="shortDescription" type="text" required />
            <br />
            <label for="longDescription">Long description</label>
            <br />
            <textarea class="textInput" name="longDescription" required></textarea>
            <br />
            <select name="section" required>
                <option value="General">General</option>
                <option value="Sport">Sport</option>
            </select>
            <input name="submit" type="submit" value="Post" />
        </form>
    </section>

</body>

</html>