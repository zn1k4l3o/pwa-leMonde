<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Monde</title>
    <link rel="stylesheet" href="../globals.css">
    <link rel="stylesheet" href="login.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="../js/form-validation-register.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
</head>

<body>
    <header>
        <div class="top">
            <img src="../images/leMondeLogo.jpg" alt="Le Monde" title="Le Monde" class="headerPhoto">
        </div>
        <nav>
            <a href="../index.php" class="link">HOME</a>
            <a href="general.php" class="link">OPĆENITO</a>
            <a href="sports.php" class="link">SPORT</a>
            <?php
            session_start();
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
        <form action="login.php" method="POST" name="registration">
            <label for="username">
                Korisničko ime
            </label>
            <br />
            <input type="text" name="username" id="username" />
            <br />
            <label for="email">
                Email
            </label>
            <br />
            <input type="text" name="email" id="email" />
            <br />
            <label for="level">
                Razina pristupa
            </label>
            <br />
            <select type="number" name="level" id="level" value="0">
                <option value="0">Administrator</option>
                <option value="1">Novinar</option>
                <option value="2">Čitaoc</option>
            </select>
            <br />
            <label for="password">
                Lozinka
            </label>
            <br />
            <input type="password" name="password" id="password" />
            <br />
            <label for="repeatPassword">
                Ponovi lozinku
            </label>
            <br />
            <input type="password" name="repeatPassword" id="repeatPassword" />
            <br />
            <input type="submit" value="Registriraj se" />
        </form>
        <a href="login.php">
            <button class="switch">Ulogiraj se</button>
        </a>
    </section>
</body>

</html>