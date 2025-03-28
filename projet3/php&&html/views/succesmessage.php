<?php
if (isset($_SESSION['success'])) {
    echo '<div class="success-message">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']); // Supprimer le message après l'affichage
}
if (isset($_SESSION['error'])) {
    echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // Supprimer le message d'erreur après l'affichage
}
