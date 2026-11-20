<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>
        
        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 font-bold">Login</button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register di sini</a></p>
    </div>
</body>
</html>