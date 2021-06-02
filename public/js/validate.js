
function validateEmail() {
     
     var email = document.getElementById('email');
     var submit = document.getElementById('submit');
     var displaySetting = submit.style.display;
     if (email.value.length == 0) {
         document.getElementById('erremail').innerHTML = "please do not leave the email empty"
         submit.style.display = 'none';
        } else if (/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(email.value)) {
            document.getElementById('erremail').innerHTML = ""

            submit.style.display = 'block';
        } else {
            document.getElementById('erremail').innerHTML = " please leave a valid email "
            submit.style.display = 'none';
        }
    }


   function validateUsername() {
console.log("aklsjoskl");
     var username = document.getElementById('username');
var submit = document.getElementById('submit');
     var displaySetting = submit.style.display;
     if (username.value.length == 0) {
         document.getElementById('errusr').innerHTML = "please do not leave the username empty"
    submit.style.display = 'none';
     } else if (username.value.length < 8) {
         document.getElementById('errusr').innerHTML = "username must have atleast 8 characters"
    submit.style.display = 'none';
     } else if (/[^a-zA-Z0-9_]/.test(username.value)) {
         document.getElementById('errusr').innerHTML = "you are allowed to use letters and numbers "
    submit.style.display = 'block';
     }
 }

// function passwordlength() {
//     var password1 = document.getElementById('password1')

//     if (password1.value.length == 0) {
//         document.getElementById('errpwd1').innerHTML = "please do not leave password empty"
//     } else if (password1.value.length < 8) {
//         document.getElementById('errpwd1').innerHTML = "password must be atleast 8 characters"
//     }
// }

// function validatePassword() {
//     var password1 = document.getElementById('password1')
//     var password2 = document.getElementById('password2')
    
//     if (password1.value.length == 0) {
//         document.getElementById('errpwd1').innerHTML = "please do not leave password empty"
//     } else if (password1.value.length < 8) {
//         document.getElementById('errpwd1').innerHTML = "password must be atleast 8 characters"
//     }else if (password2.value.length == 0) {
//         document.getElementById('errpwd2').innerHTML = "please do not leave password empty"
//     } else if (password2.value.length < 8) {
//         document.getElementById('errpwd2').innerHTML = "password must be atleast 8 characters"
//     } else if (password2.value != password2.value)
//         document.getElementById('errpwd2').innerHTML = "Password did not match"
//     return false

// }

// function validateEmail() {

//     var email = document.getElementById('email')
//     if (email.value.length == 0) {
//         document.getElementById('erremail').innerHTML = "please do not leave the email empty"
//     } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
//         document.getElementById('erremail').innerHTML = "valid "
//     } else {
//         document.getElementById('erremail').innerHTML = " please leave a valid email "
//     }
// }

// function validateEmail2() {

//     var email = document.getElementById('email')
//     if (email.value.length == 0) {
//         document.getElementById('erremail2').innerHTML = "please do not leave the email empty"
//     } else if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
//         document.getElementById('erremail2').innerHTML = "valid "
//     } else {
//         document.getElementById('erremail2').innerHTML = " please leave a valid email "
//     }
// }

// function mailSubscribe() {
//     if (document.getElementById('labelone').checked) {

//         document.getElementById('labeltwo').style.display = "inline"
//         document.getElementById('labelthree').setAttribute('required', true)

//     } else {
//         document.getElementById('labelthree').removeAttribute('required')
//         document.getElementById('labeltwo').style.display = "none"

//     }
// }