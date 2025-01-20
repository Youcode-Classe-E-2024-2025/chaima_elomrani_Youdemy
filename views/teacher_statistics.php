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
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r text-black bg-clip-text">
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
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Course Inscriptions</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Course Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Total Inscriptions</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Pending Approvals</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4 px-6 border-b border-grey-light">Introduction to Web Development</td>
                            <td class="py-4 px-6 border-b border-grey-light">256</td>
                            <td class="py-4 px-6 border-b border-grey-light">5</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                    Manage
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 border-b border-grey-light">Advanced JavaScript Techniques</td>
                            <td class="py-4 px-6 border-b border-grey-light">189</td>
                            <td class="py-4 px-6 border-b border-grey-light">3</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                    Manage
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6 border-b border-grey-light">UI/UX Design Fundamentals</td>
                            <td class="py-4 px-6 border-b border-grey-light">312</td>
                            <td class="py-4 px-6 border-b border-grey-light">8</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                    Manage
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Inscription Management Modal -->
        <div id="inscriptionModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Manage Inscriptions: <span id="courseName"></span>
                        </h3>
                        <div class="mt-4">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-3 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Student Name</th>
                                        <th class="py-2 px-3 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                                        <th class="py-2 px-3 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="inscriptionTableBody">
                                    <!-- Inscription rows will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">
                            Close
                        </button>
                    </div>
                </div>
            </div>
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

        // Modal functionality
        function openModal(courseName) {
            document.getElementById('inscriptionModal').classList.remove('hidden');
            document.getElementById('courseName').textContent = courseName;
            populateInscriptions(courseName);
        }

        function closeModal() {
            document.getElementById('inscriptionModal').classList.add('hidden');
        }

        function populateInscriptions(courseName) {
            const tableBody = document.getElementById('inscriptionTableBody');
            tableBody.innerHTML = '';

            // Dummy data - replace with actual data from your backend
            const inscriptions = [
                { name: 'John Doe', status: 'Pending' },
                { name: 'Jane Smith', status: 'Approved' },
                { name: 'Bob Johnson', status: 'Pending' },
            ];

            inscriptions.forEach(inscription => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="py-2 px-3 border-b border-grey-light">${inscription.name}</td>
                    <td class="py-2 px-3 border-b border-grey-light">${inscription.status}</td>
                    <td class="py-2 px-3 border-b border-grey-light">
                        ${inscription.status === 'Pending' ? `
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2" onclick="approveInscription('${inscription.name}')">
                                Approve
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="deleteInscription('${inscription.name}')">
                                Delete
                            </button>
                        ` : ''}
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        function approveInscription(studentName) {
            // Implement approval logic here
            alert(`Approved inscription for ${studentName}`);
            // Update the table after approval
            populateInscriptions(document.getElementById('courseName').textContent);
        }

        function deleteInscription(studentName) {
            // Implement deletion logic here
            alert(`Deleted inscription for ${studentName}`);
            // Update the table after deletion
            populateInscriptions(document.getElementById('courseName').textContent);
        }

        // Add event listeners to "Manage" buttons
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.trim() === 'Manage') {
                button.addEventListener('click', function() {
                    const courseName = this.closest('tr').querySelector('td:first-child').textContent;
                    openModal(courseName);
                });
            }
        });
    </script>
</body>
</html>