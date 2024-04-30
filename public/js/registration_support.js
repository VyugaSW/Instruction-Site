let regbtn = document.getElementById('regbtn');
let loginFlag = false;
let pass1Flag = false;
let pass2Flag = false;
let emailFlag = false;

function checkFlags(){
    if(loginFlag && pass1Flag && pass2Flag && emailFlag)
        regbtn.disabled = false;
    else
        regbtn.disabled = true;
}

let timerCheckFlags = setInterval(checkFlags,500);
regbtn.addEventListener('click', () => {clearInterval(timerCheckFlags)});

document.getElementById('inputLogin').addEventListener('input', (e) => {
    if ((e.target.value.length > 30 || e.target.value.length < 3) && e.target.value.length != 0){
        document.getElementById('loginHelp').innerText = 'Login must be in range 3-30 chars';
        loginFlag = false;
    }
    else{
        document.getElementById('loginHelp').innerText = '';
        loginFlag = true;
    }
});

document.getElementById('inputPassword1').addEventListener('input', (e) => {
    if (e.target.value != document.getElementById('inputPassword2').value){
        document.getElementById('password2Help').innerText = 'Passwords are not same';
    }

    if ((e.target.value.length > 30 || e.target.value.length < 3) && e.target.value.length != 0){
        document.getElementById('password1Help').innerText = 'Password must be in range 3-30 chars';
        pass1Flag = false;
    }
    else{
        document.getElementById('password1Help').innerText = '';
        pass1Flag = true;
    }
});

document.getElementById('inputPassword2').addEventListener('input', (e) => {
    if (e.target.value != document.getElementById('inputPassword1').value){
        document.getElementById('password2Help').innerText = 'Passwords are not same';
        pass2Flag = false;
    }
    else{
        document.getElementById('password2Help').innerText = '';
        pass2Flag = true;
    }
});

document.getElementById('inputEmail').addEventListener('input', (e) => {
    console.log(e.target.value.length);
    if (e.target.value.length < 3){
        document.getElementById('emailHelp').innerText = 'Email need to be filled';
        emailFlag = false;
    }
    else{
        document.getElementById('emailHelp').innerText = '';
        emailFlag = true;
    }
});