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
    <title>Pivoine - Nom de la boutique</title>
</head>

<body>
    <!-- Barre de navigation -->
    <?php
    include('../views/succesmessage.php');
    include('../views/navbar.php');
    ?>

    <div class="content">
        <div class="buyproductbox">
            <div class="productandbuy">
                <div class="productimage">
                    <img src="../../images/pivoine.jpg" class="flowerimg" alt="Pivoine">
                </div>
                <div class="buybox">
                    <h2>Product Options</h2>
                    <div class="rating">
                        <p class="price">17,99€</p>
                        <span>4.7/5</span> <i class="fas fa-star"></i> (130 avis)
                    </div>
                    <br>
                    <button class="add-to-favorites"><i class="fas fa-star"></i> Ajouter aux favoris</button>
                    <br>
                    <button class="buy-now"><i class="fas fa-bolt"></i> Acheter maintenant</button>
                    <br>
                    <button class="share"><i class="fas fa-share"></i> Partager</button>
                    <div class="quantity-selector">
                        <form action="../todb/add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="4">
                            <label for="quantity">Quantité :</label>
                            <input type="number" id="quantity" name="quantity" min="1" class="quantity-input" value="1">
                    </div>
                    <button class="add-to-cart" type="submit" name="productsubm"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                    <br>
                    </form>
                </div>
            </div>
            <div class="description">
                <h2>Description</h2>
                <p class="titre">Pivoine Majestueuse "Rêve de Printemps"</p>
                <p class="descriptiontxt">Laissez-vous envoûter par la Pivoine Majestueuse "Rêve de Printemps", une fleur qui incarne la grâce et la beauté éphémère du printemps. Avec ses pétales luxuriants et ses teintes douces, cette pivoine transformera votre jardin en un véritable tableau vivant. Facile à cultiver, elle prospère dans un sol riche et bien drainé avec une exposition ensoleillée à mi-ombragée. Son parfum délicat et ses fleurs opulentes en font un choix parfait pour les bouquets ou pour embellir vos massifs. Offrez-vous un morceau de paradis avec cette pivoine d'exception, symbole de prospérité et de bonheur.</p>
            </div>
        </div>
        <div class="similarproduct">
            <h2>Voir les produits similaires</h2>
            <ul class="produitspharecollumn">
                <li>
                    <img src="../../images/tulipe.jpg" class="imagefleursphare" alt="Tulipe">
                    <p>Tulipe : 12,99€</p>
                    <a href="buytulipes.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
                <li>
                    <img src="../../images/roseenpot.jpg" class="imagefleursphare" alt="Rose">
                    <p>Rose : 19,99€</p>
                    <a href="buyroses.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
                <li>
                    <img src="../../images/orchidee.jpg" class="imagefleursphare" alt="Orchidée">
                    <p>Orchidée : 24,99€</p>
                    <a href="buyorchidee.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
                <li>
                    <img src="../../images/dahlia.jpg" class="imagefleursphare" alt="Dahlia">
                    <p>Dahlia : 15,99€</p>
                    <button class="Shopnow">ACHETER</button>
                </li>
            </ul>
        </div>
    </div>

    <!-- Pied de page -->
    <?php
    include('../views/footer.php');
    ?>

    <!-- Script pour la barre de navigation -->
    <?php
    include('../views/jsscriptnav.php');
    ?>
</body>

</html>