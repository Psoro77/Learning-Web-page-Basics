<?php
require_once '../todb/auth.php'; //page require to be connected
?>
<?php
require_once '../todb/getcart.php'; // Inclut les fonctions pour récupérer les données du panier
// Récupérer les éléments du panier
$cart_items = getCartItems($conn);
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php
    echo '<link href="../../styles/cartpage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
</head>

<body>
    <!-- first part with the nav bar -->
    <?php
    include('../views/navbar.php')
    ?>




    <div class="content">
        <?php
        include('../views/cartview.php');
        ?>
        <div class="similarproduct">
            <h2>See Similar products</h2>
            <ul class="produitspharecollumn">
                <?php
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li>';
                        echo '<img src="../../images/' . $row["image"] . '" class="imagefleursphare" alt="produit phare">';
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
<?php
$conn->close();
?>