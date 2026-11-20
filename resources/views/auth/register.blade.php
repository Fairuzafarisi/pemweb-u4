<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Register Akun Baru</h2>

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded text-sm">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 font-bold">Daftar</button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login di sini</a></p>
    </div>
</body>
</html>