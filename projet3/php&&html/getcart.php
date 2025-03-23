<?php
require_once 'database.php';
$client_id = $_SESSION['clients_id'];
// Connexion à la base de données (remplacez les valeurs par les vôtres)
$host = 'localhost';
$dbname = 'nom_de_votre_base';
$username = 'votre_utilisateur';
$password = 'votre_mot_de_passe';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur, renvoyer une réponse JSON avec l'erreur
    header('Content-Type: application/json');
    echo json_encode(['error' => "Erreur de connexion : " . $e->getMessage()]);
    exit;
}

// Récupérer l'ID du panier depuis les paramètres GET
$cart_id = isset($_GET['cart_id']) ? (int)$_GET['cart_id'] : 1;

// Requête SQL pour récupérer les données du panier
$query = "
    SELECT 
        c.cart_id, c.date, 
        cl.client_id, cl.name AS client_name, cl.address, cl.phone,
        p.product_id, p.name AS product_name, p.price, 
        ca.quantity
    FROM 
        cart c
        JOIN clients cl ON c.client_id = cl.client_id
        LEFT JOIN cart_to_article ca ON c.cart_id = ca.cart_id
        LEFT JOIN products p ON ca.product_id = p.product_id
    WHERE 
        c.cart_id = :cart_id
";

$stmt = $pdo->prepare($query);
$stmt->execute(['cart_id' => $cart_id]);

// Récupérer les résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si le panier existe
if (empty($results)) {
    header('Content-Type: application/json');
    echo json_encode(['error' => "Aucun panier trouvé avec l'ID $cart_id."]);
    exit;
}

// Structurer les données
$cart_info = [
    'cart_id' => $results[0]['cart_id'],
    'date' => $results[0]['date'],
    'status' => $results[0]['status'],
    'client' => [
        'client_id' => $results[0]['client_id'],
        'name' => $results[0]['client_name'],
        'address' => $results[0]['address'],
        'phone' => $results[0]['phone']
    ],
    'products' => []
];

// Regrouper les produits
foreach ($results as $row) {
    if ($row['product_id']) { // Si un produit existe
        $cart_info['products'][] = [
            'name' => $row['product_name'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'total' => $row['price'] * $row['quantity']
        ];
    }
}

// Renvoyer les données en JSON
header('Content-Type: application/json');
echo json_encode($cart_info);
exit;
