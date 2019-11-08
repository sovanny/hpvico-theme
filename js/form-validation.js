document.addEventListener("DOMContentLoaded", function () {

    let fullname = document.getElementById("fullname");
    let company = document.getElementById("company");
    let phone = document.getElementById("phone");
    let email = document.getElementById("email");
    let checkbox = document.getElementById("consent");

    // Setting the message to empty, which means no message if it's valid
    fullname.addEventListener('input', () => {
        fullname.setCustomValidity('');
        fullname.checkValidity();
    });  
    fullname.addEventListener('invalid', () => {
        fullname.setCustomValidity("Please enter your name");
    });

    company.addEventListener('input', () => {
        company.setCustomValidity('');
        company.checkValidity();
    });   
    company.addEventListener('invalid', () => {
        company.setCustomValidity("Please enter your company name");
    });

    phone.addEventListener('input', () => {
        phone.setCustomValidity('');
        phone.checkValidity();
    });
    phone.addEventListener('invalid', () => {
        if(phone.value === '') {
            phone.setCustomValidity("Please enter your phone number");
        } else {
            phone.setCustomValidity("Please enter your phone number using numbers. Spaces and + allowed.");
        }
    });

    email.addEventListener('input', () => {
        email.setCustomValidity('');
        email.checkValidity();
    });
    email.addEventListener('invalid', () => {
        if(email.value === '') {
            email.setCustomValidity("Please enter your e-mail address");
        } else {
            email.setCustomValidity("Please enter your e-mail adress, with an @ included");
        }  
    });

    let consentMsg = "Please indicate that you have read and agreed to the Privacy Policy";
    checkbox.setCustomValidity(consentMsg);
    checkbox.addEventListener('change', () => {
        checkbox.setCustomValidity(checkbox.validity.valueMissing ? consentMsg : '');
    });
})