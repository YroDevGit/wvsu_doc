
var file_input = document.querySelectorAll('.imageInput');
var file_view = document.querySelectorAll('.previewButton');
file_input.forEach(function(al) {
    al.addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});

file_view.forEach(function(al) {
    al.addEventListener('click', function() {
        const modal = document.getElementById('imageModal');
        const imageSrc = document.getElementById('imagePreview').src;
        
        if (imageSrc !== '#') {
            modal.style.display = 'flex';
        }
        
    });
});
document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('imageModal').style.display = 'none';
});

window.addEventListener('click', function(event) {
    const modal = document.getElementById('imageModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
