const input = document.getElementById('image-upload');
const image = document.getElementById('image_id');
if(image){
    input.addEventListener('change', (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            image.src = src;
        }
    });
}

