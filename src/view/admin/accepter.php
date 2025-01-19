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
    <title>Accepter les Cours - Youdemy Admin</title>
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
                    <div class="flex items-center space-x-4">
                        <h2 class="text-xl font-bold text-indigo-600">Course Approval</h2>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-6 overflow-auto">
                <div class="max-w-5xl mx-auto">
                    <!-- Header with Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-indigo-100 rounded-lg">
                                    <i class="fas fa-clock text-indigo-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600">Pending Courses</h2>
                            <p class="text-3xl font-bold text-gray-800">3</p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-green-100 rounded-lg">
                                    <i class="fas fa-check text-green-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600">Approved Today</h2>
                            <p class="text-3xl font-bold text-gray-800">12</p>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-4">
                                <div class="p-3 bg-red-100 rounded-lg">
                                    <i class="fas fa-times text-red-600"></i>
                                </div>
                            </div>
                            <h2 class="text-sm font-medium text-gray-600">Rejected Today</h2>
                            <p class="text-3xl font-bold text-gray-800">3</p>
                        </div>
                    </div>

                    <!-- Courses List -->
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-xl font-bold text-gray-800">Pending Courses</h2>
                        </div>
                        <div class="p-6">
                            <div id="courses-list" class="space-y-4">
                                <!-- Courses will be dynamically inserted here -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Enhanced Confirm Action Modal -->
    <div id="confirmActionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md mx-4">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Confirm Action</h2>
                <p id="modal-text" class="text-gray-600 mb-6"></p>
                <div class="flex justify-end space-x-3">
                    <button type="button" 
                            onclick="toggleModal('confirmActionModal')" 
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button onclick="confirmAction()" 
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const courses = [
            { title: "JavaScript Basics", category: "Programming", instructor: "John Doe" },
            { title: "Graphic Design 101", category: "Design", instructor: "Jane Smith" },
            { title: "Digital Marketing", category: "Marketing", instructor: "Emily Johnson" }
        ];

        let selectedCourseIndex = null;
        let selectedAction = null;

        function renderCourses() {
            const list = document.getElementById('courses-list');
            list.innerHTML = '';
            courses.forEach((course, index) => {
                const listItem = document.createElement('div');
                listItem.className = 'bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors duration-200';

                const content = document.createElement('div');
                content.className = 'flex justify-between items-center';

                const courseInfo = document.createElement('div');
                courseInfo.className = 'space-y-1';
                courseInfo.innerHTML = `
                    <h3 class="font-medium text-gray-900">${course.title}</h3>
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <span class="flex items-center">
                            <i class="fas fa-folder mr-2"></i>
                            ${course.category}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-user mr-2"></i>
                            ${course.instructor}
                        </span>
                    </div>
                `;

                const actions = document.createElement('div');
                actions.className = 'flex items-center space-x-2';

                const acceptButton = document.createElement('button');
                acceptButton.className = 'flex items-center space-x-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200';
                acceptButton.innerHTML = '<i class="fas fa-check mr-2"></i> Accept';
                acceptButton.onclick = () => openModal(index, 'accept');

                const rejectButton = document.createElement('button');
                rejectButton.className = 'flex items-center space-x-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200';
                rejectButton.innerHTML = '<i class="fas fa-times mr-2"></i> Reject';
                rejectButton.onclick = () => openModal(index, 'reject');

                actions.appendChild(acceptButton);
                actions.appendChild(rejectButton);

                content.appendChild(courseInfo);
                content.appendChild(actions);
                listItem.appendChild(content);
                list.appendChild(listItem);
            });
        }

        function openModal(index, action) {
            selectedCourseIndex = index;
            selectedAction = action;
            const modalText = document.getElementById('modal-text');
            modalText.textContent = `Are you sure you want to ${action} the course: "${courses[index].title}"?`;
            toggleModal('confirmActionModal');
        }

        function confirmAction() {
            if (selectedAction === 'accept') {
                alert(`Course "${courses[selectedCourseIndex].title}" has been accepted.`);
            } else if (selectedAction === 'reject') {
                alert(`Course "${courses[selectedCourseIndex].title}" has been rejected.`);
            }
            courses.splice(selectedCourseIndex, 1);
            renderCourses();
            toggleModal('confirmActionModal');
        }

        function toggleModal(modalId) {
            document.getElementById(modalId).classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', renderCourses);
    </script>
</body>
</html>