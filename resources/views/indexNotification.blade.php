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
    <div class="w-full bg-white rounded-3xl flex flex-col md:flex-row overflow-hidden shadow-2xl h-full">

        <!-- sidebar -->
        <aside class="flex flex-col w-full md:w-60 bg-white shadow-md md:shadow-none h-full">
            <div class="p-4">
                <div class="flex items-center gap-2 px-4 py-4">
                    <div
                        class="w-7 h-7 rounded-full bg-gradient-to-r from-red-600 to-orange-600 flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2l9 4.5v9l-9 4.5-9-4.5v-9L12 2z" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 22V12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span class="text-lg font-semibold text-[#1E1E2D]">DailyNotes</span>
                </div>

                <nav class="flex flex-col mt-6 space-y-5 px-6 text-sm text-gray-400">
                    <a class="flex items-center gap-3 text-md sm:p-1 hover:text-gray-600" href="{{ route('index') }}">
                        <i class="far fa-list-alt text-md"></i>
                        Notes
                    </a>
                    <a class="flex items-center gap-3 text-md sm:p-1 hover:text-gray-600" href="{{ route('indexArchive') }}">
                        <i class="fa fa-archive text-md"></i>
                        Archive
                    </a>
                    <a class="flex items-center gap-3 text-md sm:p-1 text-gray-900" href="{{ route('indexNotification') }}">
                        <i class="fas fa-bell text-md"></i>
                        Notification
                    </a>
                </nav>
            </div>
        </aside>

        <!-- main content -->
        <main class="flex flex-1 flex-col p-4 sm:p-6 overflow-y-auto no-scrollbar">
            <!-- top section -->
            <section class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-4">
                <!-- Title & Input -->
                <div class="flex sm:flex-row flex-1 items-start sm:items-center gap-4">
                    <h1 class="text-md sm:text-2xl font-semibold">Notification</h1>
                    <input type="text"
                        class="w-full sm:w-48 md:w-64 lg:w-96 lg:h-10 bg-gray-100 rounded-3xl px-4 py-2 placeholder-gray-500 text-sm focus:outline-none"
                        placeholder="Search">
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    <!-- button add -->
                    <a type="button"
                        class="bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-600 hover:to-orange-700 text-white rounded-3xl px-5 py-2.5 text-sm font-medium"
                        href="{{ route('login') }}">Login</a>
                </div>
            </section>

            <!-- content -->
            <section class="flex flex-col">
                <div class="flex h-screen justify-center text-gray-400">
                    <a class="flex items-center font-semibold text-sm md:text-lg gap-3 ">
                        login to use more DailyNotes features
                        <i class="fa fa-smile-wink" aria-hidden="true"></i>
                    </a>
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>