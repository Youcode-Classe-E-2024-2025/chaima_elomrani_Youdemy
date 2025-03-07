<?php
require_once __DIR__ . '/../models/Courses.php';
require_once __DIR__ . '/../controllers/CoursesController.php';

$visitor= new Courses();
$visitors = $visitor->visitorCourses();

$controller = new CoursesController();
$keyword = isset($_GET['search']) ? $_GET['search'] : '';

$courses = $controller->searchCourse();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Course Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#6366F1',
                    }
                }
            }
        }
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
                        tertiary: '#F59E0B',
                        background: '#F3F4F6',
                        surface: '#FFFFFF',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                },
            },
        }
    </script>

</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <?php require_once('header.php') ?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-self-center space-x-4 mb-12 px-12">
                        <form action="index.php?action=search" method="GET" class="flex items-center space-x-2">
                            <div class="relative flex-grow">
                                <input type="search" name="search" 
                                    placeholder="Search courses..." 
                                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" 
                                    class="w-full pl-10 pr-64 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition duration-200"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                            </div>
                        
                        </form>
                        
                        <button
                            class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                            Logout
                        </button>
                    </div>

     
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="courseGrid">
    <?php foreach ($visitors as $visitor): ?>
    <div class="group bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 hover:shadow-lg transition-all duration-200">
        <div class="relative">
            <img src="<?= htmlspecialchars($visitor['image_path']) ?>" alt="<?= htmlspecialchars($visitor['title']) ?> thumbnail" class="w-full h-48 object-cover rounded-t-xl">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-t-xl"></div>
            <div class="absolute bottom-4 left-4 right-4">
                <div class="flex items-center gap-2">
                    <span class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                    <?php if (isset($visitor['featured']) && $visitor['featured']): ?>
                    <span class="px-2 py-1 text-xs font-medium bg-blue-500/20 text-blue-500 rounded-full">Featured</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="flex items-start justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white"><?= htmlspecialchars($visitor['title']) ?></h3>
                <div class="relative group">
                    <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg">
                        <i class="fas fa-ellipsis-v text-gray-500 dark:text-gray-400"></i>
                    </button>
              
                </div>
            </div>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400"><?= htmlspecialchars($visitor['description'] ?? 'No description available.') ?></p>
           
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                  
                    <div class="text-center w-full">
                        <div class="text-lg  font-medium text-gray-900 "><?= htmlspecialchars($visitor['price']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
        
    </main>
    

    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-gray-500">© 2025 Youdemy. All rights reserved.</p>
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