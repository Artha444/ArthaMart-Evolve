document.querySelectorAll(".update-form").forEach(form => {
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const data = new FormData(form);
    const res = await fetch("includes/update_cart.php", { method: "POST", body: data });
    const result = await res.json();
    if (result.success) location.reload();
  });
});