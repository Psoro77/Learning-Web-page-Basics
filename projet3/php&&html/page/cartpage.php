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
                    <main>
                        <h1>Your Cart</h1>
                        <?php if (cart_product_count() == 0) : ?>
                            <p>There are no products in your cart.</p>
                        <?php else: ?>
                            <p>To remove an item from your cart, change its quantity to 0.</p>
                            <form action="." method="post">
                                <input type="hidden" name="action" value="update">
                                <table id="cart">
                                    <tr id="cart_header">
                                        <th class="left">Item</th>
                                        <th class="right">Price</th>
                                        <th class="right">Quantity</th>
                                        <th class="right">Total</th>
                                    </tr>
                                    <?php foreach ($cart as $product_id => $item) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                                            <td class="right">
                                                <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                                            </td>
                                            <td class="right">
                                                <input type="text" size="3" class="right"
                                                    name="items[<?php echo $product_id; ?>]"
                                                    value="<?php echo $item['quantity']; ?>">
                                            </td>
                                            <td class="right">
                                                <?php echo sprintf('$%.2f', $item['line_price']); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr id="cart_footer">
                                        <td colspan="3" class="right"><b>Subtotal</b></td>
                                        <td class="right">
                                            <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="right">
                                            <input type="submit" value="Update Cart">
                                        </td>
                                    </tr>
                                </table>
                            </form>

                        <?php endif; ?>
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