<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Admin - Manage Tags</title>
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
            <?php require_once('admin_nav.php')?>
        </div>
        <div class="ml-64 flex-1">
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Manage Tags</h1>
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
                        <h2 class="text-xl font-semibold text-gray-800">Tag List</h2>
                        <button class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                            Add New Tag
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">ID</th>
                                    <th class="py-3 px-4 text-left">Name</th>
                                    <th class="py-3 px-4 text-left">Slug</th>
                                    <th class="py-3 px-4 text-left">Count</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="py-3 px-4">1</td>
                                    <td class="py-3 px-4">JavaScript</td>
                                    <td class="py-3 px-4">javascript</td>
                                    <td class="py-3 px-4">15</td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                        <button class="text-red-500 hover:text-red-700">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4">2</td>
                                    <td class="py-3 px-4">Python</td>
                                    <td class="py-3 px-4">python</td>
                                    <td class="py-3 px-4">12</td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                        <button class="text-red-500 hover:text-red-700">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more tag rows here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div>
                            <span class="text-gray-600">Showing 1 to 10 of 30 entries</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-600 font-semibold py-2 px-4 rounded-lg">Previous</button>
                            <button class="bg-primary-500 hover:bg-primary-600 text-white font-semibold py-2 px-4 rounded-lg">Next</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>