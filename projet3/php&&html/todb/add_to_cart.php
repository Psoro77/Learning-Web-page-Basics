<?php
session_start();
require_once 'database.php'; // Assurez-vous que ce fichier contient la connexion PDO

header('Content-Type: application/json');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['client_id'])) {
    echo json_encode(['success' => false, 'message' => 'Veuillez vous connecter pour ajouter au panier']);
    exit;
}

$client_id = $_SESSION['client_id'];
$data = json_decode(file_get_contents('php://input'), true);

// Récupérer les données envoyées
$product_id = isset($data['productId']) ? (int)$data['productId'] : 0;
$quantity = isset($data['quantity']) ? (int)$data['quantity'] : 1;

// Vérification des valeurs reçues
if ($product_id <= 0 || $quantity <= 0) {
    echo json_encode(['success' => false, 'message' => 'Produit ou quantité invalide']);
    exit;
}

try {
    // Vérifier si le produit existe
    $stmt = $pdo->prepare("SELECT id FROM products WHERE id = ?");
    $stmt->execute([$product_id]);

    if ($stmt->rowCount() == 0) {
        echo json_encode(['success' => false, 'message' => 'Produit introuvable']);
        exit;
    }

    // Ajouter ou mettre à jour le panier
    $stmt = $pdo->prepare("
        INSERT INTO cart (client_id, product_id, quantity) 
        VALUES (?, ?, ?) 
        ON DUPLICATE KEY UPDATE quantity = quantity + ?
    ");
    $stmt->execute([$client_id, $product_id, $quantity, $quantity]);

    echo json_encode(['success' => true, 'message' => 'Produit ajouté au panier']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
}
