<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Tour Manager</title>
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
                <p class="text-gray-500 mt-2">Tạo tài khoản mới</p>
            </div>

            <!-- Thông báo lỗi -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Họ tên -->
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="Nguyễn Văn A">
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="email@example.com">
                </div>

                <!-- Mật khẩu -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="Tối thiểu 6 ký tự">
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="Nhập lại mật khẩu">
                </div>

                <!-- Nút đăng ký -->
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    Đăng ký
                </button>
            </form>

            <!-- Link đăng nhập -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Đã có tài khoản?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">Đăng nhập ngay</a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-400 text-xs mt-6">&copy; {{ date('Y') }} Tour Manager. All rights reserved.</p>
    </div>
</body>

</html>
