<?php
require_once '../todb/auth.php'; //page require to be connected
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
        <div class="cartfull">
            <div class="productanddesc">
                <div class="productimage">
                    <?php
                    require '../todb/getcart.php';

                    // <!-- <img src="tulipe.jpg" class="flowerimg"> -->
                    ?>
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