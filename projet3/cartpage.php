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
    <link href="cartpage.css" rel="stylesheet">
    <link href="stylesassplante.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <!-- first part with the nav bar -->
    <nav class="barre">
        <!-- logo du site-->
        <div class="logo">
            <img id="logopart1" alt="logo du site" src="logo-site.jpeg">
            <img id="logopart2" alt="logo du site" src="logo-titre.png">
        </div>
        <!-- partie pour la recherche-->
        <div class="search-container">
            <input id="search-tab" placeholder="Search" type="search">
            <button id="button-search"><i class="fas fa-search logo-search"></i></button>
        </div>
        <!-- partie gauche de la barre-->
        <div class="tabpartiegauche">
            <i class="fas fa-shopping-cart logo-panier"></i>
            <i class="fas fa-bars menu-bar" onclick="ShowSideBar()"></i><!--afficher le menu interieur-->
            <div> <!-- barre interieure-->
                <ul class="sidebar" style="list-style: none; padding: 0;">
                    <span class="material-symbols-outlined crosssidebar" Onclick="Hidesidebar()">
                        close
                    </span>
                    <li><span class="material-symbols-outlined symbolist">
                            person
                        </span>login</li>
                    <li><span class="material-symbols-outlined symbolist">
                            yard
                        </span>Our plants</li>
                    <li><span class="material-symbols-outlined symbolist">
                            potted_plant
                        </span>pots and decoration</li>
                    <li> <span class="material-symbols-outlined symbolist">
                            favorite
                        </span> Favorites</li>
                    <li> <span class="material-symbols-outlined symbolist">
                            home
                        </span>About us</li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="content">
        <div class="cartfull">
            <div class="productanddesc">
                <div class="productimage">
                    <?php </s>> <?>
                    <!-- <img src="tulipe.jpg" class="flowerimg"> -->
                </div>
                <div class="info">
                    <h2>Product Details</h2>
                    <div class="rating">
                        <span>4.5/5</span> <i class="fas fa-star"></i> (120 reviews)
                    </div>
                    <div><a></a></div>
                    <br>
                    <button class="share"><i class="fas fa-share"></i> Share</button>
                    <div class="quantity-selector">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    </div>

                </div>
            </div>




            <div class="confirmation">




            </div>

        </div>
        <div class="similarproduct">
            <h2>See Similar products</h2>
            <ul class="produitspharecollumn">
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li>';
                        echo '<img src="' . $row["image"] . '" class="imagefleursphare" alt="produit phare">';
                        echo '<p>' . $row["name"] . ' : ' . $row["price"] . '€</p>';
                        echo '<button class="Shopnow">SHOP NOW</button>';
                        echo '</li>';
                    }
                } else {
                    echo "Aucun produit trouvé.";
                }
                ?>
            </ul>

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
<!-- fonction pour afficher et desaficher la barre de menu-->
<script>
    function ShowSideBar() {
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
    }

    function Hidesidebar() {
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
    }
</script>


</html>
<?php
$conn->close();
?>