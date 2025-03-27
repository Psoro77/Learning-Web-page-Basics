<?php
session_start();
require_once 'database.php';

header('Content-Type: application/json');

if (!isset($_SESSION['client_id'])) {
    echo json_encode(['success' => false, 'message' => 'Veuillez vous connecter pour ajouter au panier']);
    exit;
}

$client_id = $_SESSION['client_id'];
$data = json_decode(file_get_contents('php://input'), true);

$product_id = isset($data['productId']) ? (int)$data['productId'] : 0;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 0;

// Validate inputs
if ($product_id <= 0 || $quantity <= 0) {
    echo json_encode(['success' => false, 'message' => 'Produit ou quantité invalide']);
    exit;
}

try {
    // Check if product exists
    $stmt = $pdo->prepare("SELECT id FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    if ($stmt->rowCount() == 0) {
        echo json_encode(['success' => false, 'message' => 'Produit introuvable']);
        exit;
    }

    // Check for active cart
    $stmt = $pdo->prepare("SELECT id FROM cart WHERE client_id = ? AND statut = 'active'");
    $stmt->execute([$client_id]);
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cart) {
        // Create new cart
        $stmt = $pdo->prepare("INSERT INTO cart (client_id, date_creation, statut) VALUES (?, NOW(), 'active')");
        $stmt->execute([$client_id]);
        $cart_id = $pdo->lastInsertId();
    } else {
        $cart_id = $cart['id'];
    }

    // Check if product is already in cart_to_article
    $stmt = $pdo->prepare("SELECT quantity FROM cart_to_article WHERE carts_id = ? AND products_id = ?");
    $stmt->execute([$cart_id, $product_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        // Update quantity
        $new_quantity = $existing['quantity'] + $quantity;
        $stmt = $pdo->prepare("UPDATE cart_to_article SET quantity = ? WHERE carts_id = ? AND products_id = ?");
        $stmt->execute([$new_quantity, $cart_id, $product_id]);
    } else {
        // Insert new entry
        $stmt = $pdo->prepare("INSERT INTO cart_to_article (carts_id, products_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$cart_id, $product_id, $quantity]);
    }

    echo json_encode(['success' => true, 'message' => 'Produit ajouté au panier']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
}
