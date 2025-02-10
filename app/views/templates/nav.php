
<script src="https://cdn.tailwindcss.com"></script>
<nav class="bg-blue-600 text-white p-4 shadow-lg">
    <ul class="flex space-x-4 justify-center">
        <li><a href="/acceuil" class="hover:text-gray-300 transition">Accueil</a></li>
        
        <?php if (!isset($_SESSION['user']) || !$_SESSION['user']):?>
            <li><a href="/login" class="hover:text-gray-300 transition">Se connecter</a></li>
            <li><a href="/register" class="hover:text-gray-300 transition">S'inscrire</a></li>
        <?php else: ?>
            <li><a href="/logout" class="hover:text-gray-300 transition">Se déconnecter</a></li>
            
            <?php if ($_SESSION['role'] === 'Etudiant'): ?>
                <li><a href="/student/dashboard" class="hover:text-gray-300 transition">Tableau de bord</a></li>
                <li><a href="/student/suggest" class="hover:text-gray-300 transition">Suggérer un sujet</a></li>
                <li><a href="/admin/presentations" class="hover:text-gray-300 transition">Voir les présentations</a></li>

                
            <?php elseif ($_SESSION['role'] === 'Enseignant'): ?>
                <li><a href="/admin/users" class="hover:text-gray-300 transition">Gestion des utilisateurs</a></li>
                <li><a href="/admin/subjects" class="hover:text-gray-300 transition">Gestion des sujets</a></li>
                <li><a href="/admin/presentations" class="hover:text-gray-300 transition">Gestion des présentations</a></li>
                <li><a href="/admin/presentation/create" class="hover:text-gray-300 transition">Créer une présentation</a></li>
                <li><a href="/subjects/list" class="hover:text-gray-300 transition">Mes sujets</a></li>

            <?php endif; ?>
        <?php endif; ?>
    </ul>
</nav>
