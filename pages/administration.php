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
else if (isset($_GET["userId"]))
{
    $query = "DELETE FROM users WHERE id=" . $_GET["userId"];
    mysqli_query($connection, $query);
}
$query        = "SELECT * FROM posts WHERE section='General'";
$arrayGeneral = mysqli_query($connection, $query);
$query        = "SELECT * FROM posts WHERE section='Sport'";
$arraySports  = mysqli_query($connection, $query);
$query        = "SELECT * FROM users";
$arrayUsers   = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde administration</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="./administration.css">
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
            <a href="./newPost.php" class="link">NOVI ČLANAK</a>
        </nav>
    </header>
    <section>
        <h1>Svi članci</h1>
        <h2>Općenito</h2>
        <?php
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Short description</th>
                    <th>Long description</th>
                    <th>Photo</th>
                </tr>                    
                ";
        while ($row = mysqli_fetch_assoc($arrayGeneral))
        {
            $id             = $row["id"];
            $title          = $row['title'];
            $short          = $row['shortDescription'];
            $long           = $row['longDescription'];
            $targetPhotoDir = $row['targetPhotoDir'];
            $hasPhoto       = boolval($targetPhotoDir) ? 'true' : 'false';

            if (strlen($title) > 20)
                $title = mb_substr($title, 0, 20) . "...";
            if (strlen($short) > 20)
                $short = mb_substr($short, 0, 20) . "...";
            if (strlen($long) > 23)
                $long = mb_substr($long, 0, 20) . "...";

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
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Short description</th>
                    <th>Long description</th>
                    <th>Photo</th>
                </tr>                    
                ";
        while ($row = mysqli_fetch_assoc($arraySports))
        {
            $id             = $row["id"];
            $title          = $row['title'];
            $short          = $row['shortDescription'];
            $long           = $row['longDescription'];
            $targetPhotoDir = $row['targetPhotoDir'];
            $hasPhoto       = boolval($targetPhotoDir) ? 'true' : 'false';

            if (strlen($title) > 20)
                $title = mb_substr($title, 0, 20) . "...";
            if (strlen($short) > 20)
                $short = mb_substr($short, 0, 20) . "...";
            if (strlen($long) > 23)
                $long = mb_substr($long, 0, 20) . "...";

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
        <h2>Korisnici</h2>
        <?php
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                </tr>                    
                ";
        while ($row = mysqli_fetch_assoc($arrayUsers))
        {
            $id       = $row["id"];
            $username = $row['username'];
            $email    = $row['email'];
            $level    = $row['level'];

            /*
            if (strlen($title) > 20)
                $title = mb_substr($title, 0, 20) . "...";
            if (strlen($short) > 20)
                $short = mb_substr($short, 0, 20) . "...";
            if (strlen($long) > 23)
                $long = mb_substr($long, 0, 20) . "...";
            */
            echo "
                <tr>
                    <td class='tdId' >$id</td>
                    <td class='tdTitle'>$username</td>
                    <td class='tdShort'>$email</td>
                    <td class='tdLong'>$level</td>
                    <td class='tdTrash'>
                        <a href='./administration.php?userId=$id'>
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