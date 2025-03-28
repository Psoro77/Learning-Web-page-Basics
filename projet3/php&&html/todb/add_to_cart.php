<?php
require_once('auth.php');
require_once('database.php');
if (!isset($_SESSION['clients_id'])) {
    header('Location: ../page/loginpage.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    // Vérifier que les données sont valides
    if ($product_id === false || $quantity === false || $quantity < 1) {
        $_SESSION['error'] = "Données invalides";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Récupérer les informations du produit
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    if (!$product) {
        $_SESSION['error'] = "Produit non trouvé";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Vérifier si l'utilisateur a déjà un panier
    $client_id = $_SESSION['clients_id'];
    $stmt = $conn->prepare("SELECT id FROM carts WHERE client_id = ?");
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart = $result->fetch_assoc();
    $cart_id = $cart ? $cart['id'] : null;
    $stmt->close();

    // Si pas de panier, en créer un
    if (!$cart_id) {
        $stmt = $conn->prepare("INSERT INTO carts (client_id, date_creation ) VALUES (?, NOW())");
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
        $cart_id = $conn->insert_id;
        $stmt->close();
    }

    // Vérifier si l'article existe déjà dans le panier
    $stmt = $conn->prepare("SELECT * FROM cart_to_articles WHERE carts_id = ? AND products_id = ?");
    $stmt->bind_param("ii", $cart_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_item = $result->fetch_assoc();
    $stmt->close();

    if ($cart_item) {
        // Mettre à jour la quantité
        $new_quantity = $cart_item['quantity'] + $quantity;
        $stmt = $conn->prepare("UPDATE cart_to_articles SET quantity = ? WHERE id = ?");
        $stmt->bind_param("ii", $new_quantity, $cart_item['id']);
        $stmt->execute();
        $stmt->close();
    } else {
        // Ajouter un nouvel article
        $stmt = $conn->prepare("INSERT INTO cart_to_articles (carts_id, products_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $cart_id, $product_id, $quantity);
        $stmt->execute();
        $stmt->close();
    }

    $_SESSION['success'] = "Produit ajouté au panier avec succès";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
