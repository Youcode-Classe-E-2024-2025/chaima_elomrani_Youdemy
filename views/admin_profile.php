<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</head>
<body class="bg-gray-50">
   

    <div id="adminProfile" class="profile-section min-h-screen">
        <div class="bg-gradient-to-r from-primary to-secondary text-white py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="relative">
                        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-BF3QTKFplhMeTNqly5rbVUIPEwM18c.png" alt="Admin" class="w-32 h-32 rounded-full border-4 border-white shadow-xl">
                        <span class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></span>
                    </div>
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-bold">John Administrator</h1>
                        <p class="text-lg opacity-90">System Administrator</p>
                        <div class="flex gap-4 mt-4">
                            <button class="bg-white text-primary px-4 py-2 rounded-lg hover:bg-gray-100 transition-all">
                                <i class="fas fa-edit mr-2"></i>Edit Profile
                            </button>
                            <button class="bg-white/20 text-white px-4 py-2 rounded-lg hover:bg-white/30 transition-all">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </button>
                        </div>
                    </div>
                    <div class="md:ml-auto flex gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold">152</div>
                            <div class="text-sm opacity-90">Active Users</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">45</div>
                            <div class="text-sm opacity-90">Courses</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">89%</div>
                            <div class="text-sm opacity-90">System Health</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">System Overview</h2>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600">CPU Usage</div>
                            <div class="text-lg font-bold text-gray-900">45%</div>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600">Memory</div>
                            <div class="text-lg font-bold text-gray-900">6.2GB</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Recent Activities</h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium">Users Number</div>
                                <div class="text-xs text-gray-500">+22 user</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium"> Approved Teachers</div>
                                <div class="text-xs text-gray-500">+10 teacher</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center text-red-600">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium">Pended Users</div>
                                <div class="text-xs text-gray-500">3 users</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <button class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all text-center">
                            <i class="fas fa-user-plus text-2xl text-primary mb-2"></i>
                            <div class="text-sm font-medium">Add User</div>
                        </button>
                        <button class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all text-center">
                            <i class="fas fa-cog text-2xl text-primary mb-2"></i>
                            <div class="text-sm font-medium">Settings</div>
                        </button>
                        <button class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all text-center">
                            <i class="fas fa-database text-2xl text-primary mb-2"></i>
                            <div class="text-sm font-medium">Backup</div>
                        </button>
                        <button class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-all text-center">
                            <i class="fas fa-chart-bar text-2xl text-primary mb-2"></i>
                            <div class="text-sm font-medium">Reports</div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">System Status</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium">Server Uptime</span>
                            <span class="text-sm text-green-600">99.9%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-green-600 h-2.5 rounded-full" style="width: 99.9%"></div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm font-medium">Database Health</span>
                            <span class="text-sm text-blue-600">95%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 95%"></div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm font-medium">Storage Usage</span>
                            <span class="text-sm text-yellow-600">75%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-yellow-600 h-2.5 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Recent System Logs</h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                            <div class="text-xs text-gray-500">10:45 AM</div>
                            <div class="text-sm">System backup completed successfully</div>
                            <div class="ml-auto">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Success</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                            <div class="text-xs text-gray-500">09:30 AM</div>
                            <div class="text-sm">New security patch installed</div>
                            <div class="ml-auto">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Update</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                            <div class="text-xs text-gray-500">08:15 AM</div>
                            <div class="text-sm">High CPU usage detected</div>
                            <div class="ml-auto">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Warning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    </html>
    