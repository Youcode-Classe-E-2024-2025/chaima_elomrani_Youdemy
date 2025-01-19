<?php
require_once __DIR__ . '/../models/Courses.php';
$cours = new Courses();
$courses = $cours->displayCourse();
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
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        'primary-dark': '#4338CA',
                        'primary-light': '#6366F1',
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
            darkMode: 'class', // Enable dark mode
        }
    </script>

</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <?php require_once('header.php') ?>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <input type="text" placeholder="Search courses..."
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="courseGrid">
            <?php foreach ($courses as $course): ?>
                <div
                    class="group bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 hover:shadow-lg transition-all duration-200 flex flex-col">
                    <div class="relative">
                        <img src="<?= htmlspecialchars($course['image_path']) ?>"
                            alt="<?= htmlspecialchars($course['title']) ?> thumbnail"
                            class="w-full h-48 object-cover rounded-t-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-t-xl"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="flex items-center gap-2">
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                                <?php if (isset($course['featured']) && $course['featured']): ?>
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-blue-500/20 text-blue-500 rounded-full">Featured</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <?= htmlspecialchars($course['title']) ?></h3>
                            <div class="relative group">
                                <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg">
                                    <i class="fas fa-ellipsis-v text-gray-500 dark:text-gray-400"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            <?= htmlspecialchars($course['description'] ?? 'No description available.') ?></p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span
                                class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full"><?= htmlspecialchars($course['category']) ?></span>
                            <?php
                            $tags = explode(',', $course['tags'] ?? '');
                            foreach ($tags as $tag):
                                if (trim($tag) !== ''):
                                    ?>
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full"><?= htmlspecialchars(trim($tag)) ?></span>
                                    <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                        <div class="mt-auto">
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-2">
                                        <img src="./images/profile.png" alt="Instructor" class="w-8 h-8 rounded-full">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                <?= htmlspecialchars($course['Teacher']) ?></div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Instructor</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            <?= htmlspecialchars($course['price']) ?></div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Price</div>
                                    </div>
                                </div>
                                <button
                                    class="w-[50%] flex justify-center  justify-self-center px-2 py-2 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg transition-colors ">
                                    Enroll Now
                                </button>
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