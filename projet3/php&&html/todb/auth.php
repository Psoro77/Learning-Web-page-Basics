<?php
require_once 'database.php';
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['clients_id'])) {
    header("Location: loginpage.php");
    exit();
}

$client_id = $_SESSION['clients_id'];
$sql = "SELECT * FROM clients WHERE Client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
