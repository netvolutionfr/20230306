<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "Bonjour " . $_SESSION['user']['login'];
} else {
    echo "Vous n'êtes pas connecté<br>";
    echo "<a href='login.php'>Se connecter</a>";
}
