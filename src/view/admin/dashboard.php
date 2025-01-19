<?php


    require_once '../../classes/database.php';
    require_once '../../classes/teacher.php';
    require_once '../../classes/categorie.php';
    require_once '../../classes/cours.php';
    $instanceCours = new cours();


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
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Total Courses</h2>
                            <p class="text-3xl font-bold text-gray-800">
                                <?php

                                    $getTotalCours = $instanceCours->getAllCoursCount(Database::getInstance()->getConnect());
                                    if($getTotalCours != null){
                                        echo $getTotalCours['total'];
                                    }else{
                                        echo 0;
                                    }

                                ?>
                            </p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-blue-100 rounded-lg">
                                    <i class="fas fa-folder text-blue-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Categories</h2>
                            <p class="text-3xl font-bold text-gray-800">
                                <?php 

                                    $getTotalCategorie = categorie::getCategories(Database::getInstance()->getConnect());
                                    if($getTotalCategorie != null){
                                        echo $getTotalCategorie->rowCount();
                                    }else{
                                        echo 0;
                                    }

                                ?>
                            </p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-green-100 rounded-lg">
                                    <i class="fas fa-star text-green-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Most Popular Course</h2>
                            <p class="text-lg font-medium text-gray-800">
                                <?php
                                    $getBestCours = cours::bestCours(Database::getInstance()->getConnect());
                                    if($getBestCours != null){
                                        echo $getBestCours['titre'];
                                    }else{
                                        echo 'No best course exict!';
                                    }
                                 ?>
                            </p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-purple-100 rounded-lg">
                                    <i class="fas fa-user-graduate text-purple-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600 mb-2">Top Teachers</h2>
                            <p class="text-lg font-medium text-gray-800">
                                <?php 

                                    $getBestTeacher = prof::getBestTeacher(Database::getInstance()->getConnect());
                                    if($getBestTeacher != null){
                                        echo $getBestTeacher['prenom'].' '.$getBestTeacher['nom'];
                                    }else{
                                        echo 'No teacher exict!';
                                    }
                                
                                ?>
                            </p>
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
                    <div id="categories-list" class="space-y-3 max-h-[500px] overflow-y-auto">

                            <?php

                                    $getCategories = categorie::getCategories(Database::getInstance()->getConnect());
                                    if($getCategories != null && $getCategories->rowCount() > 0){
                                        foreach($getCategories as $categorie){
                                            echo '<div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                            <span class="font-medium text-gray-700">'.$categorie['name'].'</span>
                                            <form action="../../controller/removeCategorieController.php" method="post" class="flex items-center space-x-2">
                                                <button type="button"  onclick="toggleModal(`editCategoryModal`,`'.$categorie['name'].'`,'.$categorie['id_categorie'].')"  class="text-blue-600 hover:text-blue-700 p-2">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button value="'.$categorie['id_categorie'].'" name="remove" class="text-red-600 hover:text-red-700 p-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>';
                                        }
                                    }else{
                                        echo 'No categorie exict';
                                    }

                            ?>

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
                <form method="post" action="../../controller/addCategorieController.php">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="add-category-input">
                            Category Name
                        </label>
                        <input name="setCategorie" type="text" 
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
                        <button name="addCategorie" type="submit" 
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
                <form method="post" action="../../controller/editCategorieController.php">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="edit-category-input">
                            Category Name
                        </label>
                        <input name="editName" type="text" 
                               id="edit-category-input" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                                onclick="toggleModal('editCategoryModal')" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button name="saveChange" id="saveChange" type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert Container (Initially hidden) -->
    <div id="alert-container" class="fixed top-0 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-lg p-4 mb-4 hidden rounded-lg">
        <!-- Success Alert -->
        <div id="success-alert" class="alert hidden p-4 mb-4 text-green-700 bg-green-100 rounded-lg shadow-md w-full">
            <span id="success-message" class="font-medium">Success! Your action was completed.</span>
        </div>

        <!-- Error Alert -->
        <div id="error-alert" class="alert hidden p-4 mb-4 text-red-700 bg-red-100 rounded-lg shadow-md w-full">
            <span id="error-message" class="font-medium">Error! Something went wrong.</span>
        </div>
    </div>
    <script>
            <?php

            if(isset($_SESSION['alert'])){
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
            // Function to display the alert (success or error)
        function showAlert(type, message) {
            const alertContainer = document.getElementById('alert-container');
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            // Set the alert message
            if (type === 'success') {
                successMessage.textContent = message;
                successAlert.classList.remove('hidden');
                errorAlert.classList.add('hidden');
            } else if (type === 'error') {
                errorMessage.textContent = message;
                errorAlert.classList.remove('hidden');
                successAlert.classList.add('hidden');
            }

            // Show the alert container
            alertContainer.classList.remove('hidden');

            // Automatically close the alert after 3 seconds
            setTimeout(closeAlert, 2000);
        }

        // Function to close the alert
        function closeAlert() {
            const alertContainer = document.getElementById('alert-container');
            alertContainer.classList.add('hidden');
        }
        function toggleModal(modalId,name = '',id = '') {
            document.getElementById(modalId).classList.toggle('hidden');
            if(name && id){
                document.getElementById("edit-category-input").value = name;
                document.getElementById("saveChange").value = id;
            }
            
        }




        document.addEventListener('DOMContentLoaded', renderCategories);
    </script>
</body>
</html>