<?php
session_start();
require_once 'database.php'; // Assumes this sets up $pdo

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['client_id'])) {
    echo json_encode(['error' => 'Veuillez vous connecter pour voir votre panier']);
    exit;
}

$client_id = $_SESSION['client_id'];

try {
    // Get active cart
    $stmt = $pdo->prepare("SELECT id FROM cart WHERE client_id = ? AND statut = 'active'");
    $stmt->execute([$client_id]);
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cart) {
        echo json_encode(['error' => 'Aucun panier actif trouvé']);
        exit;
    }

    $cart_id = $cart['id'];

    // Get cart details
    $query = "
        SELECT 
            c.id AS cart_id, c.date_creation AS date, c.statut,
            cl.id AS client_id, cl.name AS client_name, cl.address, cl.phone,
            p.id AS product_id, p.name AS product_name, p.price,
            ca.quantity
        FROM 
            cart c
            JOIN clients cl ON c.client_id = cl.id
            LEFT JOIN cart_to_article ca ON c.id = ca.carts_id
            LEFT JOIN products p ON ca.products_id = p.id
        WHERE 
            c.id = ?
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$cart_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($results)) {
        echo json_encode(['error' => 'Panier vide ou introuvable']);
        exit;
    }

    // Structure the response
    $cart_info = [
        'cart_id' => $results[0]['cart_id'],
        'date' => $results[0]['date'],
        'statut' => $results[0]['statut'],
        'client' => [
            'client_id' => $results[0]['client_id'],
            'name' => $results[0]['client_name'],
            'address' => $results[0]['address'],
            'phone' => $results[0]['phone']
        ],
        'products' => []
    ];

    foreach ($results as $row) {
        if ($row['product_id']) {
            $cart_info['products'][] = [
                'product_id' => $row['product_id'],
                'name' => $row['product_name'],
                'price' => $row['price'],
                'quantity' => $row['quantity'],
                'total' => $row['price'] * $row['quantity']
            ];
        }
    }

    echo json_encode($cart_info);
} catch (Exception $e) {
    echo json_encode(['error' => 'Erreur serveur : ' . $e->getMessage()]);
}
