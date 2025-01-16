<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Container -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-500 p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-md w-full">
            <!-- Toggle Buttons -->
            <div class="flex justify-between bg-gray-100 p-4">
                <button id="login-tab" class="w-1/2 text-center py-2 font-bold text-indigo-600 border-b-4 border-indigo-600">Login</button>
                <button id="signup-tab" class="w-1/2 text-center py-2 font-bold text-gray-600 border-b-4 border-transparent hover:text-indigo-600">Sign Up</button>
            </div>

            <!-- Forms -->
            <div id="login-form" class="p-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Login to Your Account</h2>
                <form>
                    <div class="mb-4">
                        <label for="login-email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="login-email" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <label for="login-password" class="block text-gray-700 font-medium">Password</label>
                        <input type="password" id="login-password" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Login</button>
                </form>
                <p class="mt-4 text-center text-sm text-gray-600">Don't have an account? <button id="switch-to-signup" class="text-indigo-600 font-medium hover:underline">Sign Up</button></p>
            </div>

            <div id="signup-form" class="p-6 hidden">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Create an Account</h2>
                <form>
                    <!-- Name (First & Last Name) -->
                    <div class="mb-4">
                        <label for="signup-first-name" class="block text-gray-700 font-medium">First Name (Prénom)</label>
                        <input type="text" id="signup-first-name" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your first name" required>
                    </div>
                    <div class="mb-4">
                        <label for="signup-last-name" class="block text-gray-700 font-medium">Last Name (Nom)</label>
                        <input type="text" id="signup-last-name" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your last name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="signup-email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="signup-email" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="signup-password" class="block text-gray-700 font-medium">Password</label>
                        <input type="password" id="signup-password" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" placeholder="Create a password" required>
                    </div>

                    <!-- Select User Type (Étudiant or Prof) -->
                    <div class="mb-4">
                        <label for="signup-user-type" class="block text-gray-700 font-medium">I am a</label>
                        <select id="signup-user-type" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-indigo-200" required>
                            <option value="etudiant">Étudiant</option>
                            <option value="prof">Professeur</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-md hover:bg-purple-700">Sign Up</button>
                </form>
                <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <button id="switch-to-login" class="text-indigo-600 font-medium hover:underline">Login</button></p>
            </div>
        </div>
    </div>

    <script>
        const loginTab = document.getElementById('login-tab');
        const signupTab = document.getElementById('signup-tab');
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const switchToSignup = document.getElementById('switch-to-signup');
        const switchToLogin = document.getElementById('switch-to-login');

        loginTab.addEventListener('click', () => {
            loginForm.classList.remove('hidden');
            signupForm.classList.add('hidden');
            loginTab.classList.add('text-indigo-600', 'border-indigo-600');
            signupTab.classList.remove('text-indigo-600', 'border-indigo-600');
        });

        signupTab.addEventListener('click', () => {
            signupForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
            signupTab.classList.add('text-indigo-600', 'border-indigo-600');
            loginTab.classList.remove('text-indigo-600', 'border-indigo-600');
        });

        switchToSignup.addEventListener('click', () => {
            signupTab.click();
        });

        switchToLogin.addEventListener('click', () => {
            loginTab.click();
        });
    </script>
</body>
</html>
