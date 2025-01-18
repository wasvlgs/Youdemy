<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Overview</title>
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
                    <i class="fas fa-chart-line"></i>
                    Dashboard
                </h2>
            </header>

            <!-- Content Area -->
            <main class="flex-grow p-8 overflow-auto">
                <div class="max-w-6xl mx-auto">
                    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Overview</h1>

                    <!-- Statistics Section -->
                    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Total Courses -->
                        <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-book text-2xl text-indigo-600"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-800">5</h2>
                            </div>
                            <p class="text-gray-600 font-medium">Total Courses</p>
                        </div>

                        <!-- Total Students -->
                        <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-users text-2xl text-purple-600"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-800">120</h2>
                            </div>
                            <p class="text-gray-600 font-medium">Total Students</p>
                        </div>

                        <!-- Active Enrollments -->
                        <div class="bg-white shadow-lg rounded-xl p-6 hover:shadow-xl transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-graduate text-2xl text-green-600"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-gray-800">15</h2>
                            </div>
                            <p class="text-gray-600 font-medium">Active Enrollments</p>
                        </div>
                    </section>

                    <!-- Recent Activity Section -->
                    <section class="mb-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-history text-indigo-600"></i>
                            Recent Activity
                        </h2>
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
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
                                                    <i class="fas fa-book text-indigo-600"></i>
                                                    Course
                                                </div>
                                            </th>
                                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                                <div class="flex items-center gap-2">
                                                    <i class="fas fa-calendar text-indigo-600"></i>
                                                    Enrollment Date
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
                                            <td class="px-6 py-4">
                                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                                    Introduction to Programming
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-500">2025-01-10</td>
                                        </tr>
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="/api/placeholder/32/32" class="rounded-full mr-3">
                                                    Bob Smith
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                                    Advanced Web Development
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-500">2025-01-09</td>
                                        </tr>
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="/api/placeholder/32/32" class="rounded-full mr-3">
                                                    Catherine Brown
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                                    Data Science Basics
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-500">2025-01-08</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</body>
</html>