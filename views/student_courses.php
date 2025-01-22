<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - YOUDEMY</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">YOUDEMY</h1>
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-blue-600">My Courses</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Profile</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600">Statistics</a>
                </nav>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Add New Course
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <input type="text" placeholder="Search courses..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Course Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x200" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="absolute bottom-4 left-4">
                        <span class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Intro to Web Development</h3>
                    <p class="text-sm text-gray-600 mb-4">Learn the basics of HTML, CSS, and JavaScript to build your first website.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">Web Development</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-2xl font-bold text-blue-600">$100</p>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">View Course</button>
                    </div>
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x200" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="absolute bottom-4 left-4">
                        <span class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Introduction to Machine Learning</h3>
                    <p class="text-sm text-gray-600 mb-4">Discover the basics of machine learning and how to build models using popular frameworks.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">Data Science</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-2xl font-bold text-blue-600">$129.99</p>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">View Course</button>
                    </div>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <img src="https://via.placeholder.com/400x200" alt="Course Image" class="w-full h-48 object-cover">
                    <div class="absolute bottom-4 left-4">
                        <span class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Mastering Excel for Data Analysis</h3>
                    <p class="text-sm text-gray-600 mb-4">Learn advanced Excel features for data analysis and visualization.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">Data Science</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-2xl font-bold text-blue-600">$39.99</p>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">View Course</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-gray-500">© 2025 YOUDEMY. All rights reserved.</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="text-gray-400 hover:text-gray-500">About us</a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">Trust</a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">Usage privacy</a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">Contact</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>