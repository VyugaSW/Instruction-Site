async function clearComplain(complainid){
    let data = {
        'complainid': complainid
    };

    let response = await fetch('/complains/clear',{
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