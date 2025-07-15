<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CatatanHarian</title>
    <link rel="icon" href="images/logo-circle-gradient.png" type="image">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Archivo+Black&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100 min-h-screen md:h-screen flex p-3 sm:p-5">

    <aside class="flex flex-col w-full max-w-64">
        <div class="p-2">
            <div class="flex items-center gap-2">
                <div
                    class="w-9 h-9 rounded-full bg-gradient-to-r from-red-600 to-orange-600 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2l9 4.5v9l-9 4.5-9-4.5v-9L12 2z" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 22V12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="text-lg font-semibold text-[#1E1E2D]">Dashboard</span>
            </div>
            <div class="flex flex-col mt-6">
                <a class="text-xs font-semibold text-gray-500">GENERAL</a>
                <nav class="flex flex-col mt-3 justify-between">
                    <div class="flex flex-col">
                        <a class="flex text-sm font-semibold gap-2 items-center text-gray-800 bg-gray-300 rounded-md w-56 h-full p-2" href=""><i
                                class="far fa-list-alt text-md"></i>Dashboard</a>
                        <a class="flex text-sm font-semibold text-gray-600 gap-2 items-center hover:bg-gray-200 rounded-md w-56 h-full p-2" href=""><i
                                class="far fa-user text-md"></i>User Management</a>
                    </div>
                </nav>
            </div>

        </div>
    </aside>

    <div class="w-full h-full flex flex-col bg-white rounded-xl shadow-lg p-5 gap-5">
        <div class="flex flex-col gap-1">
            <a class="text-2xl font-semibold">Dashboard</a>
            <a class="text-sm font-semibold text-gray-500">Manage your database in here!</a>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>