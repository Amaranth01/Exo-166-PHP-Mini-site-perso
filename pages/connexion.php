<?php
    session_start();

    require __DIR__ . '/../data/credentials.php';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'] ?? '';
        $passwd = $_POST['password'] ?? '';
        if ($username === $login && $passwd === $passord) {
            $_SESSION['connected'] = true;
            $_SESSION['username'] = $username;
            echo "Connexion validée";
            header('Location: /admin.php');
        }
        else {
            echo "Nom d'utilisateur ou mot de passe invalide";
        }
    }
?>

<div id="content">

    <form action="admin.php" method="post">
        <div>
            <label for="username">Votre nom ou pseudo</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="password">Entrez votre message</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>

</div>