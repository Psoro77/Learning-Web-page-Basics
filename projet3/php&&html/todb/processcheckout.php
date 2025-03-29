<?php
require_once 'auth.php'; // Vérifie que l'utilisateur est connecté
require_once 'database.php'; // Connexion à la base de données
require_once 'getcart.php'; // Fonctions pour récupérer les données du panier
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données
    $shipping_address = $_POST['shipping_address'];
    $shipping_country = $_POST['shipping_country'];
    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];

    if (empty($shipping_address) || empty($shipping_country) || empty($card_type) || empty($card_number) || empty($expiration_date) || empty($cvv)) {
        $_SESSION['error'] = "Tous les champs sont requis.";
        header("Location: ../page/checkoutpage.php");
        exit();
    }

    // Logique pour valider et enregistrer la commande dans la base de données
    $cart_items = getCartItems($conn);
    if (empty($cart_items)) {
        $_SESSION['error'] = "Votre panier est vide.";
        header("Location: ../page/checkoutpage.php");
        exit();
    }

    // Calculer le total
    $total = 0;
    foreach ($cart_items as $item) {
        $total += $item['total_price_per_product'];
    }

    // Insérer la commande dans la base de données
    $client_id = $_SESSION['clients_id'];

    // Préparer et exécuter la requête pour la table 'orders'
    $stmt = $conn->prepare("INSERT INTO orders (client_id, shipping_address, shipping_country, card_type, card_number, expiration_date, cvv, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("issssssd", $client_id, $shipping_address, $shipping_country, $card_type, $card_number, $expiration_date, $cvv, $total);
        if ($stmt->execute()) {
            $order_id = $stmt->insert_id; // Récupérer l'ID de la commande insérée
            $stmt->close();

            // Insérer les articles de la commande dans 'order_items'
            foreach ($cart_items as $item) {
                $product_id = $item['product_id'];
                $quantity = $item['quantity'];
                $unit_price = $item['unit_price'];
                $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $unit_price);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    $_SESSION['error'] = "Erreur lors de la préparation de la requête pour les articles de la commande.";
                    header("Location: ../page/checkoutpage.php");
                    exit();
                }
            }
            $carts_id = $item['cart_id'];
            // Supprimer dans cart_to_article
            $stmt = $conn->prepare("DELETE FROM cart_to_articles WHERE carts_id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $carts_id);
                $stmt->execute();
                $stmt->close();
                // Supprimer dans cart
                $stmt = $conn->prepare("DELETE FROM carts WHERE client_id = ?");
                $stmt->bind_param("i", $client_id);
                $stmt->execute();
                $stmt->close();
            } else {
                $_SESSION['error'] = "Erreur lors de la préparation de la requête pour vider le panier.";
                header("Location: ../page/checkoutpage.php");
                exit();
            }

            // Rediriger vers la page de confirmation avec l'ID de la commande
            header("Location: ../page/Thanks.php");
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de l'exécution de la requête pour insérer la commande.";
            header("Location: ../page/checkoutpage.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Erreur lors de la préparation de la requête pour la commande.";
        header("Location: ../page/checkoutpage.php");
        exit();
    }
}
