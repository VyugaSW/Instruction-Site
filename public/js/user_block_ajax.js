async function blockUser(userid){
    let data = {
        'userid': userid,
    };

    let response = await fetch('/user/block',{
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

async function unblockUser(userid){
    let data = {
        'userid': userid,
    };

    let response = await fetch('/user/unblock',{
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