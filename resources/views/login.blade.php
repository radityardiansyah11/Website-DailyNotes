<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CatatanHarian</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Archivo+Black&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-200 min-h-screen flex justify-center items-center items-center p-3 sm:p-5 ">

    <div
        class="w-full flex items-center justify-center max-w-[1400px] h-[650px] rounded-3xl bg-custom-login shadow-xl p-4">

        <!-- login -->

        <form id="loginForm" method="POST" action="/login"
            class="flex flex-col w-full justify-center h-full max-h-[500px] max-w-md rounded-3xl bg-white/10 border border-white/20 p-4 text-white px-16">
            @csrf
            <a class="flex justify-center text-2xl font-semibold my-4">Login</a>
            <div class="w-full max-w-xl mb-3">
                <a class="flex flex-col text-white mb-1 ms-1">Email</a>
                <input type="text" placeholder="Email" name="email"
                    class="flex w-full max-w-xs h-10 bg-white rounded-lg p-3 text-gray-900 focus:outline-none">
            </div>
            <div class="w-full flex flex-col items-start max-w-xl">
                <a class="flex flex-col text-white mb-1 ms-1">Password</a>
                <input type="password" placeholder="Password" name="password"
                    class="flex w-full max-w-xs h-10 bg-white rounded-lg p-3 text-gray-900 focus:outline-none">
            </div>
            <a class="flex justify-start text-xs mt-1 ms-1">Forgot Password?</a>
            <button type="submit"
                class="flex w-full h-10 bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-600 hover:to-orange-700 justify-center items-center rounded-lg font-semibold mt-4">
                Sign In
            </button>
            <a class="flex justify-center text-sm my-4">or continue with</a>
            <div class="flex justify-center gap-3  ">
                <button type="button"
                    class="flex w-full h-10 bg-white rounded-lg justify-center text-gray-900 items-center">
                    <i class="fab fa-google text-base"></i>
                </button>
                <button type="button"
                    class="flex w-full h-10 bg-white rounded-lg justify-center text-gray-900 items-center">
                    <i class="fab fa-github  text-base"></i>
                </button>
                <button type="button"
                    class="flex w-full h-10 bg-white rounded-lg justify-center text-gray-900 items-center">
                    <i class="fab fa-facebook text-base"></i>
                </button>
            </div>
            <div class="flex justify-center gap-1">
                <a class="flex justify-center text-sm my-4">dont have account?</a>
                <button type="button" id="showRegisterBtn"
                    class="flex justify-center text-sm my-4 font-semibold">register here</button>
            </div>

        </form>

        <!-- register -->
        <form id="registerForm" method="POST" action="/register"
            class="hidden flex flex-col w-full justify-center h-full max-h-[500px] max-w-md rounded-3xl bg-white/10 border border-white/20 p-4 text-white px-16">
            @csrf
            <a class="flex justify-center text-2xl font-semibold my-4">Register</a>
            <div class="w-full max-w-xl mb-3">
                <a class="flex flex-col text-white mb-1 ms-1">Username</a>
                <input type="text" placeholder="Username" name="name"
                    class="flex w-full max-w-xs h-10 bg-white rounded-lg p-3 text-gray-900 focus:outline-none">
            </div>
            <div class="w-full max-w-xl mb-3">
                <a class="flex flex-col text-white mb-1 ms-1">Email</a>
                <input type="text" placeholder="Email" name="email"
                    class="flex w-full max-w-xs h-10 bg-white rounded-lg p-3 text-gray-900 focus:outline-none">
            </div>
            <div class="w-full flex flex-col items-start max-w-xl">
                <a class="flex flex-col text-white mb-1 ms-1">Password</a>
                <input type="password" placeholder="Password" name="password"
                    class="flex w-full max-w-xs h-10 bg-white rounded-lg p-3 text-gray-900 focus:outline-none">
            </div>
            <button type="submit"
                class="flex w-full h-10 bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-600 hover:to-orange-700 justify-center items-center rounded-lg font-semibold mt-8">
                Sign Up
            </button>
            <div class="flex justify-center gap-1 mb-4">
                <a class="flex justify-center text-sm my-4">you have account?</a>
                <button type="button" id="showLoginBtn" class="flex justify-center text-sm my-4 font-semibold">login
                    here</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
