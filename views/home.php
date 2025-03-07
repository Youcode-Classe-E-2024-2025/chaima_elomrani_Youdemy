<?php require_once('./config/connexion.php') ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Revolutionary Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="./styles/home.css">
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

<body class="bg-background text-gray-800 font-sans" x-data="{ mobileMenuOpen: false }">
    <header class="bg-white py-4 shadow-md fixed w-full z-50 transition-all duration-300 ease-in-out" id="header"
        x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">
                <span class="gradient-text">Youdemy</span>
            </a>
            <nav class="hidden md:block" :class="{ 'py-2': scrolled, 'py-4': !scrolled }">
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:text-primary transition">Home</a></li>
                    <li><a href="#courses" class="hover:text-primary transition">Courses</a></li>
                    <li><a href="#features" class="hover:text-primary transition">Features</a></li>
                    <li><a href="#community" class="hover:text-primary transition">Community</a></li>
                </ul>
            </nav>
            <div class="hidden md:flex space-x-4">
                <a href="?action=SignupForm"
                    class="bg-primary text-white px-4 py-2 rounded-full hover:bg-indigo-600 transition transform hover:scale-105">Sign
                    up </a>
                <a href="?action=loginForm"
                    class="bg-secondary text-white px-4 py-2 rounded-full hover:bg-green-600 transition transform hover:scale-105">log
                    in</a>
            </div>
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-white py-2 px-4">
            <ul class="space-y-2">
                <li><a href="#" class="block hover:text-primary transition" @click="mobileMenuOpen = false">Home</a>
                </li>
                <li><a href="#courses" class="block hover:text-primary transition"
                        @click="mobileMenuOpen = false">Courses</a></li>
                <li><a href="#features" class="block hover:text-primary transition"
                        @click="mobileMenuOpen = false">Features</a></li>
                <li><a href="#community" class="block hover:text-primary transition"
                        @click="mobileMenuOpen = false">Community</a></li>
            </ul>
            <div class="mt-4 space-y-2">
                <a href="?view=signup"
                    class="block bg-primary text-white px-4 py-2 rounded-full hover:bg-indigo-600 transition text-center">Sign
                    In</a>
                <a href="?view=login"
                    class="block bg-secondary text-white px-4 py-2 rounded-full hover:bg-green-600 transition text-center">log in</a>
            </div>
        </div>
    </header>

    <main>
        <section class="pt-32 pb-20 bg-gradient-to-br from-indigo-50 via-white to-green-50">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 leading-tight">
                        Revolutionize Your <span class="gradient-text">Learning Journey</span>
                    </h1>
                    <p class="text-xl mb-10 text-gray-600">Discover a world of interactive and personalized courses
                        tailored for both students and teachers.</p>
                    <a href="index.php?action=catalogue"
                        class="bg-primary text-white text-lg px-8 py-3 rounded-full hover:bg-indigo-600 transition transform hover:scale-105 inline-block">Explore
                        Courses</a>
                </div>
                <div class="md:w-1/2">
                    <img src="./images/first.png" alt="Learning Illustration" class="  ">
                </div>
            </div>
        </section>

        <section id="courses" class="py-20" x-data="{ activeTab: 'all' }">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-12 text-center text-gray-900">Featured Courses</h2>
                <div class="flex justify-center mb-8">
                    <button @click="activeTab = 'all'"
                        :class="{ 'bg-primary text-white': activeTab === 'all', 'bg-gray-200 text-gray-700': activeTab !== 'all' }"
                        class="px-4 py-2 rounded-l-full transition">All</button>
                    <button @click="activeTab = 'web'"
                        :class="{ 'bg-primary text-white': activeTab === 'web', 'bg-gray-200 text-gray-700': activeTab !== 'web' }"
                        class="px-4 py-2 transition">Web Development</button>
                    <button @click="activeTab = 'data'"
                        :class="{ 'bg-primary text-white': activeTab === 'data', 'bg-gray-200 text-gray-700': activeTab !== 'data' }"
                        class="px-4 py-2 transition">Data Science</button>
                    <button @click="activeTab = 'marketing'"
                        :class="{ 'bg-primary text-white': activeTab === 'marketing', 'bg-gray-200 text-gray-700': activeTab !== 'marketing' }"
                        class="px-4 py-2 rounded-r-full transition">Marketing</button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div x-show="activeTab === 'all' || activeTab === 'web'"
                        class="bg-white rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                        <img src="./images/programming.jpg" alt="Web Development" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900">Web Development Masterclass</h3>
                            <p class="text-gray-600 mb-4">Learn the latest web technologies and build responsive
                                websites.</p>
                            <a href="#" class="text-primary hover:underline inline-flex items-center">
                                Learn More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div x-show="activeTab === 'all' || activeTab === 'data'"
                        class="bg-white rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                        <img src="./images/dataScience.png" alt="Data Science" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900">Data Science Fundamentals</h3>
                            <p class="text-gray-600 mb-4">Dive into the world of data analysis and machine learning.</p>
                            <a href="#" class="text-primary hover:underline inline-flex items-center">
                                Learn More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div x-show="activeTab === 'all' || activeTab === 'marketing'"
                        class="bg-white rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2">
                        <img src="./images/marcketing.jpg" alt="Digital Marketing" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900">Digital Marketing Strategies</h3>
                            <p class="text-gray-600 mb-4">Master the art of online marketing and grow your business.</p>
                            <a href="#" class="text-primary hover:underline inline-flex items-center">
                                Learn More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="py-20 bg-gradient-to-br from-white via-indigo-50 to-green-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center">
                    <div class="w-full lg:w-1/2 mb-10 lg:mb-0">
                        <h2 class="text-3xl font-bold mb-6 text-gray-900">Why Choose <span
                                class="gradient-text">Youdemy</span>?</h2>
                        <ul class="space-y-4">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-secondary mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Interactive and personalized learning experience</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-secondary mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Expert instructors from various fields</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-secondary mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Flexible learning schedule</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-secondary mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Diverse range of courses and topics</span>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <img src="./images/second.png" alt="Why Choose Youdemy" class="">
                    </div>
                </div>
            </div>
        </section>

        <section id="community" class="py-60">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-12 text-gray-900">Join Our Learning Community</h2>
                <div class="flex flex-wrap justify-center gap-8">
                    <div
                        class="w-full md:w-2/5 bg-white p-8 rounded-lg shadow-lg transition-all duration-300 hover:shadow-2xl">
                        <svg class="w-16 h-16 text-primary mx-auto mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">For Students</h3>
                        <p class="text-gray-600 mb-6">Access a wide range of courses and learn at your own pace.</p>
                        <a href="#"
                            class="bg-primary text-white px-6 py-2 rounded-full hover:bg-indigo-600 transition transform hover:scale-105 inline-block">Start
                            Learning</a>
                    </div>
                    <div
                        class="w-full md:w-2/5 bg-white p-8 rounded-lg shadow-lg transition-all duration-300 hover:shadow-2xl">
                        <svg class="w-16 h-16 text-secondary mx-auto mb-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        <h3 class="text-xl font-semibold mb-4 text-gray-900">For Teachers</h3>
                        <p class="text-gray-600 mb-6">Share your expertise and reach students worldwide.</p>
                        <a href="?view=signup"
                            class="bg-secondary text-white px-6 py-2 rounded-full hover:bg-green-600 transition transform hover:scale-105 inline-block">Start
                            Teaching</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once('footer.php') ?>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Intersection Observer for fade-in effect
        const fadeElems = document.querySelectorAll('.fade-in');
        const appearOptions = {
            threshold: 0,
            rootMargin: "0px 0px -100px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function (entries, appearOnScroll) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add('appear');
                    appearOnScroll.unobserve(entry.target);
                }
            });
        }, appearOptions);

        fadeElems.forEach(elem => {
            appearOnScroll.observe(elem);
        });
    </script>
</body>

</html>