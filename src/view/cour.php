<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-indigo-600 via-purple-500 to-purple-600 text-white py-6 shadow-lg">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
            <a href="catalogue.php" class="text-lg font-bold hover:text-gray-200 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                Back to Catalogue
            </a>
            <nav class="space-x-4">
                <button class="bg-white/20 hover:bg-white/30 text-white px-5 py-2 rounded-full transition-all">Log In</button>
                <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-5 py-2 rounded-full transition-all">Sign Up</button>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 md:px-12 py-12">
        <!-- Course Details -->
        <section class="mb-12 bg-white rounded-2xl shadow-xl p-8">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">Introduction to Programming</h1>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">Learn the basics of programming with hands-on projects and step-by-step guidance. Perfect for beginners looking to start their coding journey.</p>
                
                <div class="flex flex-wrap items-center gap-6 mb-8">
                    <div class="flex items-center gap-2">
                        <img src="/api/placeholder/40/40" alt="John Doe" class="rounded-full ring-2 ring-indigo-500">
                        <div>
                            <p class="text-gray-800 font-medium">Created by:</p>
                            <p class="text-indigo-600 font-semibold">John Doe</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-indigo-200 transition-colors">#Programming</span>
                        <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-purple-200 transition-colors">#Beginner</span>
                        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-200 transition-colors">#Coding</span>
                    </div>
                </div>

                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-medium transition-all transform hover:scale-105 hover:shadow-lg">
                    Join the Course
                </button>
            </div>
        </section>

        <!-- Course Content: Video Section -->
        <section class="bg-white rounded-2xl shadow-xl p-8 mb-8 overflow-hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Video Content</h2>
            <div class="aspect-video bg-gray-900 rounded-xl overflow-hidden relative group">
                <video controls class="w-full h-full object-cover">
                    <source src="/videos/sample-course.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <!-- Play button overlay -->
                <div class="absolute inset-0 flex items-center justify-center bg-black/40 group-hover:bg-black/30 transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center transform group-hover:scale-110 transition-all">
                        <i class="fas fa-play text-indigo-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Course Content: Text Section -->
        <section class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Text Content</h2>
            <div class="prose max-w-none">
                <p class="text-gray-600 leading-relaxed mb-6">
                    Welcome to the introduction to programming course. This course is designed to provide you with the fundamental knowledge required to understand the basics of coding. You will learn about variables, data types, control structures, and much more.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    By the end of this course, you should be able to write simple programs and understand how programming can solve real-world problems. Dive in and start learning today!
                </p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 md:px-12 text-center">
            <p class="text-gray-300">&copy; 2025 Youdemy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Add interactive video play functionality
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.querySelector('video');
            const overlay = video.parentElement.querySelector('.absolute');
            
            overlay.addEventListener('click', function() {
                video.play();
                overlay.style.display = 'none';
            });

            video.addEventListener('pause', function() {
                overlay.style.display = 'flex';
            });
        });
    </script>
</body>
</html>