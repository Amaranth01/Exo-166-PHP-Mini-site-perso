<section>
    <h1>Contact</h1>
</section>

<form action="../public/save.php" method="post">
    <div>
        <label for="id-username">Username</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="id-email">Votre email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="id-message">Entrez votre message</label>
        <textarea name="message" id="message" cols="15" rows="5" required></textarea>
    </div>

    <div>
        <input type="submit" value="Envoyer" name="submit">
    </div>
</form>

<h2>Devenir admin</h2>

<p>Devenir un administrateur demande beaucoup de responsabilité. Afin que nous puissions avoir une preuve de votre existance,
merci de nous envoyer la photo copie, ou une photo recto de votre pièce d'identité. Nous vous fournirons vos accès par mail.</p>

<form action="/data/files.php" method="post" enctype="multipart/form-data">

    <label for="identity">Votre pièce jointe uniquement en JPG, JPEG ou PNG</label>
    <input type="file" name="identity" id="identity" >

    <input type="submit" value="Envoyer" name="Envoie">
</form>