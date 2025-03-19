<?php
// Démarrer la session
session_start();

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "botanic_space";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Éviter les injections SQL avec une requête préparée
    $stmt = $conn->prepare("SELECT Client_id, email, password FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Récupérer les données de l'utilisateur
        $clients = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $clients['password'])) {
            // Connexion réussie : stocker les infos dans la session
            $_SESSION['clients_id'] = $clients['Client_id'];
            $_SESSION['email'] = $clients['email'];

            // Gestion du "Remember me"
            if (isset($_POST['remember'])) {
                // Créer un token sécurisé
                $token = bin2hex(random_bytes(16));
                setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), "/", "", true, true); // Cookie valide 30 jours, sécurisé
                // Stocker le token dans la base de données (ajouter une colonne 'remember_token' à la table clientss)
                $update_stmt = $conn->prepare("UPDATE clients SET remember_token = ? WHERE Client_id = ?");
                $update_stmt->bind_param("si", $token, $clients['Client_id']);
                $update_stmt->execute();
                $update_stmt->close();
            }

            // Rediriger vers une page sécurisée
            // a modifier : header("Location: dashboard.php");
            echo "connexion reussie";
            exit();
        } else {
            // Mot de passe incorrect
            $error = "Mot de passe incorrect.";
        }
    } else {
        // Email non trouvé
        $error = "Aucun compte associé à cet email.";
    }

    $stmt->close();
}

// Si erreur, retourner à la page de login avec le message
if (isset($error)) {
    $_SESSION['error'] = $error;
    header("Location: loginpage.php");
    exit();
}

$conn->close();
