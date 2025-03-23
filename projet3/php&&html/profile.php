<?php
require_once 'auth.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/icon-siteplante.jpg">
    <title>Profile - Botanic Space</title>
    <link href="../styles/cartpage.css" rel="stylesheet">
    <link href="../styles/stylesassplante.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="barre">
        <div class="logo">
            <a href="main-page-plante.html">
                <img id="logopart1" alt="logo du site" src="../images/logo-site.jpeg"><img id="logopart2" alt="logo du site" src="../images/logo-titre.png">
            </a>
        </div>
    </nav>




    <div class="content">
        <div class="cartfull">
            <div class="productanddesc">
                <div class="productimage">
                    <img src="../images/default-profile.jpg" alt="Profile Image" class="flowerimg">
                </div>
                <div class="info">
                    <h3>Informations</h3>
                    <label><strong>Nom : </strong>
                        <?php echo htmlspecialchars($user['name']); ?></label>
                    <label><strong>Email :</strong>
                        <?php echo htmlspecialchars($user['email']); ?></label>
                    <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($user['phonenumber']); ?></p>
                    <p><strong>Adresse :</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                </div>
            </div>
        </div>
        <div class="similarproduct">
            <h3>Your cart</h3>
            <p>Nombre d'articles : 3</p>
            <button onclick="window.location.href='cartpage.php'">Voir le panier</button>
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
            <p>&copy; 2024 Botanic Space Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>
<?php
$conn->close();
?>