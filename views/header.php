<header class="bg-white py-4 shadow-md fixed w-full z-50 sticky transition-all duration-300 ease-in-out" id="header"
        x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">
                <span class="gradient-text">Youdemy</span>
            </a>
            <nav class="hidden md:block" :class="{ 'py-2': scrolled, 'py-4': !scrolled }">
                <ul class="flex space-x-6">
                    <li><a href="?view=home" class="hover:text-primary transition">Home</a></li>
                    <li><a href="?view=catalogue" class="hover:text-primary transition">Courses</a></li>
                    <li><a href="?view=aboutus" class="hover:text-primary transition">aboutus</a></li>
                    <li><a href="?view=Help" class="hover:text-primary transition">Help</a></li>
                </ul>
            </nav>
            <div class="hidden md:flex space-x-4">
                <a href="index.php?action=SignupForm"
                    class="bg-primary text-white px-4 py-2 rounded-full hover:bg-indigo-600 transition transform hover:scale-105">Sign
                    up </a>
                <a href="index.php?action=loginForm"
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
