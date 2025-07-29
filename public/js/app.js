/* profile */
document.addEventListener("DOMContentLoaded", () => {
    const profileButton = document.getElementById('profileButton');
    const closeProfileModal = document.getElementById('closeProfileModal');

    profileButton.addEventListener('click', () => {
        profileModal.classList.toggle('hidden');
    });

    // Optional: klik di luar modal untuk menutup
    window.addEventListener('click', (e) => {
        if (!profileModal.contains(e.target) && !profileButton.contains(e.target)) {
            profileModal.classList.add('hidden');
        }
    });
})

/* pin note */
document.addEventListener("DOMContentLoaded", () => {
    const pinNotesContainer = document.getElementById("pinNotes");
    const mainNotesContainer = document.getElementById("mainNotes");
    const addPinNoteLabel = document.getElementById("addPinNotes");

    function updatePinVisibility() {
        addPinNoteLabel.style.display = pinNotesContainer.children.length === 0 ? 'none' : 'block';
    }

    updatePinVisibility();

    document.addEventListener("click", function (e) {
        const pinBtn = e.target.closest(".pin-btn");
        if (pinBtn) {
            const note = pinBtn.closest(".noteMain");
            const isPinned = note.getAttribute("data-pinned") === "true";

            if (isPinned) {
                mainNotesContainer.appendChild(note);
                note.setAttribute("data-pinned", "false");
            } else {
                pinNotesContainer.appendChild(note);
                note.setAttribute("data-pinned", "true");
            }

            updatePinVisibility();

            // Kirim ke server
            const noteId = note.getAttribute("data-id");
            fetch(`/notes/${noteId}/toggle-pin`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(res => res.json())
                .then(data => {
                    if (!data.success) {
                        alert("Gagal mem-pin note.");
                    } else {
                        // Optional: refresh jika kamu ingin update penuh
                        // location.reload();
                    }
                })
                .catch(err => {
                    console.error("Error:", err);
                    alert("Gagal terhubung ke server.");
                });
        }
    });

    // simpan ke DB (opsional)
    const noteId = note.getAttribute("data-id");
    fetch(`/notes/${noteId}/pin`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": '{{ csrf_token() }}'
        },
        body: JSON.stringify({ pinned: !isPinned })
    });

});


/* loginRegister */
document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById('loginForm')
    const registerForm = document.getElementById('registerForm')
    const showLoginBtn = document.getElementById('showLoginBtn')
    const showRegisterBtn = document.getElementById('showRegisterBtn')

    showRegisterBtn.addEventListener('click', () => {
        loginForm.classList.add('hidden')
        registerForm.classList.remove('hidden')
    })

    showLoginBtn.addEventListener('click', () => {
        loginForm.classList.remove('hidden')
        registerForm.classList.add('hidden')
    })
})

/* auto height textarea ADD NOTE */
//head
document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('autoTextAreaHead')

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + 'px'
    })
    textarea.dispatchEvent(new Event('input'))
})

//content
document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('autoTextAreaContent')

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + 'px'
    })
    textarea.dispatchEvent(new Event('input'))
})

document.addEventListener("DOMContentLoaded", () => {
    const inputName = document.getElementById('addName')
    const input = document.getElementById('addEmail')
    const inputPassword = document.getElementById('addPassword')

    inputName.addEventListener('input', function () {
    })

    inputEmail.addEventListener('input', function () {
    })

    inputPassword.addEventListener('input', function () {
    })


})

/* auto height textarea VIEW NOTE */
//head
/* document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textAreaNoteHead')

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + '8px'
    })
    textarea.dispatchEvent(new Event('input'))
})

//content
document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textAreaNoteContent')

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + '8px'
    })
    textarea.dispatchEvent(new Event('input'))
}) */

/* cancel button modal */
document.addEventListener("DOMContentLoaded", function () {
    const cancelButton = document.getElementById("cancelBtn")
    const modal = document.getElementById("modalLogout")

    cancelButton.addEventListener("click", function () {
        modal.classList.add("hidden")
    })
})

/* edit data modal dan view data heighyt */
document.addEventListener("DOMContentLoaded", () => {
    const editButtons = document.querySelectorAll('.edit-btn');
    const modal = document.getElementById('modalViewNote');
    const titleInput = document.getElementById('textAreaNoteHead');
    const contentInput = document.getElementById('textAreaNoteContent');

    // Tambahkan global variable
    let currentNoteId = null;

    editButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const title = btn.getAttribute('data-title');
            const content = btn.getAttribute('data-content');
            const id = btn.getAttribute('data-id'); // ambil id dari tombol

            titleInput.value = title;
            contentInput.value = content;
            currentNoteId = id;

            modal.classList.remove('hidden');

            // Auto resize textarea
            setTimeout(() => {
                titleInput.style.height = 'auto';
                titleInput.style.height = titleInput.scrollHeight + 'px';

                contentInput.style.height = 'auto';
                contentInput.style.height = contentInput.scrollHeight + 'px';
            }, 10);
        });
    });

    // Tombol Save
    document.getElementById('saveNoteBtn').addEventListener('click', () => {
        const title = titleInput.value;
        const content = contentInput.value;

        if (!currentNoteId) return;

        fetch(`/notes/${currentNoteId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ title, content })
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert("Gagal update note.");
                }
            });
    });
});


/* delete button */
let noteIdToDelete = null;

document.addEventListener("DOMContentLoaded", () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll(".open-delete-modal").forEach(btn => {
        btn.addEventListener("click", function () {
            noteIdToDelete = this.getAttribute("data-id");
            document.getElementById("modalDeleteNote")?.classList.remove("hidden");
        });
    });

    document.getElementById("confirmDeleteBtn")?.addEventListener("click", async function () {
        if (!noteIdToDelete) return;

        try {
            const response = await fetch(`/notes/${noteIdToDelete}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            });

            const result = await response.json();

            if (result.success) {
                window.location.reload(); // Refresh halaman
            }

        } catch (error) {
            console.error(error);
            alert("Terjadi kesalahan.");
        }
    });
});

/* search bar */
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const mainNotesContainer = document.getElementById('mainNotes');
    const pinNotesContainer = document.getElementById('pinNotes');

    searchInput.addEventListener('input', function () {
        const query = this.value.trim();

        fetch(`/notes/search?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(notes => {
                // Clear dulu
                mainNotesContainer.innerHTML = '';
                pinNotesContainer.innerHTML = '';

                if (notes.length === 0) {
                    mainNotesContainer.innerHTML = '<p class="text-gray-500 font-semibold">No notes found.</p>';
                    return;
                }

                notes.forEach(note => {
                    const noteDiv = document.createElement('div');
                    noteDiv.className = 'noteMain relative group flex flex-col bg-white rounded-3xl w-80 md:w-48 h-96 md:h-64 p-4 border border-gray-400';
                    noteDiv.setAttribute('data-id', note.id);
                    noteDiv.setAttribute('data-pinned', note.is_pinned ? 'true' : 'false');

                    noteDiv.innerHTML = `
    <h2 class="font-semibold">${note.title.substring(0, 15)}</h2>
    <p class="text-sm mt-3 break-all">${note.content.substring(0, 170)}</p>

    <div class="absolute bottom-2 right-4 opacity-0 translate-y-2 transition-all duration-300 ease-in-out group-hover:opacity-100 group-hover:translate-y-0 space-x-2">
        <button class="pin-btn text-gray-400 hover:text-gray-500" data-id="${note.id}">
            <i class="fas fa-thumbtack"></i>
        </button>

        <button class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-archive"></i>
        </button>

        <button type="button" class="text-gray-400 hover:text-gray-500 edit-btn"
            data-id="${note.id}" data-title="${note.title}" data-content="${note.content}"
            data-modal-target="modalViewNote" data-modal-toggle="modalViewNote">
            <i class="fa fa-edit"></i>
        </button>

        <button type="button" class="text-gray-400 hover:text-gray-500 open-delete-modal"
            data-id="${note.id}" data-modal-target="modalDeleteNote" data-modal-toggle="modalDeleteNote">
            <i class="fa fa-trash"></i>
        </button>
    </div>
`;


                    if (note.is_pinned) {
                        pinNotesContainer.appendChild(noteDiv);
                    } else {
                        mainNotesContainer.appendChild(noteDiv);
                    }
                });
            });
    });
});

/* search user */
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('userSearchInput');
    const resultBox = document.getElementById('userSearchResults');

    input.addEventListener('input', () => {
        const query = input.value.trim();

        if (query.length === 0) {
            resultBox.innerHTML = '';
            return;
        }

        fetch(`/dashboard/users/search?query=${encodeURIComponent(query)}`)
            .then(res => res.json())
            .then(data => {
                if (data.length === 0) {
                    resultBox.innerHTML = '<p class="flex text-sm text-gray-500 font-semibold mt-4 justify-center">User not found.</p>';
                } else {
                    resultBox.innerHTML = data.map(user => `
                        <div class="flex items-center w-2/5 gap-3">
                    <input type="checkbox" class="flex w-5 h-5 rounded-full accent-orange-600">
                    <button id="profileButton" type="button" class="flex rounded-full focus:outline-none">
                        <img alt="profile" class="rounded-full w-9 h-9 object-cover"
                            src="https://storage.googleapis.com/a1aa/image/778a18a0-4a4f-46b0-57e0-c4f3909279ce.jpg" />
                    </button>
                    <a class="flex text-sm text-gray-500 font-semibold">${user.name.substring(0, 15)}</a>
                </div>
                <div class="w-2/5 flex items-center gap-2">
                    <a class="text-xs text-sky-700 font-semibold border border-sky-300 p-1 rounded-full">Admin</a>
                    <a class="text-xs text-green-700 font-semibold border border-green-300 p-1 rounded-full">Import
                        Data</a>
                    <a class="text-xs text-purple-700 font-semibold border border-purple-300 p-1 rounded-full">Export
                        Data</a>
                </div>
                <div class="w-1/3">
                    <a class="flex text-sm text-gray-500 font-semibold ms-2">${note.email.substring(0, 20)}</a>
                </div>
                <div class="w-1/3">
                    <a class="flex text-sm text-gray-500 font-semibold ms-2">${note.password.substring(0, 20)}</a>
                </div>
                <div class="w-1/5">
                    <a class="flex text-sm text-gray-500 font-semibold ms-3">Jan 4, 2025 </a>
                </div>
                <div class="w-1/5">
                    <a class="flex text-sm text-gray-500 font-semibold ms-4">${user.created_at}</a>
                </div>
                <div class="flex">
                    <button type="button" class="flex" id="dropdownDelayButton"
                        data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500" data-dropdown-trigger="hover">
                        <i class="fa fa-ellipsis-v text-md me-2 text-gray-500"></i>
                    </button>
                </div>
                    `).join('');
                }
            });
    });
});

/* edit user */
document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-user");

    editButtons.forEach(button => {
        button.addEventListener("click", function () {
            const userId = this.getAttribute("data-id");
            const userName = this.getAttribute("data-user");
            const userEmail = this.getAttribute("data-email");
            const userPassword = this.getAttribute("data-password");

            // Isi input modal edit
            document.getElementById("editUserId").value = userId;
            document.getElementById("editUserName").value = userName;
            document.getElementById("editUserEmail").value = userEmail;
            document.getElementById("editUserPassword").value = userPassword;

            document.getElementById("formEditUser").action = `/user/${userId}`
        });
    });
});

/* name in modal delete user */
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtonUser = document.querySelectorAll('.deleteUserBtn')

    deleteButtonUser.forEach(button => {
        button.addEventListener('click', function () {
            const userName = this.dataset.username;
            const userId = this.dataset.userid;

            document.getElementById('deleteUserName').textContent = userName;

            const deleteForm = document.getElementById('deleteForm')
            if (deleteForm) {
                deleteForm.action = `/user/${userId}`
            }
        })
    })
})




