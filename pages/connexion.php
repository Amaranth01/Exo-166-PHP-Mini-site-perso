<?php

    require __DIR__ . '/../parts/header.php';
    require __DIR__ . '/../data/credentials.php';

    if (isset($_POST['Envoyer'])) {
        $username = $_POST['username'] ?? '';
        $passwd = $_POST['password'] ?? '';

        if ($username === $login && $password === $passwd) {
            $_SESSION['connected'] = true;
            $_SESSION['username'] = $username;
            header('Location: /../pages/moderation.php');
        } else {
            echo "Nom d'utilisateur ou mot de passe invalide";
        }
    }
?>

<h2>Espace de connexion pour les administrateurs</h2>
    <form action="connexion.php" method="post">
        <div>
            <label for="username">Votre nom ou pseudo</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="password">Entrez votre mot de pass</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <input type="submit" value="Envoyer" name="Envoyer" id="submit">
        </div>
    </form>

