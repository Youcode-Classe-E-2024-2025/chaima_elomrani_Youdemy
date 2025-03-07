
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./styles/login.css">
    <title>Youdemy - Learn Anything, Anytime</title>
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

<body>
    <header class="bg-white py-4 shadow-md fixed w-full z-50 transition-all duration-300 ease-in-out" id="header"
        x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">
                <span class="gradient-text">Youdemy</span>
            </a>
        </div>
    </header>

    <main>
        <div class="container">
            <div id="login-page" class="page">
           
               <div class="form-container"> 
                <h1><span class="gradient-text">Log in</span></h1>
                    <form id="login-form" action="?action=login" method="POST">
                        <div class="form-group">
                            <label for="login-email">Email</label>
                            <input name="email" type="email" id="login-email" required>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input name="password" type="password" id="login-password" required>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                    <div class="form-footer">
                        <p>Don't have an account? <a href="./view/signup.php" class="signup-link">Sign up</a></p>
                    </div>
                </div>
            </div>


        
    </main>

    <footer class="bg-gray-100 py-10">
        <div class="border-t border-gray-200 mt-10 pt-6 text-center">
            <p class="text-gray-600">&copy; 2023 Youdemy. All rights reserved.</p>
        </div>
        </div>
    </footer>


</body>

</html>