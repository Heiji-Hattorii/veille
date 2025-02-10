<?php include '../app/views/templates/nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Présentations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 >
<div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Liste des Présentations</h1>
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Titre</th>
                    <th class="px-6 py-3 text-left">Étudiant</th>
                    <th class="px-6 py-3 text-left">Date de présentation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($presentations as $presentation): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-3 border-b border-gray-200"><?php echo $presentation['id']; ?></td>
                        <td class="px-6 py-3 border-b border-gray-200"><?php echo $presentation['title']; ?></td>
                        <td class="px-6 py-3 border-b border-gray-200"><?php echo $presentation['email']; ?></td>
                        <td class="px-6 py-3 border-b border-gray-200"><?php echo $presentation['presentation_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
