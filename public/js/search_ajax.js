async function search(url,approvalid, container, ignore_checkboxes = false) {
    let searchLine = document.querySelector('input[name="instructionSearch"]').value.trim();

    let inclDesc = document.getElementById('inclDescription').checked ? 1 : 0;
    let inclAuthor = document.getElementById('inclAuthor').checked ? 1 : 0;
    let inclTitle = document.getElementById('inclTitle').checked ? 1 : 0;
 
    if(ignore_checkboxes){
        inclDesc = 0;
        inclAuthor = 0;
        inclTitle = 0;
    }

    if(searchLine == '' && (inclDesc || inclAuthor || inclTitle) && container){
        container.innerHTML = '<h3><span style="color: blue">Line is empty -_-</span></h3>';
        return;
    }

    let response = await fetch(url+'?instructionName='+searchLine
            +'&inclDescription='+inclDesc
            +'&inclAuthor='+inclAuthor
            +'&inclTitle='+inclTitle
            +'&approvalid='+approvalid);
    
    if(response.ok){
        if(container)
            container.innerHTML = await response.text();
    }
}