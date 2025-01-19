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
    <!-- Navbar -->
    <?php require_once('header.php') ?>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Course Card 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-video overflow-hidden">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BF3QTKFplhMeTNqly5rbVUIPEwM18c.png" alt="Course" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Qui veniam nostrud</h3>
                    <p class="text-gray-600 mb-4">Hic magna consequatu</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-sm font-medium">#mingo</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BF3QTKFplhMeTNqly5rbVUIPEwM18c.png" alt="Author" class="w-8 h-8 rounded-full mr-3">
                        <span class="text-sm text-gray-600">Lacey Gilbert</span>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
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