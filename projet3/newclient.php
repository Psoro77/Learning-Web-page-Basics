<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['Address']);
    $country = htmlspecialchars($_POST['countryext']);
    $phone = htmlspecialchars($_POST['phonenumber']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash du mot de passe

    // Connexion à la base de données (remplacez avec vos infos)
    $host = "localhost";
    $dbname = "fastwash";
    $username = "root";
    $password_db = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO clients (name, address, country, phone, email, password) 
                VALUES (:name, :address, :country, :phone, :email, :password)";
        $stmt = $pdo->prepare($sql);

        // Exécution de la requête avec les valeurs
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            ':country' => $country,
            ':phone' => $phone,
            ':email' => $email,
            ':password' => $password
        ]);

        echo "Inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Accès interdit.";
}
