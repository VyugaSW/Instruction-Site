function showModalImage(img){
    let ao;
    let src = img.src;
    let path = src.slice(src.indexOf('images'));

    if(window.XMLHttpRequest)
        ao = new XMLHttpRequest();
    else    
        ao = new ActiveXObject('Microsoft.XMLHTTP');

    ao.onload = function(){
        if(ao.status == 200){
            if(document.getElementById('imageModal')){
                document.getElementById('imageModal').remove();
            }
            document.body.innerHTML += ao.responseText;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        }
    }

    ao.open('GET','/instruction/showimage?path='+path);
    ao.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    ao.send();
}