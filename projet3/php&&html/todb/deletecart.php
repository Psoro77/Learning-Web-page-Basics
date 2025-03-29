<?php
session_start();
require_once 'database.php'; // Connexion MySQLi via $conn

if (!isset($_SESSION['clients_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['clients_id'];

// Récupérer le carts_id associé à cet utilisateur
$stmt = $conn->prepare("SELECT id FROM carts WHERE client_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cart = $result->fetch_assoc();
$carts_id = $cart ? $cart['id'] : null;
$stmt->close();

if ($carts_id) {
    // Supprimer dans cart_to_article
    $stmt = $conn->prepare("DELETE FROM cart_to_articles WHERE carts_id = ?");
    $stmt->bind_param("i", $carts_id);
    $stmt->execute();
    $stmt->close();
    // Supprimer dans cart
    $stmt = $conn->prepare("DELETE FROM carts WHERE client_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
}

header('Location: ../page/cartpage.php');
exit;
