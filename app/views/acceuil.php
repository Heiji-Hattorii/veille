<?php
require_once __DIR__ . '../../controllers/AuthController.php';
include '../app/views/templates/nav.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
e            width: 100%;
            margin:0;
            background-image: url('../app/views/images/3K_Jfdu3SnOhG34eOqthhQ.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }
    </style>
</head>
<body>
<?php if (!isset($_SESSION['user']) || !$_SESSION['user']): ?>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="text-center bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Bienvenue sur notre plateforme</h2>
            <p class="text-gray-600 mb-4">Veuillez vous connecter ou vous inscrire pour accéder au contenu complet.</p>
            <div class="space-x-4">
                <a href="/login" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">Se connecter</a>
                <a href="/register" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-200">S'inscrire</a>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="p-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Bienvenue, <?= htmlspecialchars($_SESSION['user']['email']); ?>!</h2>
        <p class="text-gray-600">Vous êtes connecté à votre compte. Profitez de notre plateforme.</p>
</div>       
<?php endif; ?>
</body>


<?php require_once __DIR__ . '/templates/footer.php'; ?>