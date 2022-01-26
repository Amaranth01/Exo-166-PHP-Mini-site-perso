<section>
    <h1>Contact</h1>
</section>

<form action="/public/save.php" method="post">
    <div>
        <label for="id-username">Username</label>
        <input type="text" name="username" id="id-username">
    </div>
    <div>
        <label for="id-email">Votre email</label>
        <input type="email" name="email" id="id-email">
    </div>

    <div>
        <label for="id-message">Entrez votre message</label>
        <textarea name="message" id="id-message" cols="30" rows="10"></textarea>
    </div>

    <div>
        <input type="submit" value="Envoyer" name="submit">
    </div>
</form>