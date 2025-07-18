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
        }
    });

    if (isPinned) {
        mainNotesContainer.appendChild(note);
        note.setAttribute("data-pinned", "false");
    } else {
        pinNotesContainer.appendChild(note);
        note.setAttribute("data-pinned", "true");
    }

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

    editButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const title = btn.getAttribute('data-title');
            const content = btn.getAttribute('data-content');

            titleInput.value = title;
            contentInput.value = content;

            modal.classList.remove('hidden');

            // Tunggu render modal baru atur ulang tinggi textarea
            setTimeout(() => {
                titleInput.style.height = 'auto';
                titleInput.style.height = titleInput.scrollHeight + 'px';

                contentInput.style.height = 'auto';
                contentInput.style.height = contentInput.scrollHeight + 'px';
            }, 10); // atau 50ms kalau masih kurang
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




