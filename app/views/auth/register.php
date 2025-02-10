<script src="https://cdn.tailwindcss.com"></script>
<form method="POST" action="/register" class="max-w-md mx-auto p-8 bg-white shadow-lg rounded-lg space-y-6">
    <h2 class="text-3xl font-semibold text-center text-gray-800">S'inscrire</h2>
    
    <div class="space-y-4">
        <div>
            <label for="username" class="block text-lg font-medium text-gray-700">Email</label>
            <input type="text" id="username" name="username" required class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Votre nom d'utilisateur">
        </div>
        <div>
            <label for="password" class="block text-lg font-medium text-gray-700">Mot de passe</label>
            <input type="password" id="password" name="password" required class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Votre mot de passe">
        </div>

        <div>
            <label for="role" class="block text-lg font-medium text-gray-700">Rôle</label>
            <select name="role" id="role" required class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="etudiant">Étudiant</option>
                <option value="enseignant">Enseignant</option>
            </select>
        </div>
    </div>

    <button type="submit" class="w-full py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-200">S'inscrire</button>

    <?php if (isset($error)): ?>
        <p class="text-center text-red-500 mt-4"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
</form>
