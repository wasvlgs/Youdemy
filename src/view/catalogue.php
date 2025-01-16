<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Catalogue - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body class="bg-gray-50 font-sans">

    <!-- Top Header -->
    <header class="min-h-[80px] w-full bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center px-5">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <a href="#" class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg"></div>
                    <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Youdemy</span>
                </a>
                
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="../../index.php" class="text-gray-600 hover:text-indigo-600 transition-colors">Home</a>
                    <a href="../../index.php#about" class="text-gray-600 hover:text-indigo-600 transition-colors">About</a>
                    <a href="../../index.php#contact" class="text-gray-600 hover:text-indigo-600 transition-colors">Contact</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <button class="px-4 py-2 text-gray-600 hover:text-indigo-600 transition-colors">Log In</button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-600/20">Sign Up Free</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Category Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center space-x-6">
            <!-- Category Buttons -->
            <div class="flex overflow-x-auto space-x-4 py-2 px-4 sm:px-6 custom-scrollbar">
                <button class="px-6 py-2 bg-indigo-100 rounded-lg text-indigo-700 shadow-md hover:bg-indigo-200 transition duration-300 flex-shrink-0">
                    All
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Web Development
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Data Science
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Design
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Marketing
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Business
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Marketing
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Business
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Marketing
                </button>
                <button class="px-6 py-2 bg-gray-100 rounded-lg text-gray-700 shadow-md hover:bg-gray-200 transition duration-300 flex-shrink-0">
                    Business
                </button>
            </div>

            
            <!-- Search Bar -->
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search courses..." class="px-4  py-2 w-64 ring-[1px] rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none transition duration-200">Search</button>
            </div>
        </div>
    </header>


    <!-- Courses Catalogue -->
    <main class="container mx-auto px-6 md:px-12 py-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Courses Catalogue</h1>

        <!-- Course Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Course Card 1 -->
            <div class="bg-white shadow-xl rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="/images/course1.jpg" alt="Course Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Introduction to Programming</h3>
                    <p class="mt-3 text-gray-600">Learn the basics of programming with hands-on projects.</p>
                    <button class="mt-4 bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none transition duration-200">View Details</button>
                </div>
            </div>

            <!-- Course Card 2 (Example) -->
            <div class="bg-white shadow-xl rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <img src="/images/course2.jpg" alt="Course Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Web Development Bootcamp</h3>
                    <p class="mt-3 text-gray-600">Master HTML, CSS, JavaScript, and React in this bootcamp.</p>
                    <button class="mt-4 bg-indigo-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none transition duration-200">View Details</button>
                </div>
            </div>

            <!-- Repeat above card block for additional courses -->
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center space-x-4">
            <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-md hover:bg-gray-200 focus:outline-none transition duration-200">Previous</button>
            <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none transition duration-200">1</button>
            <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-md hover:bg-gray-200 focus:outline-none transition duration-200">2</button>
            <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-md hover:bg-gray-200 focus:outline-none transition duration-200">3</button>
            <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-md hover:bg-gray-200 focus:outline-none transition duration-200">Next</button>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <p class="text-sm">&copy; 2025 Youdemy. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
