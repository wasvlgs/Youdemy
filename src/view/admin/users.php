<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les utilisateurs - Youdemy Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                <a href="#" class="flex items-center space-x-3 bg-indigo-500/30 py-3 px-4 rounded-lg">
                    <i class="fas fa-users w-5"></i>
                    <span>Gérer les utilisateurs</span>
                </a>
                <a href="#" class="flex items-center space-x-3 py-3 px-4 rounded-lg hover:bg-indigo-500/30">
                    <i class="fas fa-tags w-5"></i>
                    <span>Manage Tags</span>
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
                    <h2 class="text-xl font-bold text-indigo-600">Gérer les utilisateurs</h2>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 p-6 overflow-auto">
                <div class="max-w-5xl mx-auto">
                    <!-- User Management -->
                    <section class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">Gérer les utilisateurs</h1>
                        <div class="flex space-x-4">
                            <button class="flex items-center space-x-2 bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600">
                                <i class="fas fa-users"></i>
                                <span>Tous</span>
                            </button>
                            <button class="flex items-center space-x-2 bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Enseignants</span>
                            </button>
                            <button class="flex items-center space-x-2 bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600">
                                <i class="fas fa-user-graduate"></i>
                                <span>Étudiants</span>
                            </button>
                        </div>
                    </section>

                    <!-- User Cards -->
                    <section>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Teacher Card -->
                            <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-gray-800">John Doe</h3>
                                    <p class="text-gray-600">Enseignant</p>
                                </div>
                                <div class="space-x-2">
                                    <button class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
                                        <i class="fas fa-check"></i> Accepter
                                    </button>
                                    <button class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                                        <i class="fas fa-times"></i> Rejeter
                                    </button>
                                </div>
                            </div>
                            <!-- Student Card -->
                            <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                                <div>
                                    <h3 class="font-bold text-gray-800">Jane Smith</h3>
                                    <p class="text-gray-600">Étudiant</p>
                                </div>
                                <button class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                                    <i class="fas fa-ban"></i> Bloquer
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
