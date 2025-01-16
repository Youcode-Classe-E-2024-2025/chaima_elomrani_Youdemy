<?php 
require_once __DIR__ . '/../models/Category.php';
$categori = new Category();
$categories = $categori->displayCategory(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Admin - Manage Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
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
                        <a href="users.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="category.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-th-large text-primary-500"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="tag.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-tags"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tags</span>
                        </a>
                    </li>
                    <li>
                        <a href="course.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-book"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Courses</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ml-64 flex-1">
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Manage Categories</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, Admin</span>
                    <button class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                        Logout
                    </button>
                </div>
            </header>
            <main class="p-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Category List</h2>
                        <button id="addbtn" class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                            Add New Category
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Name</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php 
                                foreach($categories as $category){
                                ?>
                                <tr>
                                    <td class="py-3 px-4"><?= $category['id']?></td>
                                    <td class="py-3 px-4"><?= $category['name']?></td>
                                    <td class="py-3 px-4">
                                        <form method="POST" action="http://localhost/index.php?action=deleteCategory">
                                        <input type="hidden" name="id" value="<?=$category['id']?>">
                                        <button  class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                   
                </div>
            </main>
              <!-- *******************add form *********************** -->
    <div id="categoryForm" class="fixed top-0 left-0 z-50 bg-black/25 w-full flex items-center justify-center min-h-screen">
    <div class="absolute top-[40%] left-[40%] items-center justify-center bg-white rounded-lg shadow-md p-6 w-96">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Category</h2>
        <form method="POST" action="http://localhost/index.php?action=addCategory" class="space-y-4">
            <div>
                <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" id="categoryName" placeholder="Enter category" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50">
            </div>
            <div class="flex items-center justify-end space-x-3">
                <button type="button" id="cancelbtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg transition duration-200">
                    Cancel
                </button>
                <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                    Save Category
                </button>
            </div>
        </form>
    </div>
        </div>
        
    </div>

    <script>
           const addbtn = document.getElementById('addbtn');
            const cancelbtn = document.getElementById('cancelbtn');
            const categoryForm = document.getElementById('categoryForm');

            categoryForm.style.display = "none"
            addbtn.addEventListener('click', () => {
                categoryForm.style.display = "block"
            });

            cancelbtn.addEventListener('click', () => {
                categoryForm.style.display = 'none';
            });
    </script>
</body>
</html>