<?php
require_once '../todb/database.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    echo '<link href="../../styles/buypage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
    <title>Orchidée - Nom de la boutique</title>
</head>

<body>
    <!-- Première partie avec la barre de navigation -->
    <?php
    include('../views/succesmessage.php');
    include('../views/navbar.php');
    ?>

    <div class="content">
        <div class="buyproductbox">
            <div class="productandbuy">
                <div class="productimage">
                    <img src="../../images/orchidee.jpg" class="flowerimg">
                </div>
                <div class="buybox">
                    <h2>Product Options</h2>
                    <div class="rating">
                        <p class="price">24,99€</p>
                        <span>4.8/5</span> <i class="fas fa-star"></i> (150 reviews)
                    </div>
                    <br>
                    <button class="add-to-favorites"><i class="fas fa-star"></i> Add to Favorites</button>
                    <br>
                    <button class="buy-now"><i class="fas fa-bolt"></i> Buy Now</button>
                    <br>
                    <button class="share"><i class="fas fa-share"></i> Share</button>
                    <div class="quantity-selector">
                        <form action="../todb/add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="3">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" class="quantity-input">
                    </div>
                    <button class="add-to-cart" type="submit" name="productsubm"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                    <br>
                    </form>
                </div>
            </div>
            <div class="description">
                <p class="titre">Orchidée Exotique "Beauté Tropicale"</p>
                <p class="descriptiontxt">Découvrez la splendeur de notre Orchidée Exotique "Beauté Tropicale", une fleur qui évoque les mystères des forêts tropicales. Avec ses pétales délicats et ses couleurs vibrantes, cette orchidée apportera une touche d'exotisme à votre intérieur. Facile à entretenir, elle préfère un environnement lumineux mais sans soleil direct, et un arrosage modéré. Laissez-vous séduire par son élégance et son parfum subtil, et faites de votre maison un havre de paix tropical.</p>
            </div>
        </div>
        <div class="similarproduct">
            <h2>See Similar products</h2>
            <ul class="produitspharecollumn">
                <li>
                    <img src="../../images/tulipe.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Tulipe : 12,99€</p>
                    <a href="buytulipes.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
                <li>
                    <img src="../../images/roseenpot.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Rose : 19,99€</p>
                    <a href="buyroses.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
                <li>
                    <img src="../../images/pivoine.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Pivoine : 17,99€</p>
                    <a href="buypivoine.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
            </ul>
        </div>
    </div>

    <?php
    include('../views/footer.php');
    ?>
</body>

<!-- Fonction pour afficher et masquer la barre de menu -->
<?php
include('../views/jsscriptnav.php');
?>

</html>