<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Tour Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo / Title -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">🌍 Tour Manager</h1>
                <p class="text-gray-500 mt-2">Đăng nhập vào hệ thống</p>
            </div>

            <!-- Thông báo lỗi -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Thông báo thành công -->
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="admin@tour.com">
                </div>

                <!-- Mật khẩu -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="••••••••">
                </div>

                <!-- Remember me -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
                    </label>
                </div>

                <!-- Nút đăng nhập -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    Đăng nhập
                </button>
            </form>

            <!-- Link đăng ký -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Chưa có tài khoản?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">Đăng ký ngay</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-400 text-xs mt-6">&copy; {{ date('Y') }} Tour Manager. All rights reserved.</p>
    </div>
</body>

</html>
