<!-- app/views/auth/login.php -->
<form method="POST" action="/login">
    <div>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Se connecter</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
