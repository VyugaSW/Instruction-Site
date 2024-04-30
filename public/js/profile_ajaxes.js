getInstructions(0);
async function  getInstructions(statusid) {
    let result = document.getElementById('result');
    let response = await fetch('/profile/getworks/ajax?approvalid='+statusid+'&userLogin='+document.getElementById('userLogin').innerText);
    result.innerHTML = await response.text();
};

async function changeAvatar(){
    let response = await fetch('/profile/changeavatar/ajax');
    if (response.ok){
        if(document.getElementById('changeAvatarModal'))
            document.getElementById('changeAvatarModal').remove();
        document.body.innerHTML += await response.text();
        new bootstrap.Modal(document.getElementById('changeAvatarModal')).show();
    }
}