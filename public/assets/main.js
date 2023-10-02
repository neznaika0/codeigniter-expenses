document.addEventListener("DOMContentLoaded", () => {
    const toasts = document.querySelectorAll('.toast');

    toasts.forEach((el) => {
        const toast = new bootstrap.Toast(el);
        toast.show();
    });
});

