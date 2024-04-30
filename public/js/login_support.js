let timerCheckFlagsModal = null;
document.querySelector('button[name=btnOpenModal]').addEventListener('click', () => {
    let loginbtn = document.getElementById('loginbtn');
    let loginFlag = false;
    let pass1Flag = false;

    function checkFlags(){
        if(loginFlag && pass1Flag)
            loginbtn.disabled = false;
        else
            loginbtn.disabled = true;

        if(document.getElementById('inputLoginModal').value.length == 0 || document.getElementById('inputPassword1Modal').length == 0)
            loginbtn.disabled = true;
    }

    timerCheckFlagsModal = setInterval(checkFlags,500);
    loginbtn.addEventListener('click', () => {clearInterval(timerCheckFlagsModal)});

    document.getElementById('inputLoginModal').addEventListener('input', (e) => {
        if ((e.target.value.length > 30 || e.target.value.length < 3) && e.target.value.length != 0){
            document.getElementById('loginHelpModal').innerText = 'Login must be in range 3-30 chars';
            loginFlag = false;
        }
        else{
            document.getElementById('loginHelpModal').innerText = '';
            loginFlag = true;
        }
    })

    document.getElementById('inputPassword1Modal').addEventListener('input', (e) => {
        if ((e.target.value.length > 30 || e.target.value.length < 3) && e.target.value.length != 0){
            document.getElementById('password1HelpModal').innerText = 'Password must be in range 3-30 chars';
            pass1Flag = false;
        }
        else{
            document.getElementById('password1HelpModal').innerText = '';
            pass1Flag = true;
        }
    })
});