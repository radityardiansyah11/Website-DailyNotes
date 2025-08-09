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
                        <a class="flex text-sm font-semibold gap-2 items-center text-gray-700 bg-gray-200 rounded-md w-56 h-full p-2"
                            href="{{ route('dashboard') }}"><i class="far fa-list-alt text-md"></i>Dashboard</a>
                        <a class="flex text-sm font-semibold text-gray-500 gap-2 items-center hover:bg-gray-200 rounded-md w-56 h-full p-2"
                            href="{{ route('dashboardUser') }}"><i class="far fa-user text-md"></i>User Management</a>
                    </div>
                </nav>
            </div>

        </div>
    </aside>

    <div class="md:w-full h-full flex flex-col bg-white rounded-xl shadow-lg p-3 sm:p-4 overflow-y-auto no-scrollbar">
        <div class="flex flex-col gap-1 mb-7">
            <a class="text-2xl font-semibold">Dashboard Management</a>
            <a class="text-sm font-semibold text-gray-500">Manage your database in here.</a>
        </div>

        <!-- Section: Summary Cards -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 h-32 note-item opacity-0 translate-y-4 transition-all duration-500">
            <div class="bg-gradient-to-r from-orange-400 to-orange-500 p-4 rounded-xl shadow-md">
                <p class="text-md text-white">Today Note Added</p>
                <h2 class="text-2xl font-bold text-white">5</h2>
            </div>
            <div class="bg-gradient-to-r from-purple-400 to-purple-500 p-4 rounded-xl shadow-md">
                <p class="text-md text-white">Notes Count</p>
                <h2 class="text-2xl font-bold text-white">{{ $noteCount }}</h2>
            </div>
            <div class="bg-gradient-to-r from-blue-400 to-blue-500 p-4 rounded-xl shadow-md">
                <p class="text-md text-white">Archived Notes</p>
                <h2 class="text-2xl font-bold text-white">{{ $archivedCount }}</h2>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 p-4 rounded-xl shadow-md">
                <p class="text-md text-white">Users Count</p>
                <h2 class="text-2xl font-bold text-white">{{ $userCount }}</h2>
            </div>
        </div>

        <!-- Section: Catatan Terbaru -->
        <div class="mt-6">
            <h3
                class="text-lg font-semibold text-[#1E1E2D] mb-3 note-item opacity-0 translate-y-4 transition-all duration-500">
                New Notes</h3>
            <ul class="  gap-4 grid grid-cols-1 md:grid-cols-2">
                @forelse ($recentNotes as $note)
                    <li
                        class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 hover:shadow-md rounded-md p-3 flex justify-between items-center shadow-sm note-item opacity-0 translate-y-4 transition-all duration-500">
                        <div>
                            <p class="font-medium text-gray-800">Title Notes: {{ $note->title }}</p>
                            <p class="text-xs text-gray-500">Added at: {{ $note->created_at->format('d M Y') }}</p>
                        </div>
                        <a href="#" class="text-sm hover:font-semibold hover:underline-none text-gray-600 me-3"
                            data-modal-target="newNoteDashboard" data-modal-toggle="newNoteDashboard"
                            data-title="{{ $note->title }}" data-content="{{ $note->content }}"
                            data-created="{{ $note->created_at->format('d M Y') }}">View</a>
                    </li>
                @empty
                    <li class="text-sm text-gray-500">Belum ada catatan</li>
                @endforelse
            </ul>
        </div>

        <!-- modal view notes new -->
        <div id="newNoteDashboard" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
            <div class="relative p-4 w-full max-w-xl">
                <div class="relative bg-white rounded-3xl shadow-sm max-h-[90vh] flex flex-col overflow-y-auto ">
                    <!-- Body -->
                    <div class="p-3 md:p-4 overflow-y-auto max-h-screen no-scrollbar">
                        <textarea id="modalNewTitle" rows="1" placeholder="Title"
                            class="w-full  p-4 text-xl rounded-t-2xl bg-gray-100 placeholder:text-xl focus:outline-none"></textarea>
                        <textarea id="modalNewContent" placeholder="Text"
                            class="w-full p-4 text-md bg-gray-100 placeholder:text-md focus:outline-none no-scrollbar"></textarea>
                    </div>
                    <!-- Footer -->
                    <div
                        class="flex items-center justify-between px-5 py-4 bg-gradient-to-r from-red-600 to-orange-600 rounded-b-3xl">
                        <p class="text-xs text-white" id="modalNewCreated"></p>
                        <button id="" type="button"
                            class="bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2 rounded-lg transition">
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Aksi Cepat -->
        <div class="mt-6">
            <h3
                class="text-lg font-semibold text-[#1E1E2D] mb-3 note-item opacity-0 translate-y-4 transition-all duration-500">
                View </h3>
            <div class="flex gap-3 flex-wrap note-item opacity-0 translate-y-4 transition-all duration-500">
                <a href=""
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-400 to-blue-500 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-gray-300 transition shadow-sm">
                    <i class="fas fa-list"></i> View All Notes
                </a>
                <a href=""
                    class="flex items-center gap-2 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-500 text-sm font-medium px-4 py-2 rounded-md hover:from-blue-400 hover:to-blue-500 hover:text-white transition">
                    <i class="fas fa-archive"></i> View All Archive
                </a>
            </div>

            <!-- note -->
            <ul class="gap-4 grid grid-cols-1 md:grid-cols-2 mt-6">
                @forelse ($allNotes as $note)
                    <li
                        class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 hover:shadow-md rounded-md p-3 flex justify-between items-center shadow-sm note-item opacity-0 translate-y-4 transition-all duration-500">
                        <div>
                            <p class="font-medium text-gray-800">Title Notes: {{ $note->title }}</p>
                            <p class="text-xs text-gray-500">Added at: {{ $note->created_at->format('d M Y') }}</p>
                        </div>
                        <a href="#" class="text-sm hover:font-semibold text-gray-600 hover:underline me-3"
                            data-modal-target="noteDashboard" data-modal-toggle="noteDashboard"
                            data-title="{{ $note->title }}" data-content="{{ $note->content }}"
                            data-created="{{ $note->created_at->format('d M Y') }}">View</a>
                    </li>
                @empty
                    <li class="text-sm text-gray-500">Belum ada catatan</li>
                @endforelse
            </ul>

            <div id="noteDashboard" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
                <div class="relative p-4 w-full max-w-xl">
                    <div class="relative bg-white rounded-3xl shadow-sm max-h-[90vh] flex flex-col overflow-y-auto ">
                        <!-- Body -->
                        <div class="p-3 md:p-4 overflow-y-auto max-h-screen no-scrollbar">
                            <textarea id="textAreaNoteHead" rows="1" placeholder="Title"
                                class="w-full  p-4 text-xl rounded-t-2xl bg-gray-100 placeholder:text-xl focus:outline-none"></textarea>
                            <textarea id="textAreaNoteContent" placeholder="Text"
                                class="w-full p-4 text-md bg-gray-100 placeholder:text-md focus:outline-none no-scrollbar"></textarea>
                        </div>
                        <!-- Footer -->
                        <div
                            class="flex items-center justify-between px-5 py-4 bg-gradient-to-r from-red-600 to-orange-600 rounded-b-3xl">
                            <p class="text-xs text-white" id="createNote">created at {{ $note->created_at->format('d M Y') }}
                                {{-- {{$note->updated_at}} --}}
                            </p>
                            <button id="" type="button"
                                class="bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2 rounded-lg transition">
                                Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
