<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/signup.css">
    <title>Sign Up - Youdemy</title>
  
</head>
<body>
    <header>
        <div class="container">
            <a href="index.html" class="text-2xl font-bold text-gray-800">
                        <span class="gradient-text">Youdemy</span>
            </a>
        </div>
    </header>
    <main>
        <div class="form-container">
            <h1><span class="gradient-text">Sign Up</span></h1>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
            <div class="form-footer">
                <p>Already have an account? <a href="?view=login">Log in</a></p>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Youdemy. All rights reserved.</p>
    </footer>
</body>
</html>
