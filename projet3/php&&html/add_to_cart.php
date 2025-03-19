<?php
session_start();
require_once 'database.php'; // Fichier contenant la connexion à la base de données (PDO)

header('Content-Type: application/json');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['client_id'])) {
    echo json_encode(['success' => false, 'message' => 'Veuillez vous connecter pour ajouter au panier']);
    exit;
}

$client_id = $_SESSION['client_id'];
$data = json_decode(file_get_contents('php://input'), true);

// Récupérer les données envoyées par JavaScript
$product_id = isset($data['productId']) ? (int)$data['productId'] : 0;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 1;

// Validation des données
if ($product_id <= 0 || $quantity <= 0) {
    echo json_encode(['success' => false, 'message' => 'Produit ou quantité invalide']);
    exit;
}

// Fonction hypothétique pour ajouter au panier (à adapter à votre base de données)
function addToCart($pdo, $client_id, $product_id, $quantity)
{
    $stmt = $pdo->prepare("INSERT INTO cart (client_id, product_id, quantity) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quantity = quantity + ?");
    $stmt->execute([$client_id, $product_id, $quantity, $quantity]);
}

try {
    addToCart($pdo, $client_id, $product_id, $quantity);
    echo json_encode(['success' => true, 'message' => 'Produit ajouté au panier']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
}
