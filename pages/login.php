<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$konekcija = mysqli_connect("localhost", "root", "", "lemonde") or die("Nema konekcije na server!");
if (isset($_POST["email"]))
{
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], CRYPT_BLOWFISH);
    $level    = $_POST["level"];
    $query    = "INSERT INTO users (username, email, password, level) VALUES (?, ?, ?, ?)";
    $stmt     = mysqli_stmt_init($konekcija);
    if (mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, 'sssi', $username, $email, $password, $level);
        try
        {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        catch (Exception $e)
        {
            echo "Nije moguće unesti novog korisnika u bazu";
        }
    }

}
else if (isset($_POST["username"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query    = "SELECT username, password, level FROM users WHERE username=?";
    $stmt     = mysqli_stmt_init($konekcija);
    if (mysqli_stmt_prepare($stmt, $query))
    {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }

    mysqli_stmt_bind_result($stmt, $usernameDB, $passwordDB, $level);
    mysqli_stmt_fetch($stmt);
    if (password_verify($password, $passwordDB))
    {
        $_SESSION["username"] = $username;
        $_SESSION["level"]    = $level;
    }
}
if (isset($_POST["signOut"]))
{
    $_SESSION["username"] = null;
    $_SESSION["level"]    = null;
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="politics.php" class="link">POLITIKA</a>
            <a href="sports.php" class="link">SPORT</a>
            <?php
            if (isset($_SESSION["level"]))
            {
                if ($_SESSION["level"] === 0)
                {
                    echo "<a href=\"administration.php\" class=\"link\">ADMINISTRACIJA</a>
                      <a href=\"newPost.php\" class=\"link\">NOVI ČLANAK</a>";
                }
                else if ($_SESSION["level"] === 1)
                {
                    echo "<a href=\"newPost.php\" class=\"link\">NOVI ČLANAK</a>";
                }
            }
            ?>

        </nav>
    </header>
    <section class="middle">
        <form action="login.php" method="POST">
            <label for="username">
                Korisničko ime
            </label>
            <br />
            <input type="text" name="username" id="username" required />
            <br />
            <label for="password">
                Lozinka
            </label>
            <br />
            <input type="password" name="password" id="password" required />
            <br />
            <input type="submit" value="Prijavi se" />
        </form>
        <a href="register.php">
            <button>Registriraj se</button>
        </a>
        <form action="login.php" method="POST">
            <input type="submit" name="signOut" value="Odjavi se">
        </form>
    </section>

</body>

</html>