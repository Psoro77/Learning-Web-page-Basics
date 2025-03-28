<div class="cartfull">
    <h2>Your Cart</h2>
    <?php if (empty($cart_items)): ?>
        <p>Your Cart is empty</p>
    <?php else: ?>
        <?php foreach ($cart_items as $item): ?>
            <div class="productanddesc">
                <div class="productimage">
                    <img class="flowerimg" src="../../images/<?php echo (getImage($item['product_id'], $conn)); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>">
                </div>
                <div class="info">
                    <h2><?php echo htmlspecialchars($item['product_name']); ?></h2>
                    <div class="rating">
                        <span>4.5/5</span> <i class="fas fa-star"></i> (120 reviews)
                    </div>
                    <p>unit price : <?php echo number_format($item['unit_price'], 2); ?> €</p>
                    <p>Total : <?php echo number_format($item['total_price_per_product'], 2); ?> €</p>
                    <div class="quantity-selector">
                        <label for="quantity_<?php echo $item['product_id']; ?>">Quantity :</label>
                        <input type="number" id="quantity_<?php echo $item['product_id']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="quantity-input">
                    </div>
                    <button class="share"><i class="fas fa-share"></i> Share</button>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="confirmation">
            <p>Total of cart : <?php echo number_format(array_sum(array_column($cart_items, 'total_price_per_product')), 2); ?> €</p>
            <button class="confirmbtn">Go to checkout</button>
            <button class="modifycartbtn">Modify the cart</button>
        </div>
    <?php endif; ?>
</div>