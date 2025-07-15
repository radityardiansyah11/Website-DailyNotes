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

    <!-- head -->
    <aside class="flex flex-col w-full max-w-64 hidden md:block">
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
                        <a class="flex text-sm font-semibold gap-2 items-center  hover:bg-gray-200 rounded-md w-56 h-full p-2"
                            href="{{ route('dashboard') }}"><i class="far fa-list-alt text-md"></i>Dashboard</a>
                        <a class="flex text-sm font-semibold text-gray-600 gap-2 items-center text-gray-800 bg-gray-300 rounded-md w-56 h-full p-2"
                            href="{{ route('dasboardUser') }}"><i class="far fa-user text-md"></i>User Management</a>
                    </div>
                </nav>
            </div>

        </div>
    </aside>

    <!-- Data -->
    <div class="md:w-full h-full flex flex-col bg-white rounded-xl shadow-lg p-3 sm:p-4">
        <div class="flex flex-col gap-1 mb-7">
            <a class="text-2xl font-semibold">User Management</a>
            <a class="text-sm font-semibold text-gray-500">Manage your team member and their account permission
                here.</a>
        </div>

        <div class="flex gap-2 justify-between items-center mb-7">
            <div class="flex gap-2">
                <a class="text-xl font-semibold">All User</a>
                <a class="text-xl font-semibold text-gray-500">90</a>
            </div>

            <div class="flex gap-2">
                <input type="text" placeholder="Search"
                    class="w-full min-w-48 md:min-w-64 h-full md:p-2 rounded-xl border border-gray-300 placeholder:font-semibold placeholder:px-1">
                <button type="button"
                    class="w-full min-w-24 md:min-w-32 h-full md:p-2 rounded-xl bg-gradient-to-r from-red-600 to-orange-600 text-white font-semibold"
                    data-modal-target="modalAddUser" data-modal-toggle="modalAddUser"><i
                        class="fa fa-plus text-md me-2 text-normal"></i>Add
                    User</button>
            </div>
        </div>

        <!-- modal add user -->
        <div id="modalAddUser" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">

            <div class="relative w-full max-w-lg max-h-full p-4">

                <div class="relative bg-white rounded-2xl shadow-sm flex flex-col">
                    <a class="flex text-gray-900 font-semibold text-lg justify-center p-4">ADD USER</a>
                    <!-- main modal add user-->
                    <div class="relative flex flex-col gap-5 grid-cols-2 p-4 mb-4">
                        <div class="flex flex-col w-full">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">User Name</label>
                            <input type="text" placeholder="Username"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="pass" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input type="password" placeholder="Password"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                            <input type="text" placeholder="Email"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full gap-1">
                            <label for="acces" class="block mb-2 text-sm font-medium text-gray-700">Acces</label>
                            <div class="flex gap-5">
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Export
                                        Data</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Import
                                        Data</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-end bg-gradient-to-r from-red-600 to-orange-600 rounded-b-xl h-14 items-center p-4">
                        <button type="button" class="flex p-2 rounded-lg font-semibold text-white">Add User</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- user data -->
        <div class="flex h-full max-h-11 gap-2 bg-gray-100 p-2 px-4 rounded-xl items-center">
            <div class="flex gap-3 items-center w-3/5">
                <input type="checkbox" class="flex w-5 h-5 rounded-full accent-orange-600">
                <a class="flex text-sm text-gray-500 font-semibold">User name</a>
            </div>
            <div class="w-2/5">
                <a class="flex text-sm text-gray-500 font-semibold">Acces</a>
            </div>
            <div class="w-1/3">
                <a class="flex text-sm text-gray-500 font-semibold">Password</a>
            </div>
            <div class="w-1/4">
                <a class="flex text-sm text-gray-500 font-semibold">Last Active</a>
            </div>
            <div class="w-1/4">
                <a class="flex text-sm text-gray-500 font-semibold">Data Added</a>
            </div>
        </div>

        <div class="flex items-center p-2 px-4 py-4 border-b">
            <div class="flex items-center w-3/5 gap-3">
                <input type="checkbox" class="flex w-5 h-5 rounded-full accent-orange-600">
                <button id="profileButton" type="button" class="flex rounded-full focus:outline-none">
                    <img alt="profile" class="rounded-full w-9 h-9 object-cover"
                        src="https://storage.googleapis.com/a1aa/image/778a18a0-4a4f-46b0-57e0-c4f3909279ce.jpg" />
                </button>
                <a class="flex text-sm text-gray-500 font-semibold">Contoh Nama Orang yang Panjank</a>
            </div>
            <div class="w-2/5 flex items-center gap-2">

                <a class="text-xs text-green-700 font-semibold border border-green-300 p-1 rounded-full">Import Data</a>
                <a class="text-xs text-purple-700 font-semibold border border-purple-300 p-1 rounded-full">Export
                    Data</a>
            </div>
            <div class="w-1/3">
                <a class="flex text-sm text-gray-500 font-semibold ms-2">ajbhfajshvdbekrhbb12 </a>
            </div>
            <div class="w-1/4">
                <a class="flex text-sm text-gray-500 font-semibold ms-3">Jan 4, 2025 </a>
            </div>
            <div class="w-1/4">
                <a class="flex text-sm text-gray-500 font-semibold ms-4">Mar 30, 2008</a>
            </div>
            <div class="flex">
                <button type="button" class="flex" id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay"
                    data-dropdown-delay="500" data-dropdown-trigger="hover">
                    <i class="fa fa-ellipsis-v text-md me-2 text-gray-500"></i>
                </button>
            </div>
        </div>

        <!-- Dropdown menu -->
        <div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-32">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDelayButton">
                <li>
                    <button type="button" data-modal-target="modalDetailUser" data-modal-toggle="modalDetailUser"
                        class="block px-4 py-2 hover:bg-gray-100">Detail User</button>
                </li>
                <li>
                    <button type="button" data-modal-target="modalEditUser" data-modal-toggle="modalEditUser"
                        class="block px-4 py-2 hover:bg-gray-100">Edit User</button>
                </li>
                <li>
                    <button type="button" data-modal-target="modalDeleteUser" data-modal-toggle="modalDeleteUser"
                        class="block px-4 py-2 hover:bg-gray-100">Delete Account</button>
                </li>
            </ul>
        </div>

        <!-- modal Detail USER -->
        <div id="modalDetailUser" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">

            <div class="relative w-full max-w-lg max-h-full p-4">

                <div class="relative bg-white rounded-2xl shadow-sm flex flex-col">
                    <a class="flex text-gray-900 font-semibold text-lg justify-center p-4">DETAIL USER</a>
                    <!-- main modal add user-->
                    <div class="relative flex flex-col gap-5 grid-cols-2 p-4 mb-4">
                        <div class="flex flex-col w-full">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">User Name</label>
                            <input type="text" placeholder="Username"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="pass" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input type="password" placeholder="Password"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                            <input type="text" placeholder="Email"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full gap-1">
                            <label for="acces" class="block mb-2 text-sm font-medium text-gray-700">Acces</label>
                            <div class="flex gap-5">
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Export
                                        Data</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Import
                                        Data</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-end bg-gradient-to-r from-red-600 to-orange-600 rounded-b-xl h-14 items-center p-4">
                        <button type="button" class="flex p-2 rounded-lg font-semibold text-white">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal Edit USER -->
        <div id="modalEditUser" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">

            <div class="relative w-full max-w-lg max-h-full p-4">

                <div class="relative bg-white rounded-2xl shadow-sm flex flex-col">
                    <a class="flex text-gray-900 font-semibold text-lg justify-center p-4">EDIT USER</a>
                    <!-- main modal add user-->
                    <div class="relative flex flex-col gap-5 grid-cols-2 p-4 mb-4">
                        <div class="flex flex-col w-full">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">User Name</label>
                            <input type="text" placeholder="Username"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="pass" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input type="password" placeholder="Password"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                            <input type="text" placeholder="Email"
                                class="p-2 w-full rounded-lg border border-gray-200 focus:outline-none">
                        </div>
                        <div class="flex flex-col w-full gap-1">
                            <label for="acces" class="block mb-2 text-sm font-medium text-gray-700">Acces</label>
                            <div class="flex gap-5">
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Export
                                        Data</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="accesCheckbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                                    <label for="accesCheckbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Import
                                        Data</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-end bg-gradient-to-r from-red-600 to-orange-600 rounded-b-xl h-14 items-center p-4">
                        <button type="button" class="flex p-2 rounded-lg font-semibold text-white">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal delete user -->
        <div id="modalDeleteUser" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="p-4 w-112 max-h-full">
                        <div class="relative bg-white rounded-3xl shadow-sm">
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                    you sure you want to delete (nama user)?</h3>
                                <button data-modal-hide="trash-modal" type="button"
                                    class="text-white bg-gradient-to-r from-red-600 to-orange-600 font-medium rounded-3xl text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="trash-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium bg-gray-100 text-gray-600 focus:outline-none rounded-3xl">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>