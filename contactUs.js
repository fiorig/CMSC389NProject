"use strict";
window.onsubmit = validateForm;
window.onreset = reset;

function validateForm() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var phone = document.getElementById("phoneNumber").value;
    var message = document.getElementById("message").value;
    
    var errorMessage = "";
    
    
    if (firstName.length === 0) {
        errorMessage += "You need to type in something for first name.\n";    
    }
    if (lastName.length === 0) {
        errorMessage += "You need to type in something for last name.\n";    
    }
    if (String(parseInt(phone)) !== phone) {
        errorMessage += "This is not a valid number.\n";
    }
    if (phone.length !== 10) {
        errorMessage += "Phone number must be 10 numbers.\n";
    }
    if (message.length === 0) {
        errorMessage += "You need to type in something for message.\n";    
    }
    if (errorMessage !== "") {
        alert(errorMessage);
        return false;
    } else {
        var submit ="Do you want to submit message?";
        return window.confirm(submit);
    } 
}

function reset() {
    var submit ="Do you want to start over?";
    return window.confirm(submit);
}
