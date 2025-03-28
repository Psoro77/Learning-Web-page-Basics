<?php
require_once 'database.php'; // Assumes this sets up $pdo
require_once('auth.php');

if (!isset($_SESSION['clients_id'])) {
    $_SESSION['error'] = "Données invalides";
    exit;
}




function getCartItems($conn)
{
    $client_id = $_SESSION['clients_id'];
    //creer une table virtuelle qui va representer le cart
    $stmt = $conn->prepare("SELECT * FROM cart_view WHERE user_id = ?");
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_items = []; //creer un array pour stocker chaqune des item
    while ($row = $result->fetch_assoc()) {
        // Ajouter chaque produit (chaque ligne) dans le tableau $cart_items
        $cart_items[] = $row;
    }
    $stmt->close();
    return $cart_items;
}


// fontion pour prendre l'image de la database automatiquement
function getImage($product_id, $conn)
{
    $product_id;
    $query = "
    SELECT 
        image
    FROM 
    products
    WHERE 
        id = ?;
        
";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $imagepath = $result->fetch_assoc();
    $stmt->close();

    if (!$imagepath) {
        return 'default-profile.jpg'; // Image par défaut

    }
    return $imagepath['image'];
}
