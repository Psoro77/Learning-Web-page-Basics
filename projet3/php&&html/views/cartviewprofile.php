<div class="crtfll">
    <h2>Your Cart</h2>
    <?php if (empty($cart_items)): ?>
        <p>Your Cart is empty</p>
    <?php else: ?>
        <?php foreach ($cart_items as $item): ?>
            <div class="productanddesc">
                <div class="prdctimg">
                    <img class="flowerimg" src="../../images/<?php echo (getImage($item['product_id'], $conn)); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>">
                </div>
                <div class="info">
                    <h2><?php echo htmlspecialchars($item['product_name']); ?></h2>
                    <p>Total : <?php echo number_format($item['total_price_per_product'], 2); ?> €</p>
                    <div class="qt-selector">
                        <label for="quantity_<?php echo $item['product_id']; ?>">Quantity :</label>
                        <p id="quantity_<?php echo $item['product_id']; ?>" name="quantity"> <?php echo $item['quantity']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="cfn">
            <p>Total of cart : <?php echo number_format(array_sum(array_column($cart_items, 'total_price_per_product')), 2); ?> €</p>
            <a href="checkoutpage.php" class="confirmbtn">Go to checkout</a>
        </div>
    <?php endif; ?>
</div>