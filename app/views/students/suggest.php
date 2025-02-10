<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php require_once __DIR__ . '/../../controllers/StudentController.php'; ?>
<?php include '../app/views/templates/nav.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<h2 class="text-3xl font-semibold text-gray-800 mb-6">Suggérer un sujet</h2>
<form method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    <div>
        <label for="title" class="block text-lg font-medium text-gray-700">Titre:</label>
        <input type="text" name="title" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
    </div>

    <div>
        <label for="description" class="block text-lg font-medium text-gray-700">Description:</label>
        <textarea name="description" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required></textarea>
    </div>

    <button type="submit" name="add" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 transition duration-200">Soumettre</button>
</form>

<h2 class="text-3xl font-semibold text-gray-800 my-6">Tableau de bord de l'étudiant</h2>

<?php if (!empty($suggestions)): ?>
    <ul class="space-y-4">
        <?php foreach ($suggestions as $suggestion): ?>
            <li class="bg-white p-4 rounded-lg shadow-md hover:bg-gray-50 transition duration-200 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-lg text-blue-600"><?= htmlspecialchars($suggestion['title']); ?></p>
                    <p class="text-gray-700"><?= htmlspecialchars($suggestion['description']); ?></p>
                </div>
                <div class="space-x-2">
                    <button onclick="openEditModal(<?= $suggestion['id']; ?>, '<?= htmlspecialchars($suggestion['title']); ?>', '<?= htmlspecialchars($suggestion['description']); ?>')" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200">Modifier</button>
                    <button onclick="openDeleteModal(<?= $suggestion['id']; ?>)" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200">Supprimer</button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-gray-600 mt-4">Aucune suggestion trouvée.</p>
<?php endif; ?>

<!-- Modal Modification -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center" style="display:none;">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <form method="POST" action="/student/update" class="space-y-4">
            <input type="hidden" name="subject_id" id="editId">
            <div>
                <label for="editTitle" class="block text-lg font-medium text-gray-700">Titre:</label>
                <input type="text" name="title" id="editTitle" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
            </div>

            <div>
                <label for="editDescription" class="block text-lg font-medium text-gray-700">Description:</label>
                <textarea name="description" id="editDescription" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required></textarea>
            </div>

            <button type="submit" name="update" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 transition duration-200">Modifier</button>
        </form>
        <button type="button" onclick="closestatusModal()" class="w-full mt-4 bg-gray-300 text-black p-2 rounded-md hover:bg-gray-400 transition duration-200">Annuler</button>
    </div>
</div>

<!-- Modal Suppression -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center" style="display:none;">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <form method="POST" action="/student/delete" class="space-y-4">
            <input type="hidden" name="subject_id" id="deleteId">
            <p class="text-lg text-gray-700">Voulez-vous vraiment supprimer cette suggestion ?</p>
            <div class="space-x-4">
                <button type="submit" name="delete" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 transition duration-200">Oui</button>
                <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 text-black px-6 py-2 rounded-md hover:bg-gray-400 transition duration-200">Non</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, title, description) {
        document.getElementById('editId').value = id;
        document.getElementById('editTitle').value = title;
        document.getElementById('editDescription').value = description;
        document.getElementById('editModal').style.display = 'flex';
    }
    function openDeleteModal(id) {
        document.getElementById('deleteId').value = id;
        document.getElementById('deleteModal').style.display = 'flex';
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
    function closestatusModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
