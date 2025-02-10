<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php require_once __DIR__ . '/../../controllers/SubjectController.php'; ?>
<?php include '../app/views/templates/nav.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Ajouter un sujet</h2>
    <form method="POST" action="/admin/subject/add" class="space-y-4">
        <div>
            <label for="title" class="block font-medium">Titre :</label>
            <input type="text" name="title" required class="w-full border border-gray-300 p-2 rounded-md focus:ring focus:ring-blue-200">
        </div>
        <div>
            <label for="description" class="block font-medium">Description :</label>
            <textarea name="description" required class="w-full border border-gray-300 p-2 rounded-md focus:ring focus:ring-blue-200"></textarea>
        </div>
        <button type="submit" name="add" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Ajouter</button>
    </form>
</div>

<div class="max-w-4xl mx-auto mt-6 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Liste des sujets</h2>
    <?php if (!empty($subjects)): ?>
        <ul class="space-y-4">
            <?php foreach ($subjects as $subject): ?>
                <li class="p-4 bg-gray-100 rounded-md flex justify-between items-center">
                    <span><?= htmlspecialchars($subject['title']); ?> - <?= htmlspecialchars($subject['description']); ?> 
                    (Statut : <?= htmlspecialchars($subject['status']); ?>)</span>
                    <div class="space-x-2">
                        <button onclick="openEditModal(<?= $subject['id']; ?>, '<?= htmlspecialchars($subject['title']); ?>', '<?= htmlspecialchars($subject['description']); ?>')" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Modifier</button>
                        <button onclick="openDeleteModal(<?= $subject['id']; ?>)" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Supprimer</button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-gray-500">Aucun sujet trouvé.</p>
    <?php endif; ?>
</div>

<!-- Modal Modification -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-xl font-semibold mb-4">Modifier le sujet</h3>
        <form method="POST" action="/admin/subject/update" class="space-y-4">
            <input type="hidden" name="subject_id" id="editId">
            <label for="editTitle" class="block font-medium">Titre :</label>
            <input type="text" name="title" id="editTitle" required class="w-full border border-gray-300 p-2 rounded-md">
            <label for="editDescription" class="block font-medium">Description :</label>
            <textarea name="description" id="editDescription" required class="w-full border border-gray-300 p-2 rounded-md"></textarea>
            <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Modifier</button>
        </form>
    </div>
</div>

<!-- Modal Suppression -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <p class="text-lg font-semibold mb-4">Voulez-vous vraiment supprimer ce sujet ?</p>
        <form method="POST" action="/admin/subject/delete" class="space-y-4">
            <input type="hidden" name="subject_id" id="deleteId">
            <div class="flex justify-end space-x-2">
                <button type="submit" name="delete" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Oui</button>
                <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 px-4 py-2 rounded-md hover:bg-gray-400">Non</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, title, description) {
        document.getElementById('editId').value = id;
        document.getElementById('editTitle').value = title;
        document.getElementById('editDescription').value = description;
        document.getElementById('editModal').classList.remove('hidden');
    }
    function openDeleteModal(id) {
        document.getElementById('deleteId').value = id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
