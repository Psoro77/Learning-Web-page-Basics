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
    <!-- first part with the nav bar -->

    <?php
    include('../views/succesmessage.php');
    include('../views/navbar.php');
    ?>
    <div class="content">
        <div class="buyproductbox">


            <div class="productandbuy">
                <div class="productimage">
                    <img src="../../images/roseenpot.jpg" class="flowerimg">
                </div>
                <div class="buybox">
                    <div class="buybox">
                        <h2>Product Options</h2>
                        <div class="rating">
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
                                <input type="hidden" name="product_id" value="2">
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
                <li> <img src="../../images/tulipe.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Tulipe : 12,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
                <li><img src="../../images/orchidee.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Orchidée : 24,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
                <li><img src="../../images/pivoine.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Pivoine : 17,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
                <li><img src="../../images/dahlia.jpg" class="imagefleursphare" alt="produit phare">
                    <p>Dahlia : 15,99€</p>
                    <button class="Shopnow">SHOP NOW</button>
                </li>
            </ul>

        </div>
    </div>


    <?php
    include('../views/footer.php');

    ?>

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