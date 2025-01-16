<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Suspended - Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'support': {
                            from: '#8B5CF6',
                            to: '#6366F1'
                        },
                        'home': '#10B981'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-900 text-center mb-4">
            Account Suspended
        </h1>
        
        <p class="text-gray-600 text-center mb-8">
            Your account has been suspended. Please contact support for more information. If you are a teacher, please wait until the admin approves your account.
        </p>

        <div class="space-y-4">
            <button class="w-full py-3 px-4 rounded-xl font-medium text-white bg-gradient-to-r from-support-from to-support-to hover:opacity-90 transition-opacity">
                Contact Support
            </button>
            
            <button class="w-full py-3 px-4 rounded-xl font-medium text-white bg-home hover:opacity-90 transition-opacity">
                Return Home
            </button>
        </div>
    </div>
</body>
</html>