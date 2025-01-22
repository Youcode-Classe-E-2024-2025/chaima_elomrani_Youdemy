<?php
require_once __DIR__ . '/../models/Courses.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Tag.php';



// $courseId = $_GET['id'];

$cours = new Courses();
$courses = $cours->displayCourse();


$category = new Category();
$categories = $category->displayCategory();


$taf = new Tag();
$tags = $taf->displaytags();
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'clair': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }

            100% {
                background-position: 1000px 0;
            }
        }

        .animate-shimmer {
            animation: shimmer 2s infinite linear;
            background: linear-gradient(to right, #f6f7f8 0%, #edeef1 20%, #f6f7f8 40%, #f6f7f8 100%);
            background-size: 1000px 100%;
        }
    </style>


    <style>
        .markdown-editor {
            min-height: 200px;
            font-family: 'Menlo', 'Monaco', 'Courier New', monospace;
        }

        .tagify {
            --tags-border-color: #e2e8f0;
            --tags-hover-border-color: #cbd5e0;
            --tags-focus-border-color: #4299e1;
            width: 100%;
            max-width: 100%;
            color: #000000;
        }

        .tagify__dropdown {
            color: #000000 !important;
        }

        .tagify__dropdown__item {
            color: #000000 !important;
        }
    </style>

</head>

<body>

    <body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <div id="toast"
            class="fixed top-4 right-4 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 flex items-center gap-3 border border-gray-200 dark:border-gray-700">
                <div class="text-green-500 dark:text-green-400">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 dark:text-gray-200">Success</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400" id="toastMessage"></p>
                </div>
            </div>
        </div>

        <header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex w-full justify-start gap-[25%]">
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-clair-600 to-clair-400 bg-clip-text text-transparent">
                            YOUDEMY
                        </h1>
                        <nav class="hidden md:block">
                            <ul class="flex space-x-4 gap-12 w-full ">

                                <li>
                                    <a href="index.php?action=teacher"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-clair-600 dark:hover:text-clair-400 rounded-md">My
                                        Courses</a>
                                </li>
                                <li>
                                    <a href="index.php?action=profile"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-clair-600 dark:hover:text-clair-400 rounded-md">Profile</a>
                                </li>
                                <li>
                                    <a href="http://<?=$_SERVER['HTTP_HOST']?>/index.php?action=statistic"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-clair-600 dark:hover:text-clair-400 rounded-md">Statistics</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="flex items-center gap-4">
                        <button id="addCourseBtn"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-clair-600 hover:bg-clair-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clair-500 transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Add New Course
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- Search and Filters -->
            <div
                class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <div class="flex-1 relative">
                        <input type="text" id="searchInput" placeholder="Search courses..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-clair-500 dark:focus:ring-clair-400">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <div class="relative">
                            <select id="categoryFilter"
                                class="appearance-none pl-4 pr-10 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-clair-500 dark:focus:ring-clair-400">
                                <option value="">All Categories</option>
                                <?php
                                foreach ($categories as $category) {
                                    ?>
                                    <option value="development"><?= $category['name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <i
                                class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        <div class="relative">
                            <select id="sortFilter"
                                class="appearance-none pl-4 pr-10 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-clair-500 dark:focus:ring-clair-400">
                                <option value="newest">All Tags</option>

                            </select>
                            <i
                                class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="courseGrid">
                <?php foreach ($courses as $course): ?>
                    <div
                        class="group bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 hover:shadow-lg transition-all duration-200 flex flex-col">
                        <div class="relative">
                            <img src="<?= htmlspecialchars(string: $course['image_path']) ?>"
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
                                    <?= htmlspecialchars($course['title']) ?>
                                </h3>
                                <div class="relative group">
                                    <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg">
                                        <i class="fas fa-ellipsis-v text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                    <div
                                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hidden group-hover:block">
                                        <ul class="py-2">
                                            <li>
                                                <a href="http://localhost/views/update_course.php?course_id=<?= $course['id'] ?>"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <i class="fas fa-edit w-4 mr-3"></i>
                                                    Edit Course
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php?action=statistic"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <i class="fas fa-chart-bar w-4 mr-3"></i>
                                                    View Analytics
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <i class="fas fa-archive w-4 mr-3"></i>
                                                    Archive
                                                </a>
                                            </li>
                                            <li>
                                                <form action="index.php?action=deleteCourse&id=<?= $course['id'] ?>"
                                                    method="post">
                                                    <input type="hidden" name="id" value="<?= $course['id'] ?>">
                                                    <button
                                                        class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                        <i class="fas fa-trash-alt w-4 mr-3"></i>

                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <?= htmlspecialchars($course['description'] ?? 'No description available.') ?>
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full"><?= htmlspecialchars($course['category_name']) ?></span>

                            </div>
                            <div class="">
                                <div class=" border-t border-gray-200">
                                    <div class="flex items-center justify-between ">

                                        <div class="text-center w-full">
                                            <div class="text-2xl font-medium text-black dark:text-white">
                                                <?= htmlspecialchars($course['price'] ?? '') ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Loading State -->
            <div id="loadingState" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800">
                    <div class="animate-shimmer h-48 bg-gray-200 dark:bg-gray-800 rounded-t-xl"></div>
                    <div class="p-6 space-y-4">
                        <div class="animate-shimmer h-6 bg-gray-200 dark:bg-gray-800 rounded-md"></div>
                        <div class="animate-shimmer h-4 bg-gray-200 dark:bg-gray-800 rounded-md"></div>
                        <div class="animate-shimmer h-4 bg-gray-200 dark:bg-gray-800 rounded-md w-2/3"></div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800">
                    <div class="animate-shimmer h-48 bg-gray-200 dark:bg-gray-800 rounded-t-xl"></div>
                    <div class="p-6 space-y-4">
                        <div class="animate-shimmer h-6 bg-gray-200 dark:bg-gray-800 rounded-md"></div>
                        <div class="animate-shimmer h-4 bg-gray-200 dark:bg-gray-800 rounded-md"></div>
                        <div class="animate-shimmer h-4 bg-gray-200 dark:bg-gray-800 rounded-md w-2/3"></div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800">
                    <div class="animate-shimmer h-48 bg-gray-200 dark:bg-gray-800 rounded-t-xl"></div>
                    <div class="p-6 space-y-4">
                        <div class="animate-shimmer h-6 bg-gray-200 dark:bg-gray-800 rounded-md"></div>
                        <div class="animate-shimmer h-4 bg-gray-200 dark:bg-gray-800 rounded-md"></div>
                        <div class="animate-shimmer h-4 bg-gray-200 dark:bg-gray-800 rounded-md w-2/3"></div>
                    </div>
                </div>
            </div>
        </main>


        <!-- Add Course Form Modal -->
        <div id="addCourseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div
                class="relative top-20 mx-auto p-5 border-black w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white ">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-black">Add New Course</h3>
                    <form id="addCourseForm" class="mt-2 text-left"
                        action="http://<?= $_SERVER['HTTP_HOST'] ?>/index.php?action=addCourse" method="POST">
                        <div class="mb-4">
                            <label for="courseTitle" class="block text-sm font-medium ">Course Title</label>
                            <input type="text" id="courseTitle" name="name" required
                                class="mt-1 block w-full rounded-md border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50">
                        </div>
                        <div class="mb-4">
                            <label for="courseDescription" class="block text-sm font-medium text-black ">Course
                                Description
                                (Markdown supported)</label>
                            <textarea id="courseDescription" name="description" rows="6"
                                class="markdown-editor mt-1 block w-full rounded-md border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>
                        <div class="mb-4 flex space-x-4">
                            <div class="w-full">
                                <label for="courseCategory"
                                    class="block text-md font-medium text-gray-700">Category</label>
                                <select id="courseCategory" name="category" required
                                    class="mt-1 block w-full py-2 rounded-[5px] border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50">
                                    <option value="">Select a category</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= htmlspecialchars($category['id']) ?>">
                                            <?= htmlspecialchars($category['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="courseTags" class="block text-sm font-medium text-black">Tags</label>
                                <select id="courseTags" name="tags[]" multiple
                                    class="mt-1 block w-full rounded-md border-black focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50">

                                    <?php foreach ($tags as $tag): ?>
                                        <option value="<?= $tag['id'] ?>"> <?= $tag['title'] ?></option>
                                    <?php endforeach; ?>

                                </select>

                            </div>
                        </div>

                        <label class="block text-sm font-medium text-black" for="price">Price</label>
                        <input type="text" placeholder="Enter Price"
                            class="mt-1 block w-full py-2 mb-[20px] rounded-md border-black shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50"
                            name="price">

                        <div id="imageUrlInput" class="mb-4 ">
                            <label for="courseImage"
                                class="block text-sm py-4font-medium text-gray-700 dark:text-gray-300">Course Image
                                URL</label>
                            <input type="url" id="courseImage" name="image"
                                class="mt-1 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div id="videoUrlInput" class="mb-4 ">
                            <label for="courseVideo"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Video
                                URL</label>
                            <input type="url" id="courseVideo" name="video"
                                class="mt-1 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-2">
                            <button type="button" id="cancelAddCourse"
                                class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clair-500 sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-clair-600 text-base font-medium text-white hover:bg-clair-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-clair-500 sm:text-sm">
                                Add Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <script>

            document.addEventListener('DOMContentLoaded', function () {
                const addCourseBtn = document.getElementById('addCourseBtn');
                const addCourseModal = document.getElementById('addCourseModal');
                const cancelAddCourse = document.getElementById('cancelAddCourse');
                const addCourseForm = document.getElementById('addCourseForm');

                const simplemde = new SimpleMDE({ element: document.getElementById("courseDescription") });


                addCourseBtn.addEventListener('click', () => {
                    addCourseModal.classList.remove('hidden');
                });

                cancelAddCourse.addEventListener('click', () => {
                    addCourseModal.classList.add('hidden');
                });
            });
        </script>
    </body>

</html>