<?php


    session_start();


    if(isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 1){

        if(isset($_POST['logout'])){
            session_destroy();
            header('Location: ../../../index.php');
            die();
        }
    }else{
        session_destroy();
        header('Location: ../login/login.php');
        die();
    }

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex min-h-screen">
        <!-- Enhanced Sidebar -->
        <?php include_once 'aside.php'; ?>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col h-[100vh] overflow-y-auto">
            <!-- Enhanced Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex justify-between items-center px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <a href="../../../index.php" class="text-gray-600 hover:text-gray-900">Home</a>
                        <a href="../catalogue.php" class="text-gray-600 hover:text-gray-900">Catalogue</a>
                    </div>
                    <h2 class="text-xl font-bold text-indigo-600">Admin Dashboard</h2>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-6 overflow-auto">
                <!-- Statistics Section -->
                <section class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Statistiques</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-indigo-100 rounded-lg">
                                    <i class="fas fa-book text-indigo-600"></i>
                                </div>
                                <span class="text-green-500 text-sm font-medium">+12%</span>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Total Courses</h2>
                            <p class="text-3xl font-bold text-gray-800">50</p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-blue-100 rounded-lg">
                                    <i class="fas fa-folder text-blue-600"></i>
                                </div>
                                <span class="text-green-500 text-sm font-medium">+5%</span>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Categories</h2>
                            <p class="text-3xl font-bold text-gray-800">10</p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-green-100 rounded-lg">
                                    <i class="fas fa-star text-green-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Most Popular Course</h2>
                            <p class="text-lg font-medium text-gray-800">JavaScript Basics</p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-purple-100 rounded-lg">
                                    <i class="fas fa-user-graduate text-purple-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Top Teachers</h2>
                            <p class="text-lg font-medium text-gray-800">John Doe, Jane Smith</p>
                        </div>
                    </div>
                </section>

                <!-- Categories Section -->
                <section class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Manage Categories</h2>
                        <button onclick="toggleModal('addCategoryModal')" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center space-x-2">
                            <i class="fas fa-plus"></i>
                            <span>Add Category</span>
                        </button>
                    </div>
                    <div id="categories-list" class="space-y-3">
                        <!-- Categories will be dynamically inserted here -->
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Enhanced Add Category Modal -->
    <div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md mx-4">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Add Category</h2>
                <form onsubmit="addCategory(event)">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="add-category-input">
                            Category Name
                        </label>
                        <input type="text" 
                               id="add-category-input" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                               placeholder="Enter category name">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                                onclick="toggleModal('addCategoryModal')" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Add Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced Edit Category Modal -->
    <div id="editCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md mx-4">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Category</h2>
                <form onsubmit="saveCategory(event)">
                    <input type="hidden" id="edit-category-index">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit-category-input">
                            Category Name
                        </label>
                        <input type="text" 
                               id="edit-category-input" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                                onclick="toggleModal('editCategoryModal')" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const categories = ['Programming', 'Design', 'Marketing', 'Business'];

        function toggleModal(modalId) {
            document.getElementById(modalId).classList.toggle('hidden');
        }

        function addCategory(event) {
            event.preventDefault();
            const input = document.getElementById('add-category-input');
            const categoryName = input.value.trim();
            if (categoryName && !categories.includes(categoryName)) {
                categories.push(categoryName);
                renderCategories();
                toggleModal('addCategoryModal');
                input.value = '';
            }
        }

        function editCategory(index) {
            const input = document.getElementById('edit-category-input');
            input.value = categories[index];
            document.getElementById('edit-category-index').value = index;
            toggleModal('editCategoryModal');
        }

        function saveCategory(event) {
            event.preventDefault();
            const index = document.getElementById('edit-category-index').value;
            const newCategory = document.getElementById('edit-category-input').value.trim();
            if (newCategory && !categories.includes(newCategory)) {
                categories[index] = newCategory;
                renderCategories();
                toggleModal('editCategoryModal');
            }
        }

        function deleteCategory(index) {
            categories.splice(index, 1);
            renderCategories();
        }

        function renderCategories() {
            const list = document.getElementById('categories-list');
            list.innerHTML = '';
            categories.forEach((category, index) => {
                const listItem = document.createElement('div');
                listItem.className = 'flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200';
                
                const categoryText = document.createElement('span');
                categoryText.className = 'font-medium text-gray-700';
                categoryText.textContent = category;

                const actions = document.createElement('div');
                actions.className = 'flex items-center space-x-2';

                const editButton = document.createElement('button');
                editButton.className = 'text-blue-600 hover:text-blue-700 p-2';
                editButton.innerHTML = '<i class="fas fa-edit"></i>';
                editButton.onclick = () => editCategory(index);

                const deleteButton = document.createElement('button');
                deleteButton.className = 'text-red-600 hover:text-red-700 p-2';
                deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                deleteButton.onclick = () => deleteCategory(index);

                actions.appendChild(editButton);
                actions.appendChild(deleteButton);

                listItem.appendChild(categoryText);
                listItem.appendChild(actions);
                list.appendChild(listItem);
            });
        }

        document.addEventListener('DOMContentLoaded', renderCategories);
    </script>
</body>
</html>