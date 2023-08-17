const loginForm = document.forms["loginForm"];
const continueBtn = loginForm.querySelector(".loginButton");
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.loginLink');
const signupLink = document.querySelector('.signupLink');
const buttonPopup = document.querySelector('.loginButtonPopup');
const buttonPopup2 = document.querySelector('.signupButtonPopup');
const iconClose = document.querySelector('.iconClose');
const passwordShowHide = document.querySelectorAll('.passwordHide')

signupLink.addEventListener('click', () => {
    wrapper.classList.add('active');
})

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
})

buttonPopup.addEventListener('click', () => {
    wrapper.classList.remove('active');
    wrapper.classList.add('active-popup');
    wrapper.classList.remove('active-popup2');
})
buttonPopup2.addEventListener('click', () => {
    wrapper.classList.add('active');
    wrapper.classList.remove('active-popup');
    wrapper.classList.add('active-popup2');
})
iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active');
    wrapper.classList.remove('active-popup');
    wrapper.classList.remove('active-popup2');
})

passwordShowHide.forEach((passwordHide) => {
    passwordHide.addEventListener("click", () => {
        let getPasswordInput = passwordHide.parentElement.querySelector("input");
        if (getPasswordInput.type === "password") {
            getPasswordInput.type = "text";
        } else {
            getPasswordInput.type = "password";
        }
    });
});


function validateLoginForm() {
    let email = document.forms["loginForm"]["email"].value;
    let password = document.forms["loginForm"]["password"].value;
    // let rememberMe = document.forms["loginForm"]["rememberMe"].checked;

    let atPos = email.indexOf('@');
    let dotPos = email.lastIndexOf('.');
    if (email.trim() === "" || password.trim() === "") {
        alert("Your username/password field is empty");
        return false;
    }

    else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === email.length - 1) {
        alert("Please enter a valid email address.");
        return false;
    }
    else {
        continueBtn.onclick = (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);

            fetch("../Controller/loginProcess.php", {
                method: "POST",
                body: formData,
            })
                .then(response => response.text())
                .then(data => {
                    if (data === "success") {
                        
                        location.href = "../View/adminLanding.php";
                    }
                    else if (data === "Invalid username/password") {
                        alert("Wrong password. Please try again.");
                    }
                    else {
                        
                        const errorText = loginForm.querySelector(".error-text");
                        errorText.style.display = "block";
                        errorText.textContent = data;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        };
    }
    return true;
}
function validateSignupForm() {
    let fName = document.forms["signupForm"]["fName"].value;
    let lName = document.forms["signupForm"]["lName"].value;
    let email = document.forms["signupForm"]["email"].value;
    let password = document.forms["signupForm"]["password"].value;
    let cPassword = document.forms["signupForm"]["cPassword"].value;
    let policy = document.forms["signupForm"]["policy"].checked;

    if (fName.trim() === "" || lName.trim() === "" || email.trim() === "" || password.trim() === "" || cPassword.trim() === "") {
        alert("Please fill in all the required fields.");
        return false;
    }

    if (password !== cPassword) {
        alert("Passwords do not match.");
        return false;
    }

    if (!policy) {
        alert("Please accept the Privacy Policy and Terms and Conditions.");
        return false;
    }

    let atPos = email.indexOf('@');
    let dotPos = email.lastIndexOf('.');

    if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === email.length - 1) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password.length < 8) {
        alert("Your password must be at least 8 characters long");
        return false;
    }

    const lowerCaseLetters = "abcdefghijklmnopqrstuvwxyz";
    const upperCaseLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numericDigits = "0123456789";
    const specialCharacters = "!#$%&()*+,-./:;<=>?@[]^_`{|}~";

    let hasLowerCase = false;
    let hasUpperCase = false;
    let hasNumericDigits = false;
    let hasSpecialCharacters = false;

    for (let i = 0; i < password.length; i++) {
        const char = password.charAt(i);

        if (lowerCaseLetters.includes(char)) {
            hasLowerCase = true;
        }

        if (upperCaseLetters.includes(char)) {
            hasUpperCase = true;
        }

        if (numericDigits.includes(char)) {
            hasNumericDigits = true;
        }

        if (specialCharacters.includes(char)) {
            hasSpecialCharacters = true;
        }
    }

    if (!hasLowerCase) {
        alert("Your password must contain at least one lowercase letter.");
        return false;
    }

    if (!hasUpperCase) {
        alert("Your password must contain at least one uppercase letter.");
        return false;
    }

    if (!hasNumericDigits) {
        alert("Your password must contain at least one numeric digit.");
        return false;
    }

    if (!hasSpecialCharacters) {
        alert("Your password must contain at least one special character.");
        return false;
    }

    return true;
}