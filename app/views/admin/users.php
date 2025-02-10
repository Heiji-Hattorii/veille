<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php require_once __DIR__ . '/../../controllers/AdminController.php'; ?>
<?php include '../app/views/templates/nav.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<h2 class="text-2xl font-semibold mb-6">Gestion des utilisateurs</h2>

<?php if (!empty($users)): ?>
    <ul class="space-y-4">
        <?php foreach ($users as $user): ?>
            <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md hover:bg-gray-50 transition duration-200">
                <span class="text-lg"><?= htmlspecialchars($user['email']) ?> (<?= htmlspecialchars($user['status']) ?>)</span>
                
                <div class="flex space-x-2">
                    <button 
                        onclick="openstatusModal(<?= $user['user_id']; ?>, '<?= htmlspecialchars($user['status']); ?>')" 
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                        Modifier Status
                    </button>
                    
                    <button 
                        onclick="openDeleteModal(<?= $user['user_id']; ?>)" 
                        class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-200">
                        Supprimer
                    </button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-gray-600 mt-4">Aucun utilisateur trouvé.</p>
<?php endif; ?>

<!-- Modal Modification de rôle -->
<div id="statusModal" style="display:none;" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <form method="POST" action="/admin/updatestatus">
            <input type="hidden" name="user_id" id="statusUserId">
            <label for="status" class="block text-gray-700 mb-2">Rôle:</label>
            <select name="status" id="status" class="block w-full p-2 border border-gray-300 rounded-lg mb-4" required>
                <option value="en attente">En attente</option>
                <option value="active">Active</option>
                <option value="rejete">Rejeté</option>
            </select>
            <div class="flex justify-between">
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-200">
                    Modifier
                </button>
                <button 
                    type="button" 
                    onclick="closestatusModal()" 
                    class="bg-gray-300 text-gray-800 py-2 px-6 rounded-lg hover:bg-gray-400 transition duration-200">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Suppression -->
<div id="deleteModal" style="display:none;" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <form method="POST" action="/admin/delete">
            <input type="hidden" name="user_id" id="deleteUserId">
            <p class="text-lg text-gray-800 mb-4">Voulez-vous vraiment supprimer cet utilisateur ?</p>
            <div class="flex justify-between">
                <button 
                    type="submit" 
                    class="bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-red-700 transition duration-200">
                    Oui
                </button>
                <button 
                    type="button" 
                    onclick="closeDeleteModal()" 
                    class="bg-gray-300 text-gray-800 py-2 px-6 rounded-lg hover:bg-gray-400 transition duration-200">
                    Non
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openstatusModal(userId, status) {
        document.getElementById('statusUserId').value = userId;
        document.getElementById('status').value = status;
        document.getElementById('statusModal').style.display = 'block';
    }

    function openDeleteModal(userId) {
        document.getElementById('deleteUserId').value = userId;
        document.getElementById('deleteModal').style.display = 'block';
    }

    function closestatusModal() {
        document.getElementById('statusModal').style.display = 'none';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
