<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['Address']);
    $country = htmlspecialchars($_POST['country']);
    $email = htmlspecialchars($_POST['email']);
    $hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash du mot de passe
    $phonenumber = preg_replace('/\s+/', '', $_POST['phonenumber']); // Supprime les espaces
    $phonenumber = htmlspecialchars($phonenumber); // Sécurise les entrées


    // Connexion à la base de données (remplacez avec vos infos)
    $host = "localhost";
    $dbname = "botanic_space";
    $username = "root";
    $password_db = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour insérer les données
        $sql = "INSERT INTO clients (name, address, country, phonenumber, email, password) 
                VALUES (:name, :address, :country, :phonenumber, :email, :password)";
        $stmt = $pdo->prepare($sql);

        // Exécution de la requête avec les valeurs
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            ':country' => $country,
            ':phonenumber' => $phonenumber,
            ':email' => $email,
            ':password' => $hashedpassword
        ]);

        echo "Inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Accès interdit.";
}
