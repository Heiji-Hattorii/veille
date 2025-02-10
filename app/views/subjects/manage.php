<?php include '../app/views/templates/nav.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>
<?php foreach ($subjects as $subject): ?>
    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
        <li class="flex justify-between items-center">
            <span class="text-gray-700 font-semibold">
                <?= htmlspecialchars($subject['title']) ?> - <?= htmlspecialchars($subject['description']) ?> 
                <span class="px-2 py-1 text-sm rounded-full <?php echo ($subject['status'] == 'approuve') ? 'bg-green-500 text-white' : (($subject['status'] == 'rejete') ? 'bg-red-500 text-white' : 'bg-yellow-500 text-black'); ?>">
                    <?= htmlspecialchars($subject['status']) ?>
                </span>
            </span>
            <div class="space-x-2">
                <button onclick="openStatusModal(<?= $subject['id']; ?>, '<?= addslashes(htmlspecialchars($subject['status'])); ?>')" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                    Modifier Status
                </button>
                <button onclick="openDeleteModal(<?= $subject['id']; ?>)" 
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                    Supprimer
                </button>
            </div>
        </li>
    </div>
<?php endforeach; ?>

<!-- Modal de modification du statut -->
<div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" action="/subject/updatestatus">
            <input type="hidden" name="subject_id" id="statusSubjectId">
            <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
            <select name="status" id="status" class="border p-2 rounded w-full" required>
                <option value="en attente">En attente</option>
                <option value="approuve">Approuvé</option>
                <option value="rejete">Rejeté</option>
            </select>
            <div class="mt-4 flex justify-end space-x-2">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </button>
                <button type="button" onclick="closeStatusModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal de suppression -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 font-bold">Voulez-vous vraiment supprimer cette suggestion ?</p>
        <form method="POST" action="/subject/delete">
            <input type="hidden" name="subject_id" id="deleteSubjectId">
            <div class="mt-4 flex justify-end space-x-2">
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Oui
                </button>
                <button type="button" onclick="closeDeleteModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Non
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openStatusModal(subjectId, status) {
        document.getElementById('statusSubjectId').value = subjectId;
        document.getElementById('status').value = status;
        document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
    }

    function openDeleteModal(subjectId) {
        document.getElementById('deleteSubjectId').value = subjectId;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
