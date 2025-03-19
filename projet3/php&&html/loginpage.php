<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "botanic_space";

// Créer une connexion avec MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <link rel="icon" href="../images/icon-siteplante.jpg">
    <title>Login - Botanic Space</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="../styles/formpage.css" rel="stylesheet">
    <link href="../styles/stylesassplante.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<nav class="barre">
    <div class="logo">
        <a href="main-page-plante.html">
            <img id="logopart1" alt="logo du site" src="../images/logo-site.jpeg">
            <img id="logopart2" alt="logo du site" src="../images/logo-titre.png">
        </a>
    </div>
    <div class="search-container">
        <input id="search-tab" placeholder="Search" type="search">
        <button id="button-search"><i class="fas fa-search logo-search"></i></button>
    </div>
    <div class="tabpartiegauche">
    </div>
</nav>

<body>
    <div class="content">
        <div class="backgroundcontainer">
            <img src="../images/image1.jpeg" id="image1">
            <div class="titlebox">
                <h1>Login to Your Account</h1>
            </div>
            <div class="formbox">
                <form action="loginprocess.php" method="post" id="loginform" class="form">
                    <div class="formpair">
                        <div class="soloquest">
                            <label>E-mail : </label>
                            <input type="email" name="email" required placeholder="123@yourmail.com">
                        </div>
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Password : </label>
                            <input type="password" name="password" required placeholder="Enter your password">
                        </div>
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                    </div>
                    <div class="submitbox">
                        <button type="submit" name="submit">Login</button>
                    </div>
                    <div class="additional-links">
                        <a href="forgot-password.php">Forgot Password?</a>
                        <p><a href="formclient.php">Don't have an account? Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Contactez-nous</h3>
                <p>Adresse: hearst</p>
                <p>Téléphone: +33 1 23 45 67 89</p>
                <p>Email: BotanicSpace@gmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Navigation</h3>
                <ul>
                    <li id="bar-foot"><a href="#home">Accueil</a></li>
                    <li id="bar-foot"><a href="#about">À propos</a></li>
                    <li id="bar-foot"><a href="#services">Services</a></li>
                    <li id="bar-foot"><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Suivez-nous</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Botanic Space Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>

<?php
$conn->close();
?>