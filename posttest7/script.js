document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    const isDarkMode = document.body.classList.contains('dark-mode');
    this.textContent = isDarkMode ? 'Light Mode' : 'Dark Mode';
});

function toggleMenu() {
  const menu = document.getElementById('menu');
  menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}

const readMoreBtns = document.querySelectorAll('.read-more-btn');

readMoreBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const content = this.previousElementSibling;
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
        this.textContent = this.textContent === 'Baca Selanjutnya...' ? 'Tutup' : 'Baca Selanjutnya...';
    });
});

window.onload = function() {
    if (document.referrer === "" || !document.referrer.includes(window.location.hostname)) {
        document.getElementById("welcomePopup").style.display = "block";
    }
}

document.getElementById("closeWelcomePopup").onclick = function() {
    document.getElementById("welcomePopup").style.display = "none";
    localStorage.setItem("welcomePopupDisplayed", "true"); // Simpan status pop-up
}

window.onclick = function(event) {
    const popup = document.getElementById("welcomePopup");
    if (event.target == popup) {
        popup.style.display = "none";
        localStorage.setItem("welcomePopupDisplayed", "true"); // Simpan status pop-up
    }
}

function liveSearch() {
    const searchInput = document.getElementById('searchInput').value;

    // Cek jika input kosong
    if (searchInput.length === 0) {
        document.getElementById('resultsBody').innerHTML = ''; // Kosongkan hasil jika tidak ada input
        return;
    }

    // Lakukan AJAX ke search.php
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Menampilkan hasil pencarian di dalam tabel
            document.getElementById('resultsBody').innerHTML = xhr.responseText;
        } else {
            console.error('Error: ' + xhr.status);
        }
    };

    xhr.send('search=' + encodeURIComponent(searchInput));
}













