<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full mt-8">
        <h1 class="text-2xl font-semibold mb-6">Create an Account</h1>
        <form action="{{ route('user_register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 mb-2">Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2">Email:</label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 mb-2">Password:</label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 mb-2">Mobile Number:</label>
                <input type="tel" id="phone" name="phone"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"  value="{{ old('phone') }}"
                    required>
                    @error('phone')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Register</button>
                
        </form>
    </div>

</body>

</html>
