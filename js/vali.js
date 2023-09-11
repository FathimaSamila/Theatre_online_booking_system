const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const pass1 = document.getElementById('pass1');
const pass2 = document.getElementById('pass2');

form.addEventListener('submit', e => {

    e.preventDefault();
    validateInputs();
});

const seterror = (element, message) => {
    const inputcontrol = element.parentElement;
    const errordisplay = inputcontrol.querySelector('.error');

    errordisplay.innerText = message;
    inputcontrol.classList.add('error');
    inputcontrol.classList.remove('success');

}
const setsuccess = element => {
    const inputcontrol = element.parentElement;
    const errordisplay = inputcontrol.querySelector('.error');

    errordisplay.innerText = '';
    inputcontrol.classList.add('success');
    inputcontrol.classList.remove('error');

}

const isvalidemail = email => {
    const em = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return em.test(String(email).toLowerCase());
}

const validateInputs = () => {

    const usernamevalue = username.value.trim();
    const emailvalue = email.value.trim();
    const pass1value = pass1.value.trim();
    const pass2value = pass2.value.trim();
};

if (usernamevalue === '') {
    seterror(username, 'Username is required');

} else {
    setsuccess(username);
}

if (emailvalue === '') {
    seterror(email, 'Email is required');

} else if (!isvalidemail(emailvalue)) {
    seterror(email, 'Provide a valid email address');
} else {
    setsuccess(email);
}

if (pass1value === '') {
    seterror(pass1, 'Password is required');
} else if (pass1value.length < 8) {
    seterror(email, 'Password must be at lest 8 chareacter');
} else {
    setsuccess(pass1);
}

if (pass2value === '') {
    seterror(pass1, 'Please confirm your password');
} else if (pass1value !== pass2value) {
    seterror(pass1, 'Password not match');
} else {
    setsuccess(pass2);
}