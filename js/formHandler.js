document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: form.method,
                body: formData,
            });
            if (response.ok) {
                alert('Record added successfully!');
                window.location.reload();
            } else {
                alert('Failed to add record. Please try again.');
            }
        });
    }
});
