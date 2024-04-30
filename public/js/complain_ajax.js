let complainModal;
async function getComplains(){
    let instructionid = document.getElementById('hidden_el_ins_id').innerText;
    let response = await fetch('/instruction/complain?instructionid='+instructionid);
    if(response.ok){
        if(complainModal)
            document.getElementById('complainModal').remove();
        document.body.innerHTML += await response.text();
        complainModal = new bootstrap.Modal(document.getElementById('complainModal'))
        complainModal.show();
    }
}

let successModal;
async function sendComplains(){
    if(document.querySelector('div[class="modal-backdrop fade show"]'))
         document.querySelector('div[class="modal-backdrop fade show"]').remove();
    let response = await fetch('/instruction/complain/ajax?instructionid='+document.getElementById('hidden_el_ins_id').innerText
                            +'&complainTypeid='+document.querySelector('select[name="complainType"]').value
                            +'&description='+document.querySelector('textarea[name="description"]').value
                            +'&user_session_login='+document.getElementById('hidden_el_user_session_login').innerText);                         
    if(response.ok){
        document.body.innerHTML += await response.text();
        if(successModal)
            document.getElementById('successModal').remove();
        successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    }
}