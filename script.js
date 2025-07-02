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
        if (pinNotesContainer.children.length === 0) {
            addPinNoteLabel.style.display = 'none'
        } else {
            addPinNoteLabel.style.display = 'block'
        }
    }

    updatePinVisibility();

    // Event delegation agar semua tombol pin bisa ditangani
    document.addEventListener("click", function (e) {
        if (e.target.closest("button") && e.target.closest("button").querySelector(".fa-thumbtack")) {
            const note = e.target.closest(".relative");
            const isPinned = note.getAttribute("data-pinned") === "true";

            if (isPinned) {
                // Unpin: pindahkan ke mainNotes
                mainNotesContainer.appendChild(note);
                note.setAttribute("data-pinned", "false");
            } else {
                // Pin: pindahkan ke pinNotes
                pinNotesContainer.appendChild(note);
                note.setAttribute("data-pinned", "true");

            }

            updatePinVisibility();
        }
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
document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textAreaNoteHead')

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + 'px'
    })
    textarea.dispatchEvent(new Event('input'))
})

//content
document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textAreaNoteContent')

    textarea.addEventListener('input', function () {
        this.style.height = 'auto'
        this.style.height = this.scrollHeight + 'px'
    })
    textarea.dispatchEvent(new Event('input'))
})









/* modal main view note */
/* document.addEventListener("DOMContentLoaded", () => {
    function openNoteModal(title, content) {
        document.getElementById('modalNoteTitle').innerText = title;
        document.getElementById('modalNoteContent').innerText = content;
        document.getElementById('note-preview-modal').classList.remove('hidden');
    }

    function closeNoteModal() {
        document.getElementById('note-preview-modal').classList.add('hidden');
    }

    document.querySelectorAll('#mainNotes .relative').forEach(note => {
        note.addEventListener('click', function () {
            const title = this.querySelector('h2').innerText;
            const content = this.querySelector('p').innerText;
            openNoteModal(title, content);
        });
    });
});
 */