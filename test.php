<?php
// Connexion PDO à la base de données
const DB_USER = "20230306";
const DB_NAME = "20230306";
const DB_SERVER = "localhost";
const DB_PASSWORD = "123456";

try {
    $db = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données";
    die();
}

$login = $_POST['login'];
$password = $_POST['password'];

// On récupère l'utilisateur correspondant au login
$query = $db->prepare("SELECT * FROM users WHERE login = :login");
$query->execute(['login' => $login]);
$user = $query->fetch();
if ($user) {
    // On vérifie le mot de passe
    if (password_verify($password, $user['password'])) {
        // On démarre la session
        session_start();
        // On stocke l'utilisateur en session
        $_SESSION['user'] = $user;
        // On redirige vers la page d'accueil
        header('Location: index.php');
    } else {
        echo "Mot de passe incorrect";
    }
} else {
    echo "Utilisateur inconnu";
    header('Location: login.php');
}
