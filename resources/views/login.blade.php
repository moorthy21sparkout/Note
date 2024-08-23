<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h1 class="text-2xl font-semibold mb-6">Welcome Back</h1>
        <div class="mb-8">
            <h2 class="text-xl font-medium mb-4">Login</h2>
            <form action="{{ url('/login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="login-email" class="block text-gray-700 mb-2">Email:</label>
                    <input type="email" id="login-email" name="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="login-password" class="block text-gray-700 mb-2">Password:</label>
                    <input type="password" id="login-password" name="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Login</button>
            </form>
        </div>

        <div class="text-center">
            <p class="text-gray-600 mb-4">Don't have an account?</p>
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register Here</a>
        </div>
    </div>
</body>

</html>
