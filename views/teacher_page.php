<!DOCTYPE html>
<html lang="en">
<!-- Existing head content remains unchanged -->

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
        }

        .tagify__tag {
            background-color: #edf2f7;
            color: #2d3748;
        }

        .dark .tagify__tag {
            background-color: #2d3748;
            color: #edf2f7;
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
                    <div class="flex items-center gap-8">
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-clair-600 to-clair-400 bg-clip-text text-transparent">
                            Course Management
                        </h1>
                        <nav class="hidden md:block">
                            <ul class="flex space-x-4">
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-clair-600 dark:hover:text-clair-400 rounded-md">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 text-sm font-medium text-clair-600 dark:text-clair-400 rounded-md"
                                        aria-current="page">Courses</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-clair-600 dark:hover:text-clair-400 rounded-md">Students</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="flex items-center gap-4">
                        <button id="themeToggle"
                            class="p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <i class="fas fa-moon dark:hidden"></i>
                            <i class="fas fa-sun hidden dark:block"></i>
                        </button>
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
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-clair-100 dark:bg-clair-900">
                            <i class="fas fa-book text-clair-600 dark:text-clair-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Courses</h3>
                            <div class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">24</div>
                        </div>
                        <div class="ml-auto text-green-500 dark:text-green-400">
                            <span class="text-sm font-medium">+12%</span>
                            <i class="fas fa-arrow-up ml-1"></i>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-purple-100 dark:bg-purple-900">
                            <i class="fas fa-users text-purple-600 dark:text-purple-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Students</h3>
                            <div class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">1,234</div>
                        </div>
                        <div class="ml-auto text-green-500 dark:text-green-400">
                            <span class="text-sm font-medium">+8%</span>
                            <i class="fas fa-arrow-up ml-1"></i>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-amber-100 dark:bg-amber-900">
                            <i class="fas fa-star text-amber-600 dark:text-amber-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Avg. Rating</h3>
                            <div class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">4.8</div>
                        </div>
                        <div class="ml-auto text-green-500 dark:text-green-400">
                            <span class="text-sm font-medium">+2%</span>
                            <i class="fas fa-arrow-up ml-1"></i>
                        </div>
                    </div>
                </div>
            </div>

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
                                <option value="development">Development</option>
                                <option value="design">Design</option>
                                <option value="business">Business</option>
                                <option value="marketing">Marketing</option>
                            </select>
                            <i
                                class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        <div class="relative">
                            <select id="sortFilter"
                                class="appearance-none pl-4 pr-10 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-clair-500 dark:focus:ring-clair-400">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="popular">Most Popular</option>
                                <option value="rating">Highest Rated</option>
                            </select>
                            <i
                                class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                        <div class="relative">
                            <select id="statusFilter"
                                class="appearance-none pl-4 pr-10 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-clair-500 dark:focus:ring-clair-400">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                            <i
                                class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="courseGrid">
                <!-- Course Card Template -->
                <template id="courseTemplate">
                    <div
                        class="group bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 hover:shadow-lg transition-all duration-200">
                        <div class="relative">
                            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-qhnIKtsDhhm0ke27amtdLpfFbik8zK.png"
                                alt="Course thumbnail" class="w-full h-48 object-cover rounded-t-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-t-xl">
                            </div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="flex items-center gap-2">
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-500 rounded-full">Active</span>
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-blue-500/20 text-blue-500 rounded-full">Featured</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Advanced Web Development
                                </h3>
                                <div class="relative group">
                                    <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg">
                                        <i class="fas fa-ellipsis-v text-gray-500 dark:text-gray-400"></i>
                                    </button>
                                    <div
                                        class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hidden group-hover:block">
                                        <ul class="py-2">
                                            <li>
                                                <a href="#"
                                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <i class="fas fa-edit w-4 mr-3"></i>
                                                    Edit Course
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
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
                                                <a href="#"
                                                    class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <i class="fas fa-trash-alt w-4 mr-3"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Master modern web technologies and
                                frameworks with hands-on projects and real-world examples.</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full">React</span>
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full">Node.js</span>
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full">TypeScript</span>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BF3QTKFplhMeTNqly5rbVUIPEwM18c.png"
                                            alt="Instructor" class="w-8 h-8 rounded-full">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">Sarah Parker
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Lead Instructor</div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">234</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Students</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
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
                class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Add New Course</h3>
                    <form id="addCourseForm" class="mt-2 text-left">
                        <div class="mb-4">
                            <label for="courseTitle"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Title</label>
                            <input type="text" id="courseTitle" name="title" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="courseDescription"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Description
                                (Markdown supported)</label>
                            <textarea id="courseDescription" name="description" rows="6"
                                class="markdown-editor mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="courseCategory"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <select id="courseCategory" name="category" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Select a category</option>
                                <option value="development">Development</option>
                                <option value="design">Design</option>
                                <option value="business">Business</option>
                                <option value="marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="courseTags"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tags</label>
                            <input id="courseTags" name="tags" class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="courseImage"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Image
                                URL</label>
                            <input type="url" id="courseImage" name="image"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="courseVideo"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Course Video
                                URL</label>
                            <input type="url" id="courseVideo" name="video"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-clair-500 focus:ring focus:ring-clair-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
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

            // Theme Toggle
            const themeToggle = document.getElementById('themeToggle');
            const html = document.documentElement;

            themeToggle.addEventListener('click', () => {
                html.classList.toggle('dark');
                localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
            });

            // Check for saved theme preference
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
            }

            // Toast Notification
            function showToast(message) {
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toastMessage');

                toastMessage.textContent = message;
                toast.classList.remove('translate-x-full');

                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                }, 3000);
            }

            // Course Data
            const courses = [
                {
                    title: "Advanced Web Development",
                    description: "Master modern web technologies and frameworks with hands-on projects and real-world examples.",
                    instructor: "Sarah Parker",
                    students: 234,
                    tags: ["React", "Node.js", "TypeScript"],
                    status: "active",
                    featured: true
                },
                {
                    title: "UI/UX Design Masterclass",
                    description: "Learn to create beautiful and functional interfaces with modern design principles.",
                    instructor: "Michael Chen",
                    students: 189,
                    tags: ["Design", "Figma", "UX"],
                    status: "active",
                    featured: false
                },
                // Add more courses as needed
            ];

            // Render Courses
            function renderCourses(courses) {
                const grid = document.getElementById('courseGrid');
                const template = document.getElementById('courseTemplate');

                grid.innerHTML = '';

                courses.forEach(course => {
                    const clone = template.content.cloneNode(true);

                    // Update course content
                    clone.querySelector('h3').textContent = course.title;
                    clone.querySelector('p').textContent = course.description;

                    // Add to grid
                    grid.appendChild(clone);
                });
            }

            // Initialize
            document.addEventListener('DOMContentLoaded', () => {
                // Show loading state
                document.getElementById('loadingState').classList.remove('hidden');
                document.getElementById('courseGrid').classList.add('hidden');

                // Simulate loading delay
                setTimeout(() => {
                    document.getElementById('loadingState').classList.add('hidden');
                    document.getElementById('courseGrid').classList.remove('hidden');
                    renderCourses(courses);
                }, 1500);
            });

            // Search and Filter Functionality
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const sortFilter = document.getElementById('sortFilter');
            const statusFilter = document.getElementById('statusFilter');

            function filterCourses() {
                let filtered = [...courses];

                // Apply search
                const searchTerm = searchInput.value.toLowerCase();
                if (searchTerm) {
                    filtered = filtered.filter(course =>
                        course.title.toLowerCase().includes(searchTerm) ||
                        course.description.toLowerCase().includes(searchTerm)
                    );
                }

                // Apply category filter
                if (categoryFilter.value) {
                    filtered = filtered.filter(course =>
                        course.tags.some(tag => tag.toLowerCase() === categoryFilter.value)
                    );
                }

                // Apply status filter
                if (statusFilter.value) {
                    filtered = filtered.filter(course => course.status === statusFilter.value);
                }

                // Apply sorting
                switch (sortFilter.value) {
                    case 'popular':
                        filtered.sort((a, b) => b.students - a.students);
                        break;
                    case 'newest':
                        // Add logic for sorting by date if you have date fields
                        break;
                }

                renderCourses(filtered);
            }

            // Add event listeners
            searchInput.addEventListener('input', filterCourses);
            categoryFilter.addEventListener('change', filterCourses);
            sortFilter.addEventListener('change', filterCourses);
            statusFilter.addEventListener('change', filterCourses);




            document.addEventListener('DOMContentLoaded', function () {
                const addCourseBtn = document.getElementById('addCourseBtn');
                const addCourseModal = document.getElementById('addCourseModal');
                const cancelAddCourse = document.getElementById('cancelAddCourse');
                const addCourseForm = document.getElementById('addCourseForm');

                // Initialize SimpleMDE
                const simplemde = new SimpleMDE({ element: document.getElementById("courseDescription") });

                // Initialize Tagify
                const tagInput = document.getElementById('courseTags');
                new Tagify(tagInput);

                addCourseBtn.addEventListener('click', () => {
                    addCourseModal.classList.remove('hidden');
                });

                cancelAddCourse.addEventListener('click', () => {
                    addCourseModal.classList.add('hidden');
                });

                addCourseForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    // Here you would typically send the form data to your backend
                    // For this example, we'll just show a success message
                    showToast('Course added successfully!');
                    addCourseModal.classList.add('hidden');
                });
            });
        </script>
    </body>

</html>