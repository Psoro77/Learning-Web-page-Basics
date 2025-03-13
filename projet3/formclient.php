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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="icon-siteplante.jpg">
    <title>Your Botanic Space</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="formpage.css" rel="stylesheet">
    <link href="stylesassplante.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <div class="content">
        <div class="backgroundcontainer">
            <img src="image1.jpeg" id="image1">
            <div class="titlebox">
                <h1>Create an Account</h1>
            </div>
            <div class="formbox">
                <form action="newclient.php" method="post"
                    id="newclientform" class="form">
                    </select><br>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Full Name:</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="soloquest">
                            <label>Address :</label>
                            <input type="text" name="Address" required><br>
                        </div>
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Country :</label>
                            <input type="number" name="countryext" required>
                        </div>
                        <div class="soloquest">
                            <label>Phone number :</label>
                            <input type="number" name="phonenumber" required><br>
                        </div>
                    </div>
                    <div class="spacevide">
                        <img src="image1.jpeg" id="image1">
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>E-mail :</label>
                            <input type="email" value="email" required>
                        </div>
                        <div class="soloquest">
                            <label>Create a Password :</label>
                            <input type="password" value="Add Product" required><br>
                        </div>
                    </div>
                    <div class="submitbox">
                        <button type="submit" name="submit">Submit</button>
                    </div>


                </form>
            </div>
        </div>

    </div>




    <!-- footer here -->
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
            <p>&copy; 2024 Botanic Space Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>
<?php
$conn->close();
?>