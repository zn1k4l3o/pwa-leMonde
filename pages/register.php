<!DOCTYPE html>
<html lang="en">

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
            <a href="sport.php" class="link">POLITIKA</a>
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
        <form action="login.php" method="POST">
            <label for="username">
                Korisničko ime
            </label>
            <br />
            <input type="text" name="username" id="username" required />
            <br />
            <label for="email">
                Email
            </label>
            <br />
            <input type="text" name="email" id="email" required />
            <br />
            <label for="level">
                Razina pristupa
            </label>
            <br />
            <select type="number" name="level" id="level" value="0" required>
                <option value="0">Administrator</option>
                <option value="1">Novinar</option>
                <option value="2">Čitaoc</option>
            </select>
            <br />
            <label for="password">
                Lozinka
            </label>
            <br />
            <input type="password" name="password" id="password" required />
            <br />
            <label for="repeatPassword">
                Ponovi lozinku
            </label>
            <br />
            <input type="password" name="repeatPassword" id="repeatPassword" required />
            <br />
            <input type="submit" value="Registriraj se" />
        </form>
        <a href="login.php">
            <button>Ulogiraj se</button>
        </a>
    </section>
</body>

</html>