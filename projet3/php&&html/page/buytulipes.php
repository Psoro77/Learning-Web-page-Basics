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
</head>

<body>
    <!-- Première partie avec la barre de navigation -->
    <?php
    include('../views/navbar.php');
    ?>
    <div class="content">
        <div class="buyproductbox">
            <div class="productandbuy">
                <div class="productimage">
                    <img src="../../images/tulipe.jpg" class="flowerimg">
                </div>
                <div class="buybox">
                    <div class="buybox">
                        <h2>Product Options</h2>
                        <div class="rating">
                            <p class="price">24,99€</p>
                            <span>4.5/5</span> <i class="fas fa-star"></i> (120 reviews)
                        </div>
                        <br>
                        <button class="add-to-favorites"><i class="fas fa-star"></i> Add to Favorites</button>
                        <br>
                        <button class="buy-now"><i class="fas fa-bolt"></i> Buy Now</button>
                        <br>
                        <button class="share"><i class="fas fa-share"></i> Share</button>
                        <div class="quantity-selector">
                            <form action="../todb/add_to_cart.php" method="post">
                                <input type="hidden" name="product_id" value="1">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" min="1" class="quantity-input">
                        </div>
                        <button class="add-to-cart" type="submit" name="productsubm"><i class="fas fa-shopping-cart"></i> Add to
                        </button>
                        <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="description">
                <h2></h2>
                <p class="titre">Tulip "Golden Sunrise"</p>
                <p class="descriptiontxt">Experience the radiant charm of our Tulip "Golden Sunrise," a true masterpiece
                    of nature that brings warmth and elegance to any garden. With its vibrant golden petals that glow
                    like the morning sun, this tulip is perfect for creating a breathtaking floral display or gifting a
                    touch of sunshine. Easy to grow, it thrives in well-drained soil with plenty of sunlight, rewarding
                    you with a stunning spring bloom. Add a splash of golden beauty to your garden with this exceptional
                    tulip, a symbol of joy and renewal.</p>
            </div>
        </div>
        <div class="similarproduct">
            <h2>See Similar products</h2>
            <ul class="produitspharecollumn">
                <li>
                    <img src="../../images/roseenpot.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Roses : 19,99€</p>
                    <a href="buyroses.php"><button class="Shopnow">SHOP NOW</button></a>
                </li>
                <li>
                    <img src="../../images/orchidee.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Orchidée : 24,99€</p>
                    <a href="buyorchidee.php"><button class="Shopnow">SHOP NOW</button></a>
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
include('../views/jsscriptnav.php')
?>

</html>