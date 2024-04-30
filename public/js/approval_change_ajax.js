async function checkChangeSelectStatus(){
    let element = document.querySelector('select[name="selectStatus"]');
    if(element){
        element.classList.remove('text-success');
        element.classList.remove('text-info');
        element.classList.remove('text-warning');
        element.classList.remove('text-danger');
        switch (element.value) {
            case '1':
                element.classList.add('text-success');
                break;
            case '2':
                element.classList.add('text-warning');
                break;
            case '3':
                element.classList.add('text-danger');
                break;
            case '0':
                element.classList.add('text-info');
                break;
        }
    }

    changeApproval(document.getElementById('hidden_el_ins_id').innerText,element.value)
}

async function changeApproval(instructionid, approvalid){
    let data = {
        'instructionid': instructionid,
        'approvalid': approvalid,
    };
    
    let response = await fetch('/instruction/changeApproval',{
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