<?php
include '../connect.php';
define('UPLPATH', 'storage/images');
?>
<?php
$connection = mysqli_connect("localhost", "root", "", "lemonde") or die("No server connection!");

if (isset($_GET["id"]))
{
    $query = "DELETE FROM posts WHERE id=" . $_GET["id"];
    mysqli_query($connection, $query);
}
$query         = "SELECT * FROM posts WHERE section='Politics'";
$arrayPolitics = mysqli_query($connection, $query);
$query         = "SELECT * FROM posts WHERE section='Sport'";
$arraySports   = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde administration</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="./administration.css">
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="../index.php#politique" class="link">POLITIKA</a>
            <a href="../index.php#sport" class="link">SPORT</a>
            <a href="./newPost.php" class="link">NOVI ČLANAK</a>
        </nav>
    </header>
    <section>
        <h1>Svi članci</h1>
        <h2>Politika</h2>
        <?php
        echo "<table>";
        while ($row = mysqli_fetch_assoc($arrayPolitics))
        {
            $id             = $row["id"];
            $title          = $row['title'];
            $short          = $row['shortDescription'];
            $long           = $row['longDescription'];
            $targetPhotoDir = $row['targetPhotoDir'];
            $hasPhoto       = boolval($targetPhotoDir) ? 'true' : 'false';

            echo "
                <tr>
                    <td class='tdId' >$id</td>
                    <td class='tdTitle'>$title</td>
                    <td class='tdShort'>$short</td>
                    <td class='tdLong'>$long</td>
                    <td class='tdPhoto'>$hasPhoto</td>
                    <td class='tdTrash'>
                        <a href='./administration.php?id=" . $id . "'>
                            <div class='trash' >
                            </div>
                        </a>
                    </td>
                </tr>";
        }
        echo "</table>";
        ?>
        <br />
        <h2>Sport</h2>
        <?php
        echo "<table>";
        while ($row = mysqli_fetch_assoc($arraySports))
        {
            $id             = $row["id"];
            $title          = $row['title'];
            $short          = $row['shortDescription'];
            $long           = $row['longDescription'];
            $targetPhotoDir = $row['targetPhotoDir'];
            $hasPhoto       = boolval($targetPhotoDir) ? 'true' : 'false';

            echo "
                <tr>
                    <td class='tdId' >$id</td>
                    <td class='tdTitle'>$title</td>
                    <td class='tdShort'>$short</td>
                    <td class='tdLong'>$long</td>
                    <td class='tdPhoto'>$hasPhoto</td>
                    <td class='tdTrash'>
                        <a href='./administration.php?id=$id'>
                            <div class='trash' >
                            </div>
                        </a>
                    </td>
                </tr>";
        }
        echo "</table>";
        ?>
    </section>
</body>

</html>