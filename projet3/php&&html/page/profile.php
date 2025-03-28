<?php
require_once '../todb/auth.php';
require_once '../todb/getcart.php'; // Inclut les fonctions pour récupérer les données du panier
// Récupérer les éléments du panier
$cart_items = getCartItems($conn);
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php
    echo ' <link href="../../styles/cartprofile.css" rel="stylesheet">';
    echo ' <link href="../../styles/cartpage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
</head>

<body>
    <nav class="barre">
        <div class="logo">
            <a href="index.php">
                <img id="logopart1" alt="logo du site" src="../../images/logo-site.jpeg"><img id="logopart2" alt="logo du site" src="../../images/logo-titre.png">
            </a>
        </div>
    </nav>




    <div class="content">
        <div class="cartfull">
            <div class="productanddesc">
                <div class="productimage">
                    <img src="../../images/default-profile.jpg" alt="Profile Image" class="flowerimg">
                </div>
                <div class="info">
                    <h3>Informations</h3>
                    <label><strong>Nom : </strong>
                        <?php echo htmlspecialchars($user['name']); ?></label>
                    <label><strong>Email :</strong>
                        <?php echo htmlspecialchars($user['email']); ?></label>
                    <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($user['phonenumber']); ?></p>
                    <p><strong>Adresse :</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                    <a href="../todb/loginprocess.php?logout=true" class="logoutbtn">
                        <p>Log out</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="similarproduct">
            <h3>Your cart</h3>
            <?php
            include('../views/cartviewprofile.php')
            ?>
            <a href='cartpage.php'><button class="seecart">See the cart</button></a>
        </div>
    </div>



    <?php
    include('../views/footer.php');

    ?>
</body>

</html>
<?php
$conn->close();
?>