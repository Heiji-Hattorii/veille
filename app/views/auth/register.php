<!-- app/views/auth/register.php -->
<form method="POST" action="/register">
    <div>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="role">Rôle</label>
        <select name="role" id="role" required>
            <option value="etudiant">Étudiant</option>
            <option value="enseignant">Enseignant</option>
        </select>
    </div>
    <button type="submit">S'inscrire</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
