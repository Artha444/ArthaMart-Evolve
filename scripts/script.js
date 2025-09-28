const userBtn = document.getElementById("userBtn");
const dropdownMenu = document.getElementById("dropdownMenu");

userBtn.addEventListener("click", () => {
  dropdownMenu.classList.toggle("active");
});

// Tutup kalau klik di luar dropdown
window.addEventListener("click", (e) => {
  if (!userBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
    dropdownMenu.classList.remove("active");
  }
});
