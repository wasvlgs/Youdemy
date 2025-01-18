<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Students</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Page Wrapper -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php include_once 'aside.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow flex flex-col">
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
                <h2 class="text-xl font-bold text-indigo-600 flex items-center gap-2">
                    <i class="fas fa-users"></i>
                    Students
                </h2>
            </header>

            <!-- Content Area -->
            <main class="flex-grow p-8 overflow-auto">
                <div class="max-w-6xl mx-auto">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Enrolled Students</h1>

                    <!-- Filter Section -->
                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-filter text-indigo-600"></i>
                            Filter by Course
                        </h2>
                        <select class="w-full md:w-1/2 px-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">All Courses</option>
                            <option value="course1">Introduction to Programming</option>
                            <option value="course2">Advanced Web Development</option>
                            <option value="course3">Data Science Basics</option>
                        </select>
                    </section>

                    <!-- Students Table -->
                    <section class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-user text-indigo-600"></i>
                                                Student Name
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-envelope text-indigo-600"></i>
                                                Email
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            <div class="flex items-center gap-2">
                                                <i class="fas fa-book text-indigo-600"></i>
                                                Course
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="/api/placeholder/32/32" class="rounded-full mr-3">
                                                Alice Johnson
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">alice@example.com</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                                Introduction to Programming
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="/api/placeholder/32/32" class="rounded-full mr-3">
                                                Bob Smith
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">bob@example.com</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                                Advanced Web Development
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="/api/placeholder/32/32" class="rounded-full mr-3">
                                                Catherine Brown
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">catherine@example.com</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                                Data Science Basics
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</body>
</html>