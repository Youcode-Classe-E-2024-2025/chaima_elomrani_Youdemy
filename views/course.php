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
    <title>Youdemy Admin - Manage Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
        <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
            <div class="flex items-center justify-center h-14 border-b">
                <div class="text-2xl font-bold text-primary-600">Youdemy Admin</div>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="users.php"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="category.php"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-th-large"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="tag.php"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-tags"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tags</span>
                        </a>
                    </li>
                    <li>
                        <a href="course.php"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-book text-primary-500"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Courses</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ml-64 flex-1">
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Manage Courses</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, Admin</span>
                    <button
                        class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                        Logout
                    </button>
                </div>
            </header>
            <main class="p-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Course List</h2>
                        <button id=" addbtn"
                            class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                            Add New Course
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Title</th>
                                    <th class="py-3 px-4 text-left">Description</th>
                                    <th class="py-3 px-4 text-left">Course Teacher</th>
                                    <th class="py-3 px-4 text-left">Category</th>
                                    <th class="py-3 px-4 text-left">Price</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php
                                foreach($courses as $course){
                                ?>
                                <tr>
                                    <td class="py-3 px-4"><?=$course['id'] ?></td>
                                    <td class="py-3 px-4"><?=$course['name'] ?></td>
                                    <td class="py-3 px-4"><?=$course['description']?></td>
                                    <td class="py-3 px-4"><?=$course['Teacher']?></td>
                                    <td class="py-3 px-4"><?=$course['category_id']?></td>
                                    <td class="py-3 px-4"><?=$course['price']?></td>
                                    <!-- <td class="py-3 px-4"><span
                                            class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-sm">Published</span>
                                    </td> -->
                                    <td class="py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                        <button class="text-red-500 hover:text-red-700">Delete</button>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-between items-center">

                        <div>
                            <span class="text-gray-600">Showing 1 to 10 of 50 entries</span>
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="bg-gray-200 hover:bg-gray-300 text-gray-600 font-semibold py-2 px-4 rounded-lg">Previous</button>
                            <button
                                class="bg-primary-500 hover:bg-primary-600 text-white font-semibold py-2 px-4 rounded-lg">Next</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- ***************************************adding  form ****************************** -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" }
                    }
                }
            }
        }
    </script>
    </head>
    <div id="courseForm" class=" bg-black w-full absolute top-0 opacity-75 z-50 flex items-center justify-center min-h-screen">
        <div  class="bg-white rounded-lg shadow-lg p-6 w-96 ">
            <h2 class="text-2xl font-semibold text-black mb-6">Add Course</h2>
            <form  class="space-y-4">
                <div>
                    <label for="courseTitle" class="block text-sm font-medium text-black">Course Title</label>
                    <input type="text" id="courseTitle" name="courseTitle" required
                        class="mt-1 block w-full rounded-md border-black shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="courseDescription" class="block text-sm font-medium text-black">Description</label>
                    <textarea id="courseDescription" name="courseDescription" rows="3"
                        class="mt-1 block w-full rounded-md border-black shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50"></textarea>
                </div>
                <div>
                    <label for="coursePrice" class="block text-sm font-medium text-black">Price ($)</label>
                    <input type="number" id="coursePrice" name="coursePrice" required min="0" step="0.01"
                        class="mt-1 block w-full rounded-md border-black shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-black">Course Image/Video</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-black border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-black">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-black">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end space-x-3">
                    <button type="button" id="cancelbtn"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg transition duration-200">
                        Cancel
                    </button>
                    <button type="submit" id="submitbtn"
                        class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                        Save Course
                    </button>
                </div>
            </form>
        </div>
    </div>


  <script>
    const addbtn = document.getElementById('addbtn');
    const cancelbtn = document.getElementById('cancelbtn');
    const courseForm = document.getElementById('courseForm');
    
    courseForm.style.display="none"
    addbtn.addEventListener('click',()=>{
        courseForm.style.display="block"
    });

    cancelbtn.addEventListener('click',()=>{
        courseForm.style.display='none';
    });
  </script>


</body>

</html>