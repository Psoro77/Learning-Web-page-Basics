<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <link rel="icon" href="../images/icon-siteplante.jpg">
    <title>Your Botanic Space</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="../styles/buypage.css" rel="stylesheet">
    <link href="../styles/stylesassplante.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <!-- first part with the nav bar -->
    <nav class="barre">
        <!-- logo du site-->
        <div class="logo">
            <a href="main-page-plante.html">
                <img id="logopart1" alt="logo du site" src="../images/logo-site.jpeg">
                <img id="logopart2" alt="logo du site" src="../images/logo-titre.png">
            </a>
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
        <div class="buyproductbox">
            <div class="productandbuy">
                <div class="productimage">
                    <img src="../images/roseenpot.jpg" class="flowerimg">
                </div>
                <div class="buybox">
                    <div class="buybox">
                        <h2>Product Options</h2>
                        <div class="rating">
                            <span>4.5/5</span> <i class="fas fa-star"></i> (120 reviews)
                        </div>
                        <br>
                        <button class="add-to-cart" action="add_to_cart.php"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                        <br>
                        <button class="add-to-favorites"><i class="fas fa-star"></i> Add to Favorites</button>
                        <br>
                        <button class="buy-now"><i class="fas fa-bolt"></i> Buy Now</button>
                        <br>
                        <button class="share"><i class="fas fa-share"></i> Share</button>
                        <div class="quantity-selector">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="description">
                <h2></h2>
                <p class="titre">Rose Écarlate "Amour Éternel"</p>
                <p class="descriptiontxt">Plongez dans la beauté intemporelle de notre Rose Écarlate "Amour Éternel",
                    une véritable œuvre de la nature qui incarne la passion et l'élégance. Avec ses pétales d’un rouge
                    profond et velouté, cette rose est parfaite pour embellir votre jardin ou offrir un message d’amour
                    inoubliable. Facile à entretenir, elle prospère dans un sol bien drainé avec une exposition
                    ensoleillée, et son parfum délicat embaumera votre espace de vie. Ajoutez une touche de romantisme à
                    votre collection botanique avec cette rose exceptionnelle, symbole d’affection et de beauté durable.
                </p>
            </div>

        </div>
        <div class="similarproduct">
            <h2>See Similar products</h2>
            <ul class="produitspharecollumn">
                <li> <img src="../images/tulipe.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Tulipe : 12,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
                <li><img src="../images/orchidee.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Orchidée : 24,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
                <li><img src="../images/pivoine.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Pivoine : 17,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
                <li><img src="../images/dahlia.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Dahlia : 15,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
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