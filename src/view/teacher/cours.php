<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer>
        const existingTags = ['JavaScript', 'HTML', 'CSS', 'React', 'Node.js']; // Example tags

        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function handleTagInput(event) {
    const input = event.target;
    const dropdown = document.getElementById('tags-dropdown');
    const selectedTagsContainer = document.getElementById('selected-tags');
    const enteredText = input.value.toLowerCase();

    dropdown.innerHTML = '';
    if (enteredText) {
        const filteredTags = existingTags.filter(tag => tag.toLowerCase().includes(enteredText));
        filteredTags.forEach(tag => {
            const option = document.createElement('div');
            option.className = 'cursor-pointer hover:bg-gray-200 p-2';
            option.textContent = tag;
            option.onclick = () => {
                // Check if the tag is already added
                const alreadyAdded = Array.from(selectedTagsContainer.children).some(t => 
                    t.dataset.tag === tag.toLowerCase()
                );
                if (!alreadyAdded) {
                    const tagElement = document.createElement('div');
                    tagElement.className = 'inline-block bg-indigo-600 text-white px-3 py-1 rounded-full m-1';
                    tagElement.dataset.tag = tag.toLowerCase(); // Store tag as lowercase for comparison
                    tagElement.textContent = tag;

                    const removeBtn = document.createElement('span');
                    removeBtn.textContent = ' ✕';
                    removeBtn.className = 'cursor-pointer ml-2';
                    removeBtn.onclick = () => tagElement.remove();

                    tagElement.appendChild(removeBtn);
                    selectedTagsContainer.appendChild(tagElement);
                }
                input.value = '';
                dropdown.innerHTML = '';
            };
            dropdown.appendChild(option);
        });
    }
}

    </script>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Page Wrapper -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php include_once 'aside.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow">
            <!-- Header -->
            <header class="bg-white shadow-md px-8 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-6">
                    <a href="../../../index.php" class="text-gray-700 text-lg font-medium hover:text-indigo-600 transition-colors flex items-center gap-2">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                    <a href="../catalogue.php" class="text-gray-700 text-lg font-medium hover:text-indigo-600 transition-colors flex items-center gap-2">
                        <i class="fas fa-th-large"></i>
                        Catalogue
                    </a>
                </div>
                <h2 class="text-xl font-bold text-indigo-600">My Courses</h2>
            </header>

            <!-- Content Area -->
            <main class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">My Courses</h1>
                    <button 
                        onclick="toggleModal('addCourseModal')" 
                        class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
                        Add Course
                    </button>
                </div>

                <!-- Courses List -->
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Example Course Card -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-lg font-bold text-gray-800">Course Title</h2>
                        <p class="text-gray-600 mb-4">Short course description goes here.</p>
                        <div class="flex justify-between">
                            <button 
                                onclick="toggleModal('editCourseModal')" 
                                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                                Edit
                            </button>
                            <button 
                                class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">
                                Remove
                            </button>
                        </div>
                    </div>
                    <!-- Add more cards as needed -->
                </section>
            </main>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Add Course</h2>
            <form>
                <div class="mb-4">
                    <label for="course-title" class="block text-gray-700 font-bold mb-2">Course Title</label>
                    <input type="text" id="course-title" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="course-description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="course-description" class="w-full border border-gray-300 rounded-md p-2"></textarea>
                </div>
                <div class="mb-4">
                    <label for="course-tags" class="block text-gray-700 font-bold mb-2">Tags</label>
                    <input 
                        type="text" 
                        id="course-tags" 
                        oninput="handleTagInput(event)" 
                        class="w-full border border-gray-300 rounded-md p-2" 
                        placeholder="Type to search tags...">
                    <div id="tags-dropdown" class="bg-white border border-gray-300 rounded-md mt-1 max-h-32 overflow-y-auto"></div>
                    <div id="selected-tags" class="mt-2 flex flex-wrap"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Content</label>
                    <textarea id="text-content" class="w-full border border-gray-300 rounded-md p-2 h-32"></textarea>
                </div>
                <div class="flex justify-end mt-6">
                    <button 
                        type="button" 
                        onclick="toggleModal('addCourseModal')" 
                        class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
                        Add Course
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Course Modal -->
    <div id="editCourseModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Edit Course</h2>
            <form>
                <div class="mb-4">
                    <label for="edit-course-title" class="block text-gray-700 font-bold mb-2">Course Title</label>
                    <input type="text" id="edit-course-title" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="edit-course-description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="edit-course-description" class="w-full border border-gray-300 rounded-md p-2"></textarea>
                </div>
                <div class="mb-4">
                    <label for="edit-course-tags" class="block text-gray-700 font-bold mb-2">Tags</label>
                    <input 
                        type="text" 
                        id="edit-course-tags" 
                        oninput="handleTagInput(event)" 
                        class="w-full border border-gray-300 rounded-md p-2" 
                        placeholder="Type to search tags...">
                    <div id="tags-dropdown" class="bg-white border border-gray-300 rounded-md mt-1 max-h-32 overflow-y-auto"></div>
                    <div id="selected-tags" class="mt-2 flex flex-wrap"></div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Content</label>
                    <textarea id="edit-text-content" class="w-full border border-gray-300 rounded-md p-2 h-32"></textarea>
                </div>
                <div class="flex justify-end mt-6">
                    <button 
                        type="button" 
                        onclick="toggleModal('editCourseModal')" 
                        class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
