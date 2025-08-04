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
                        <a class="flex text-sm font-semibold gap-2 items-center text-gray-500 hover:bg-gray-200 rounded-md w-56 h-full p-2"
                            href="{{ route('dashboard') }}"><i class="far fa-list-alt text-md"></i>Dashboard</a>
                        <a class="flex text-sm font-semibold text-gray-600 gap-2 items-center text-gray-700 bg-gray-200 rounded-md w-56 h-full p-2"
                            href="{{ route('dashboardUser') }}"><i class="far fa-user text-md"></i>User Management</a>
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
                <a class="text-xl font-semibold text-gray-500">{{ $userCount }}</a>
            </div>

            <div class="flex gap-2">
                <input type="text" placeholder="Search" id="userSearchInput"
                    class="w-full min-w-48 md:min-w-64 h-full md:p-2 rounded-xl border border-gray-300 placeholder:font-semibold placeholder:px-1 focus:outline-none shadow-sm">
                <button type="button" data-modal-target="modalAddUser" data-modal-toggle="modalAddUser"
                    class="w-full min-w-24 md:min-w-32 h-full md:p-2 rounded-xl bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 hover:shadow-lg text-white font-semibold shadow-md"><i
                        class="fa fa-plus text-md me-2 text-normal" href="#"></i>Add
                    User</button>
            </div>
        </div>

        <!-- modal add user -->
        <div id="modalAddUser" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black/30">

            <div class="relative w-full max-w-lg mx-auto my-auto p-4">

                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="bg-white rounded-2xl shadow-lg">
                        <!-- Header -->
                        <div class="text-center border-b p-5">
                            <h2 class="text-lg font-semibold text-gray-800">ADD NEW USER</h2>
                        </div>

                        <!-- Body -->
                        <div class="p-6 grid gap-5">
                            <!-- Username -->
                            <div class="flex flex-col">
                                <label for="addName" class="mb-1 text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="name" id="addName" placeholder="Masukkan nama"
                                    class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                                    required>
                            </div>

                            <!-- Password -->
                            <div class="flex flex-col">
                                <label for="addPassword" class="mb-1 text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="addPassword" placeholder="Masukkan password"
                                    class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="flex flex-col">
                                <label for="addEmail" class="mb-1 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="addEmail" placeholder="Masukkan email"
                                    class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                                    required>
                            </div>

                            <!-- Access Roles -->
                            <div class="flex flex-col">
                                <label class="mb-1 text-sm font-medium text-gray-700">Acces</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="admin"
                                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                        <span class="ml-2 text-sm text-gray-700">Admin</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="export"
                                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                        <span class="ml-2 text-sm text-gray-700">Export Data</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="import"
                                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                        <span class="ml-2 text-sm text-gray-700">Import Data</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div
                            class="flex justify-end bg-gradient-to-r from-red-600 to-orange-600 rounded-b-2xl px-6 py-3">
                            <button type="submit"
                                class="text-white bg-white/10 hover:bg-white/20 px-5 py-2 rounded-lg font-semibold transition">
                                Add User
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


        <!-- user data -->
        <div
            class="flex h-full max-h-11 gap-2 bg-gray-100 p-2 px-4 rounded-xl items-center bg-gradient-to-b from-gray-100 to-gray-200 shadow-sm">
            <div class="flex gap-3 items-center w-2/5">
                <input type="checkbox" class="flex w-5 h-5 rounded-full accent-orange-600">
                <a class="flex text-sm text-gray-500 font-semibold">User name</a>
            </div>
            <div class="w-2/5">
                <a class="flex text-sm text-gray-500 font-semibold">Acces</a>
            </div>
            <div class="w-1/3">
                <a class="flex text-sm text-gray-500 font-semibold">Email</a>
            </div>
            <div class="w-1/3">
                <a class="flex text-sm text-gray-500 font-semibold">Password</a>
            </div>
            <div class="w-1/5">
                <a class="flex text-sm text-gray-500 font-semibold">Data Added</a>
            </div>
            <div class="w-1/5">
                <a class="flex text-sm text-gray-500 font-semibold">Data Update</a>
            </div>
        </div>

        <div id="userSearchResults" class="overflow-y-auto max-h-[500px] no-scrollbar">
            @foreach ($users as $user)
                <div class="flex items-center p-2 px-4 py-4 border-b hover:bg-gray-50">

                    <div class="flex items-center w-2/5 gap-3">
                        <input type="checkbox" class="flex w-5 h-5 rounded-full accent-orange-600">
                        <button id="profileButton" type="button"
                            class="flex rounded-full focus:outline-none shadow-md">
                            <img alt="profile" class="rounded-full w-9 h-9 object-cover"
                                src="https://storage.googleapis.com/a1aa/image/778a18a0-4a4f-46b0-57e0-c4f3909279ce.jpg" />
                        </button>
                        <a class="flex text-sm text-gray-500 font-semibold">{{ Str::limit($user->name, 15) }}</a>
                    </div>
                    <div class="w-2/5 flex items-center gap-2">
                        {{-- <a
                            class="text-xs text-white bg-gradient-to-r from-blue-400 to-blue-500 font-semibold p-1 rounded-full p-1.5 shadow-sm">Admin</a> --}}
                        <a
                            class="text-xs text-white bg-gradient-to-r from-green-400 to-green-500 font-semibold p-1 rounded-full p-1.5 shadow-sm">Import
                            Data</a>
                        <a
                            class="text-xs text-white bg-gradient-to-r from-purple-400 to-purple-500 font-semibold p-1 rounded-full p-1.5 shadow-sm">Export
                            Data</a>
                    </div>
                    <div class="w-1/3">
                        <a class="flex text-sm text-gray-500 font-semibold ms-3">{{ Str::limit($user->email, 20) }}</a>
                    </div>
                    <div class="w-1/3">
                        <a class="flex text-sm text-gray-500 font-semibold ms-2">{{ Str::repeat('•', 20) }}</a>
                    </div>
                    <div class="w-1/5">
                        <a
                            class="flex text-sm text-gray-500 font-semibold ms-3">{{ Str::Limit($user->created_at->translatedFormat('d F Y')) }}</a>
                    </div>
                    <div class="w-1/5">
                        <a
                            class="flex text-sm text-gray-500 font-semibold ms-4">{{ Str::Limit($user->updated_at->translatedFormat('d F Y')) }}</a>
                    </div>
                    <div class="flex">
                        <button type="button" class="flex" id="dropdownDelayButton{{ $user->id }}"
                            data-dropdown-toggle="dropdownDelay{{ $user->id }}" data-dropdown-delay="500">
                            <i class="fa fa-ellipsis-v text-md me-2 text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <!-- Dropdown menu -->
                <div id="dropdownDelay{{ $user->id }}"
                    class="z-10 hidden bg-white rounded-xl shadow-md w-36 border border-gray-100">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDelayButton{{ $user->id }}">
                        <!-- Edit User -->
                        <li>
                            <button type="button" data-modal-target="modalEditUser"
                                data-modal-toggle="modalEditUser" data-id="{{ $user->id }}"
                                data-user="{{ $user->name }}" data-password="{{ $user->password }}"
                                data-email="{{ $user->email }}"
                                class="flex items-center w-full px-4 py-2 hover:bg-gray-100 rounded-t-xl transition edit-user">
                                Edit User
                            </button>
                        </li>

                        <!-- Delete Account -->
                        <li>
                            <button type="button" data-modal-target="modalDeleteUser"
                                data-modal-toggle="modalDeleteUser"
                                class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-red-50 rounded-b-xl transition deleteUserBtn"
                                data-username="{{ $user->name }}" data-userid="{{ $user->id }}">
                                Delete
                            </button>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>

        <!-- modal Edit USER -->
        <div id="modalEditUser" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-black/30">

            <div class="relative w-full max-w-lg max-h-full mx-auto my-auto p-4">
                <form method="POST" action="" id="formEditUser">
                    @csrf
                    @method('PUT')

                    <div class="bg-white rounded-t-2xl shadow-lg">
                        <!-- header -->
                        <div class="text-center border-b p-5">
                            <h2 class="text-lg font-semibold text-gray-800">EDIT USER</h2>
                        </div>

                        <!-- body -->
                        <div class="p-6 grid gap-5">
                            <input type="hidden" id="editUserId" name="id">
                            <!-- username -->
                            <div class="flex flex-col">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">User
                                    Name</label>
                                <input type="text" placeholder="Username" id="editUserName" name="name"
                                    class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>

                            <!-- pass -->
                            <div class="flex flex-col">
                                <label for="pass"
                                    class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                                <input type="password" placeholder="Password" id="editUserPassword" name="password"
                                    class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>

                            <!-- email -->
                            <div class="flex flex-col">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" placeholder="Email" id="editUserEmail" name="email"
                                    class="p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:outline-none">
                            </div>

                            <div class="flex flex-col">
                                <label class="mb-1 text-sm font-medium text-gray-700">Acces</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="admin"
                                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                        <span class="ml-2 text-sm text-gray-700">Admin</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="export"
                                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                        <span class="ml-2 text-sm text-gray-700">Export Data</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="roles[]" value="import"
                                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                                        <span class="ml-2 text-sm text-gray-700">Import Data</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer -->
                    <div class="flex justify-end bg-gradient-to-r from-red-600 to-orange-600 rounded-b-2xl px-6 py-3">
                        <button type="submit" id="saveEditUser"
                            class="text-white bg-white/10 hover:bg-white/20 px-5 py-2 rounded-lg font-semibold transition">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal delete user -->
    <div id="modalDeleteUser" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="p-4 w-112 max-h-full">
            <div class="relative bg-white rounded-3xl shadow-sm">
                <div class="p-5 md:p-7 text-center">
                    <svg class="mx-auto mb-4 text-red-400 w-12 h-12" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-md font-normal text-gray-700">
                        Are you sure you want to delete <span id="deleteUserName"
                            class="text-gray-900 font-semibold">(nama user)</span> ?
                    </h3>

                    <form method="POST" id="deleteUserModal" action="{{ route('user.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button data-modal-hide="trash-modal" type="submit"
                            class="text-white bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600  font-medium rounded-3xl text-sm inline-flex items-center px-5 py-2.5 text-center shadow-md hover:shadow-lg">
                            Yes, I'm sure
                        </button>

                        <button data-modal-hide="trash-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-600  focus:outline-none rounded-3xl shadow-md hover:shadow-lg">No,
                            cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
