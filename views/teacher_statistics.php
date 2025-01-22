<?php
// session_start();
require_once __DIR__ . '/../models/Courses.php';
require_once __DIR__ . '/../models/inscriptions.php';


$cours = new Courses();
$courses = $cours->displayCourse();


$inscription = new Inscriptions();
$inscriptions = $inscription->getInscriptions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Statistics Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

<header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex w-full justify-start gap-[25%]">
                <h1 class="text-2xl font-bold bg-gradient-to-r text-black bg-clip-text">
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
                            <a href="index.php?action=statistic"
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

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Course Statistics Dashboard</h1>
    
    <!-- Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Total Courses</h2>
            <p class="text-3xl font-bold text-blue-600">12</p>
            <p class="text-sm text-gray-500 mt-2">↑ 2 from last month</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Total Students</h2>
            <p class="text-3xl font-bold text-green-600">1,234</p>
            <p class="text-sm text-gray-500 mt-2">↑ 56 from last month</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Pending Approvals</h2>
            <p class="text-3xl font-bold text-yellow-600">18</p>
            <p class="text-sm text-gray-500 mt-2">↓ 3 from yesterday</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Average Rating</h2>
            <p class="text-3xl font-bold text-purple-600">4.8</p>
            <p class="text-sm text-gray-500 mt-2">↑ 0.2 from last month</p>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Course Popularity</h2>
            <canvas id="coursePopularityChart"></canvas>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Student Growth</h2>
            <canvas id="studentGrowthChart"></canvas>
        </div>
    </div>

    <!-- Course Inscriptions Table -->
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Course Inscriptions</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Course Name</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Total Inscriptions</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Pending Approvals</th>
                            <th
                                class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($inscriptions as $inscription){?>
                         
                            <tr>
                                <td class="py-4 px-6 border-b border-grey-light"><?= htmlspecialchars($inscription['course_title']) ?></td>
                                <td class="py-4 px-6 border-b border-grey-light"><?= htmlspecialchars($inscription['student_id']) ?></td>
                                <td class="py-4 px-6 border-b border-grey-light">5</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <details>
                                        <summary
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                            Manage
                                        </summary>
                                        <div class="bg-white rounded-lg shadow-md p-6">
                                            <div class="flex justify-between items-center mb-6">
                                                <h2 class="text-xl font-semibold text-gray-800">User List</h2>

                                            </div>
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full bg-white">
                                                    <thead class="bg-gray-100">
                                                        <tr>
                                                            <th class="py-3 px-4 text-left">ID</th>
                                                            <th class="py-3 px-4 text-left">Name</th>
                                                            <th class="py-3 px-4 text-left">Email</th>
                                                            <th class="py-3 px-4 text-left">Role</th>
                                                            <th class="py-3 px-4 text-left">Status</th>
                                                            <th class="py-3 px-4 text-left">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-200">
                                                        <?php
                                                        foreach ($users as $user) {
                                                            ?>
                                                            <tr>
                                                                <td class="py-3 px-4"><?= $user['id'] ?></td>
                                                                <td class="py-3 px-4"><?= $user['name'] ?></td>
                                                                <td class="py-3 px-4"><?= $user['email'] ?></td>
                                                                <td class="py-3 px-4"><?= $user['role'] ?></td>
                                                                <td class="py-3 px-4"><span
                                                                        class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-sm"><?= $user['status'] ?></span>
                                                                </td>
                                                                <!-- <td class="py-3 px-[50px] gap-[10px] flex flex-row">    -->
                                                                <td
                                                                    class="px-4 py-4 whitespace-nowrap text-sm font-medium px-[50px] gap-[20px] flex flex-row">


                                                                    <?php if ($user['status'] !== 'active') { ?>
                                                                        <form
                                                                            action="http://<?= $_SERVER['HTTP_HOST'] ?>/index.php?action=aproveUser"
                                                                            method="POST">
                                                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                                            <button
                                                                                class="text-green-500 hover:text-green-700">Approve</button>
                                                                        </form>
                                                                    <?php } ?>

                                                                    <?php if ($user['status'] == 'active') { ?>
                                                                        <form
                                                                            action="http://<?= $_SERVER['HTTP_HOST'] ?>/index.php?action=SuspendUser"
                                                                            method="POST">
                                                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                                            <button
                                                                                class="text-orange-500 hover:text-orange-700">Suspend</button>
                                                                        </form>
                                                                    <?php } ?>


                                                                    <form method="POST"
                                                                        action="http://<?= $_SERVER['HTTP_HOST'] ?>/index.php?action=deleteUser">
                                                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                                        <button
                                                                            class="text-red-500 hover:text-red-700">Delete</button>
                                                                    </form>

                                                                </td>
                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </details>
                                </td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
</div>

<script>
    // Chart.js configurations
    const coursePopularityChart = new Chart(document.getElementById('coursePopularityChart'), {
        type: 'bar',
        data: {
            labels: ['Web Dev', 'JavaScript', 'UI/UX', 'Python', 'Data Science'],
            datasets: [{
                label: 'Number of Students',
                data: [256, 189, 312, 176, 98],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const studentGrowthChart = new Chart(document.getElementById('studentGrowthChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Total Students',
                data: [800, 950, 1100, 1178, 1220, 1234],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>