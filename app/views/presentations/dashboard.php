<?php include '../app/views/templates/header.php'; ?>
<?php include '../app/views/templates/nav.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>

<div class="bg-gray-100 p-6 min-h-screen flex justify-center items-center">
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Créer une présentation</h2>

        <form method="POST" action="/admin/presentation/save" class="space-y-6">
            <div>
                <label for="subject_id" class="block text-gray-700 font-medium mb-2">Choisir un sujet :</label>
                <select name="subject_id" id="subject_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?= htmlspecialchars($subject['id']); ?>"><?= $subject['title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="student_id" class="block text-gray-700 font-medium mb-2">Choisir un étudiant :</label>
                <select name="student_id" id="student_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <?php foreach ($students as $student): ?>
                        <option value="<?= htmlspecialchars($student['user_id']); ?>"><?= $student['email']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="presentation_date" class="block text-gray-700 font-medium mb-2">Date de la présentation :</label>
                <input type="datetime-local" name="presentation_date" id="presentation_date" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                    Créer la présentation
                </button>
            </div>
        </form>
    </div>
</div>

<?php include '../app/views/templates/footer.php'; ?>
