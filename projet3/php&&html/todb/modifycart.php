<?php
session_start();
require_once 'database.php'; // Connexion MySQLi via $conn

if (!isset($_SESSION['clients_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['clients_id'];

// Récupérer le carts_id associé à cet utilisateur (assumant une table carts)
$stmt = $conn->prepare("SELECT id FROM carts WHERE client_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cart = $result->fetch_assoc();
$carts_id = $cart ? $cart['id'] : null;
$stmt->close();

if (!$carts_id) {
    // Si aucun panier n'existe, rediriger ou gérer l'erreur
    header('Location: ../page/cartpage.php');
    exit;
}

if (isset($_POST['remove'])) {
    // Supprimer un articles spécifique
    $product_id = $_POST['remove'];
    // Supprimer dans cart_to_articles
    $stmt = $conn->prepare("DELETE FROM cart_to_articles WHERE carts_id = ? AND products_id = ?");
    $stmt->bind_param("ii", $carts_id, $product_id);
    $stmt->execute();
    $stmt->close();
    //verifier si l'objet es cart est vide si c'est le cas le suprimmer
    $stmt = $conn->prepare("SELECT 1 FROM cart_to_articles WHERE carts_id = ? LIMIT 1");
    $stmt->bind_param("i", $carts_id);
    $stmt->execute();
    $stmt->store_result();

    // S'il n'existe plus, supprimer la ligne correspondante dans carts
    if ($stmt->num_rows == 0) {
        $stmt->close();
        $stmt = $conn->prepare("DELETE FROM carts WHERE id = ?");
        $stmt->bind_param("i", $carts_id);
        $stmt->execute();
    }
    $stmt->close();
} elseif (isset($_POST['update'])) {
    // Mettre à jour les quantités
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        $quantity = (int)$quantity; // Assurer que la quantité est un entier
        if ($quantity == 0) {
            // Supprimer dans cart_to_articles
            $stmt = $conn->prepare("DELETE FROM cart_to_articles WHERE carts_id = ? AND products_id = ?");
            $stmt->bind_param("ii", $carts_id, $product_id);
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("SELECT 1 FROM cart_to_articles WHERE carts_id = ? LIMIT 1");
            $stmt->bind_param("i", $carts_id);
            $stmt->execute();
            $stmt->store_result();

            // S'il n'existe plus, supprimer la ligne correspondante dans carts
            if ($stmt->num_rows == 0) {
                $stmt->close();
                $stmt = $conn->prepare("DELETE FROM carts WHERE id = ?");
                $stmt->bind_param("i", $carts_id);
                $stmt->execute();
            }
            $stmt->close();
        } else {

            // Mettre à jour la quantité dans cart_to_articles
            $stmt = $conn->prepare("UPDATE cart_to_articles SET quantity = ? WHERE carts_id = ? AND products_id = ?");
            $stmt->bind_param("iii", $quantity, $carts_id, $product_id);
            $stmt->execute();
            $stmt->close();
        }
    }
}
$_SESSION['success'] = "modification taken";
header('Location: ../page/cartpage.php');
exit;
