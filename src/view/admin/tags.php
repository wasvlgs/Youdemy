<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les tags - Youdemy Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Modal backdrop */
        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        /* Modal content */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            z-index: 1001;
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-indigo-600 to-indigo-800 text-white flex flex-col">
            <div class="p-6 border-b border-indigo-500/30">
                <div class="flex items-center space-x-3">
                    <img src="/api/placeholder/32/32" alt="Logo" class="rounded-lg">
                    <h1 class="text-2xl font-bold">Youdemy Admin</h1>
                </div>
            </div>
            <nav class="flex-grow space-y-1 p-4">
                <a href="dashboard.html" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-indigo-500/30">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="accepter_cours.html" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-indigo-500/30">
                    <i class="fas fa-check-circle w-5"></i>
                    <span>Accepter les cours</span>
                </a>
                <a href="gerer_utilisateurs.html" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-indigo-500/30">
                    <i class="fas fa-users w-5"></i>
                    <span>Gérer les utilisateurs</span>
                </a>
                <a href="#" class="flex items-center space-x-3 bg-indigo-500/30 py-3 px-4 rounded-lg">
                    <i class="fas fa-tags w-5"></i>
                    <span>Gérer les tags</span>
                </a>
            </nav>
            <div class="p-4">
                <button class="w-full bg-red-500 hover:bg-red-600 py-2 px-4 rounded-lg flex items-center justify-center space-x-2">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log Out</span>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <a href="index.html" class="text-gray-600 hover:text-gray-900">Home</a>
                        <a href="catalogue.html" class="text-gray-600 hover:text-gray-900">Catalogue</a>
                    </div>
                    <h2 class="text-xl font-bold text-indigo-600">Gérer les tags</h2>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 p-6 overflow-auto">
                <div class="max-w-5xl mx-auto">
                    <!-- Tag Management -->
                    <section class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">Gérer les tags</h1>
                        <!-- Button to open modal for adding a tag -->
                        <button data-modal="addTagModal" class="flex items-center space-x-2 bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600">
                            <i class="fas fa-plus-circle"></i>
                            <span>Ajouter un tag</span>
                        </button>
                    </section>

                    <!-- Tags Table -->
                    <section>
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                            <thead>
                                <tr>
                                    <th class="py-3 px-6 text-left">Tag Name</th>
                                    <th class="py-3 px-6 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Tags (These would be dynamically generated with PHP) -->
                                <tr>
                                    <td class="py-3 px-6">Tag Example 1</td>
                                    <td class="py-3 px-6">
                                        <!-- Edit Button opens modal with tag ID -->
                                        <button data-modal="editTagModal" data-tag-id="1" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                                            <i class="fas fa-edit"></i> Modifier
                                        </button>
                                        <form action="delete_tag.php" method="POST" class="inline">
                                            <input type="hidden" name="tag_id" value="1">
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-6">Tag Example 2</td>
                                    <td class="py-3 px-6">
                                        <!-- Edit Button opens modal with tag ID -->
                                        <button data-modal="editTagModal" data-tag-id="2" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                                            <i class="fas fa-edit"></i> Modifier
                                        </button>
                                        <form action="delete_tag.php" method="POST" class="inline">
                                            <input type="hidden" name="tag_id" value="2">
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal for Adding Tag -->
    <div class="modal-backdrop" id="modalBackdrop">
        <!-- Modal content for adding a tag -->
        <div class="modal" id="addTagModal">
            <h2 class="text-2xl font-bold mb-4">Ajouter un tag</h2>
            <form action="add_tag.php" method="POST">
                <label for="tagName" class="block text-gray-700">Nom du tag</label>
                <input id="tagName" name="tag_name" type="text" class="w-full px-4 py-2 border rounded-lg mb-4" placeholder="Nom du tag" required>
                
                <div class="flex space-x-4">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Ajouter</button>
                    <button type="button" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600" onclick="closeModal()">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for Editing Tag -->
    <div class="modal-backdrop" id="editModalBackdrop">
        <!-- Modal content for editing a tag -->
        <div class="modal" id="editTagModal">
            <h2 class="text-2xl font-bold mb-4">Modifier le tag</h2>
            <form action="edit_tag.php" method="POST">
                <input type="hidden" name="tag_id" id="editTagId">
                <label for="editTagName" class="block text-gray-700">Nom du tag</label>
                <input id="editTagName" name="tag_name" type="text" class="w-full px-4 py-2 border rounded-lg mb-4" placeholder="Nom du tag" required>
                
                <div class="flex space-x-4">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Modifier</button>
                    <button type="button" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600" onclick="closeEditModal()">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Open modal for adding tag
        document.querySelectorAll('[data-modal="addTagModal"]').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('addTagModal').style.display = 'block';
                document.getElementById('modalBackdrop').style.display = 'block';
            });
        });

        // Open modal for editing tag
        document.querySelectorAll('[data-modal="editTagModal"]').forEach(button => {
            button.addEventListener('click', (e) => {
                const tagId = e.target.getAttribute('data-tag-id');
                const tagName = e.target.closest('tr').querySelector('td').innerText;

                document.getElementById('editTagId').value = tagId;
                document.getElementById('editTagName').value = tagName;

                document.getElementById('editTagModal').style.display = 'block';
                document.getElementById('editModalBackdrop').style.display = 'block';
            });
        });

        // Close modal for adding tag
        function closeModal() {
            document.getElementById('addTagModal').style.display = 'none';
            document.getElementById('modalBackdrop').style.display = 'none';
        }

        // Close modal for editing tag
        function closeEditModal() {
            document.getElementById('editTagModal').style.display = 'none';
            document.getElementById('editModalBackdrop').style.display = 'none';
        }
    </script>
</body>
</html>
