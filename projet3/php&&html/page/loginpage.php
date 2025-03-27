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
    <?php
    echo '<link href="../../styles/formpage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
</head>

<nav class="barre">
    <div class="logo">
        <a href="index.php">
            <img id="logopart1" alt="logo du site" src="../../images/logo-site.jpeg">
            <img id="logopart2" alt="logo du site" src="../../images/logo-titre.png">
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
            <img src="../../images/image1.jpeg" id="image1">
            <div class="titlebox">
                <h1>Login to Your Account</h1>
            </div>
            <div class="formbox">
                <form action="../todb/loginprocess.php" method="post" id="loginform" class="form">
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

    <?php
    include('../views/footer.php');

    ?>
</body>

</html>

<?php
$conn->close();
?>