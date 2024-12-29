document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.ajax-form');

    forms.forEach(form => {
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
                alert('Failed to add record. Please check your input and try again.');
            }
        });
    });
});
