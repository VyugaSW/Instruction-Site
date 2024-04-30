async function getDeleteConfirmation(){
    let response = await fetch('/instruction/deleteConfirm');
    if(response.ok){
        if(document.getElementById('deleteModal'))
            document.getElementById('deleteModal').remove();
        document.body.innerHTML += await response.text();
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }
}

async function makeAjax(){
    deleteInstruction(document.getElementById('hidden_el_ins_id').innerText);
}

async function deleteInstruction(id){
    let data = {
        'instructionid': id
    };

    let response = await fetch('/instruction/delete',{
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(data)
    });

    if(response.ok){
        location.reload();
    }
}