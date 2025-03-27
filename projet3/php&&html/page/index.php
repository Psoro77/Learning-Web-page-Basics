<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../views/head.php');
    ?>
</head>

<body>
    <!-- premiere partie pour la barre prinicpale-->
    <?php
    include('../views/navbar.php')
    ?>
    <!--partie pour l'image avec les soldes-->
    <div class="sectionimage1">
        <img src="../../images/image1.jpeg" alt="soldes" id="image1">
        <div class="soldes">
            <img src="../../images/soldes.png" id="soldesimg"><button id="shopnow">Shop Now</button>
        </div>
    </div>
    <!--partie avec les produits phares-->
    <div class="produitspharecontainer">
        <h2>NOS PRODUITS PHARES</h2>
        <ul class="produitsphare">
            <li> <img src="../../images/roseenpot.jpg" class="imagefleursphare" alt="produit phare">
                <p>Roses : 19,99€</p>
                <button class="Shopnow"><a href="buyroses.php">SHOP NOW</a></button>
            </li>
            <li> <img src="../../images/tulipe.jpg" class="imagefleursphare" alt="produit phare">
                <p>Tulipe : 12,99€</p>
                <button class="Shopnow"><a href="buytulipes.php">SHOP NOW</a></button>
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
    <div class="produitspharecontainer containerplus"> <!--nos categories de plantes-->
        <h2>Shop by categories</h2>
        <ul class="produitsphare deux">
            <li>
                <h3>FRUIT PLANT</h3><img src="../../images/plante a fruit.jpg" class="imagefleursphare "
                    alt="produit phare">
                <button class="Shopnow">SHOP NOW</button>
            </li>
            <li>
                <h3>SHRUB</H3> <img src="../../images/arbustre.jpg" class="imagefleursphare imgspecial" alt="produit phare"
                    style="height: 170px;">
                <button class="Shopnow">SHOP NOW</button>
            </li>
            <li>
                <H3>GARDEN PLANTS</H3><img src="../../images/irisjardin.jpg" class="imagefleursphare imgspecial"
                    alt="produit phare" style="height: 170px;">
                <button class="Shopnow">SHOP NOW</button>
            </li>
            <li>
                <H3>INDOOR PLANTS</H3><img src="../../images/planteinterieur.jpg" class="imagefleursphare "
                    alt="produit phare">
                <button class="Shopnow">SHOP NOW</button>
            </li>
        </ul>
        <div class="categoriecontainer">
            <h3 style="cursor: pointer;">SEE MORE : </h3>
            <div class="categoriestext">
                <p>Aromatic Plants</p>
                <p>Ornamental Plants</p>
                <p>Edible Plants</p>
                <p>Rare and Exotic Plant</p>
                <p>Climbing Plants</p>
                <p>Aquatic Plants</p>
                <p>Succulents and Cacti</p>
                <p>Trees and Shrubs </p>
                <p>Plant Care and Maintenance</p>
                <p>Gardening Tools and Accessories</p>
                <p>Trees and Shrubs </p>
                <p>carnivorous plant</p>
            </div>
            <button class="categoriesbutton">
                <h4>CATEGORIES</h4>
            </button>
        </div>
    </div>
    <?php
    include('../views/footer.php');

    ?>

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
</body>

</html>