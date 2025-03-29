<?php
require_once '../todb/auth.php'; // Page nécessite une connexion
require_once '../todb/getcart.php'; // Fonctions pour récupérer les données du panier
// Récupérer les éléments du panier
$cart_items = getCartItems($conn);

// Liste des pays (comme dans ton formulaire)
$countries = [
    "+1" => "United States",
    "+33" => "France",
    "+44" => "United Kingdom",
    "+91" => "India",
    "+81" => "Japan"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    echo '<link href="../../styles/checkoutstyles.css" rel="stylesheet">';
    echo '<link href="../../styles/formpage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
</head>

<body>
    <!-- Inclure la barre de navigation -->
    <?php
    include('../views/navbar.php');
    ?>

    <div class="content">
        <div class="backgroundcontainer">
            <img src="../../images/image1.jpeg" id="image1">
            <div class="titlebox">
                <h1>Checkout</h1>
            </div>
            <div class="formbox">
                <form action="../todb/processcheckout.php" method="post" id="checkoutform" class="form">
                    <!-- Informations de livraison -->
                    <h2>Shipping Information</h2>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Country : </label>
                            <select name="shipping_country" required>
                                <option value="">Select a country</option>
                                <?php foreach ($countries as $code => $name) : ?>
                                    <option value="<?php echo htmlspecialchars($code); ?>">
                                        <?php echo htmlspecialchars($name) . " ($code)"; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="soloquest">
                            <label>Address : </label>
                            <input type="text" name="shipping_address" required>
                        </div>
                    </div>

                    <!-- Informations de paiement -->
                    <h2>Payment Information</h2>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Card Type : </label>
                            <select name="card_type" required>
                                <option value="">Select a card type</option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">MasterCard</option>
                                <option value="amex">American Express</option>
                            </select>
                        </div>
                        <div class="soloquest">
                            <label>Card Number : </label>
                            <input type="text" name="card_number" required>
                        </div>
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Expiration Date : </label>
                            <input type="text" name="expiration_date" required placeholder="MM/YY">
                        </div>
                        <div class="soloquest">
                            <label>CVV : </label>
                            <input type="text" name="cvv" required>
                        </div>
                    </div>

                    <!-- Résumé du panier -->
                    <h2>Order Summary</h2>
                    <div class="ordersummary">
                        <?php
                        if (empty($cart_items)) {
                            echo "<p>Your cart is empty.</p>";
                        } else {
                            echo "<ul class='listeitem'>";
                            $total = 0;
                            foreach ($cart_items as $item) {
                                echo "<li>" . htmlspecialchars($item['product_name']) . " - " . htmlspecialchars($item['unit_price']) . "€ x " . htmlspecialchars($item['quantity']) . "</li>";
                                $total += $item['total_price_per_product'];
                            }
                            echo "</ul>";
                            echo "<p class= 'total'>Total: " . number_format($total) . "€</p>";
                        }
                        ?>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="submitbox">
                        <button type="submit" name="submit">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclure le footer -->
    <?php
    include('../views/footer.php');
    ?>

</body>
<?php
include('../views/jsscriptnav.php');
?>

</html>

<?php
$conn->close();
?>