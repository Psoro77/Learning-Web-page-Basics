<?php
require_once '../todb/auth.php';

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php
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
                </div>
            </div>
        </div>
        <div class="similarproduct">
            <h3>Your cart</h3>
            <p>Nombre d'articles : 3</p>
            <button onclick="window.location.href='cartpage.php'">Voir le panier</button>
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