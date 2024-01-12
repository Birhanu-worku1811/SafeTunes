document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('is_artist');
    const artistFields = document.getElementById('artist-fields');

    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            artistFields.style.display = 'block';
        } else {
            artistFields.style.display = 'none';
        }
    });
});
