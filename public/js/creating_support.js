FReader = new FileReader();

FReader.onload = function(e){
    document.getElementById('imagecoverResult').src = e.target.result;
}

function loadImageFile(input){
    var file = input.files[0];
    FReader.readAsDataURL(file);
}

function loadImagesFile(input){
    const files = input.files;
    for(let i = 0; i < files.length; i++){
        let url = URL.createObjectURL(files[i]);
        let img = document.createElement('img');
        img.style.width = '20rem';
        img.style.height = '20rem';
        img.src = url;
        img.onload = () => {
            document.getElementById('imagesResult').appendChild(img)
        };
    }
}