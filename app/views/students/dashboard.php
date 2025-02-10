<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php include '../app/views/templates/nav.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-4xl font-bold text-gray-900 mb-6">Mes sujets</h2>

    <?php if (!empty($suggestions)): ?>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($suggestions as $suggestion): ?>
                <li class="bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition-transform transform hover:scale-105 duration-200">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-3"><?= htmlspecialchars($suggestion['title']); ?></h3>
                    <p class="text-gray-700 text-lg"><?= htmlspecialchars($suggestion['description']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-gray-600 mt-4 text-xl">Aucune suggestion disponible pour le moment.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
