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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                <nav class="flex flex-col mt-6 space-y-5 px-6 text-sm">
                    <a class="flex items-center gap-3 text-md sm:p-1 text-gray-400 hover:text-gray-600"
                        href="{{ route('home') }}">
                        <i class="far fa-list-alt text-md"></i>
                        Notes
                    </a>
                    <a class="flex items-center gap-3 text-md sm:p-1 text-gray-400 hover:text-gray-600"
                        href="{{ route('archive') }}">
                        <i class="fa fa-archive text-md"></i>
                        Archive
                    </a>
                    <a class="flex items-center gap-3 text-md sm:p-1 text-gray-900" href="#">
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
                    <!-- PROFILE SECTION -->
                    <div class="relative">
                        <!-- Trigger Button -->
                        <button id="profileButton" type="button" class="flex rounded-full focus:outline-none">
                            <img alt="profile" class="rounded-full w-10 h-10 object-cover"
                                src="https://storage.googleapis.com/a1aa/image/778a18a0-4a4f-46b0-57e0-c4f3909279ce.jpg" />
                        </button>

                        <!-- Profile Modal -->
                        <div id="profileModal"
                            class="hidden p-4 absolute right-0 mt-4 w-96 min-h-full bg-gray-50 text-white rounded-2xl shadow-md z-50">

                            <div class="flex flex-col items-center px-6 pb-4">
                                <div class="relative w-20 h-20 rounded-full overflow-hidden">
                                    <img class="w-20 h-20 object-cover rounded-full border border-gray-500  "
                                        src="https://storage.googleapis.com/a1aa/image/778a18a0-4a4f-46b0-57e0-c4f3909279ce.jpg"
                                        alt="Profile image" />
                                </div>
                                <h2 class="mt-3 text-gray-900 text-xl font-normal font-semibold">Halo,
                                    {{ Auth::user()->name }}</h2>
                                <p class="flex text-sm text-gray-500">{{ Auth::user()->email }}</p>
                                <div class="flex flex-row gap-2 w-full">
                                    <button
                                        class="w-24 mt-4 flex-1 bg-gradient-to-r from-red-600 to-orange-600 rounded-full py-2 text-white text-sm font-semibold hover:bg-[#3c4043] focus:outline-none">
                                        Manage Account
                                    </button>
                                    <button type="button" data-modal-target="modalLogout"
                                        data-modal-toggle="modalLogout"
                                        class="w-24 mt-4 flex-1 bg-gradient-to-r from-red-600 to-orange-600 rounded-full py-2 text-white text-sm font-semibold hover:bg-[#3c4043] focus:outline-none">
                                        <i class="fas fa-sign-out-alt text-base"></i> Logout
                                    </button>
                                    </form>

                                </div>

                            </div>

                            <div class="pb-90 text-xs text-gray-400 flex justify-center gap-2">
                                <span>Kebijakan Privasi</span>
                                <span>•</span>
                                <span>Persyaratan Layanan</span>
                            </div>
                        </div>

                        <!-- modal logout-->
                        <div id="modalLogout" tabindex="-1" data-modal-placement="bottom-right"
                            class="hidden absolute z-50 right-0 rounded-3xl bg-white shadow-lg mt-80">
                            <div class="relative p-4 w-96 max-h-full">
                                <div class="p-4 md:p-5  text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                        you sure you want to logout?</h3>

                                    <div class="flex justify-center gap-2 mt-5">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button data-modal-hide="trash-modal" type="submit"
                                                class="text-white bg-gradient-to-r from-red-600 to-orange-600 font-medium rounded-3xl text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                        </form>

                                        <button id="cancelBtn" type="button" data-modal-hide="trash-modal"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium bg-gray-100 text-gray-600 focus:outline-none rounded-3xl">No,
                                            cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- content -->
            <section class="flex flex-col mt-2 md:mt-3">
                <div class="flex ">
                    txt coba
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
