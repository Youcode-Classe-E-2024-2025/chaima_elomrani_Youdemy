<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Tableau de Bord Étudiant</h1>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="relative">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-full cursor-pointer"
                            id="profileDropdown">
                        <div id="dropdownMenu"
                            class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Paramètres</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Déconnexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Cours Suivis</h2>
                <p class="text-3xl font-bold text-blue-600">12</p>
                <p class="text-sm text-gray-500 mt-2">↑ 2 depuis le mois dernier</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Progression Moyenne</h2>
                <p class="text-3xl font-bold text-green-600">75%</p>
                <p class="text-sm text-gray-500 mt-2">↑ 5% depuis le mois dernier</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Notifications</h2>
                <p class="text-3xl font-bold text-yellow-600">3</p>
                <p class="text-sm text-gray-500 mt-2">Nouvelles notifications</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Cours Recommandés</h2>
                <p class="text-3xl font-bold text-purple-600">5</p>
                <p class="text-sm text-gray-500 mt-2">Basé sur vos intérêts</p>
            </div>
        </div>

        <!-- Cours Suivis -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Cours Suivis</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Course Card -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Introduction à la Programmation</h3>
                    <p class="text-sm text-gray-600 mb-4">Apprenez les bases de la programmation en Python.</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 60%;"></div>
                    </div>
                    <p class="text-sm text-gray-500">60% complété</p>
                </div>
                <!-- Course Card -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-4">
                    <h3 class="text-lg font-semibold text-gray-800">UI/UX Design</h3>
                    <p class="text-sm text-gray-600 mb-4">Concevez des interfaces utilisateur intuitives.</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%;"></div>
                    </div>
                    <p class="text-sm text-gray-500">45% complété</p>
                </div>
                <!-- Course Card -->
                <div class="bg-gray-50 rounded-lg shadow-sm p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Data Science</h3>
                    <p class="text-sm text-gray-600 mb-4">Maîtrisez les outils de la science des données.</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 80%;"></div>
                    </div>
                    <p class="text-sm text-gray-500">80% complété</p>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Notifications Récentes</h2>
            <div class="space-y-4">
                <!-- Notification -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-bell text-blue-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-md font-medium text-gray-800">Nouveau cours disponible</h3>
                        <p class="text-sm text-gray-600">"Introduction à l'Intelligence Artificielle" est maintenant
                            disponible.</p>
                        <p class="text-xs text-gray-500">Il y a 2 heures</p>
                    </div>
                </div>
                <!-- Notification -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-comment text-green-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-md font-medium text-gray-800">Nouveau message</h3>
                        <p class="text-sm text-gray-600">Vous avez reçu un message de votre instructeur.</p>
                        <p class="text-xs text-gray-500">Il y a 1 jour</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommandations -->
       

        <!-- Profil -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Profil</h2>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="name" name="name" value="John Doe"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="john.doe@example.com"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea id="bio" name="bio" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">Étudiant passionné par la technologie.</textarea>
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Mettre à jour</button>
            </form>
        </div>
    </main>

    <!-- Script for Dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileDropdown = document.getElementById('profileDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');

            profileDropdown.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!profileDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>