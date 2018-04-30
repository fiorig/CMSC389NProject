window.onsubmit=validate;

function validate() {
    var user = document.getElementById("user").value;
    user = user.trim();
    var patternSingle = /^[a-zA-Z0-9_@]+$/;
    var patternMult = /^[a-zA-Z0-9_@,\s]+$/;
    var InvalidMessage = "";

    if(!patternSingle.test(user)) {
        if(!patternMult.test(user)) {
            InvalidMessage += "Use correct delimiter (,) or input a valid username."
        }
    }

    if(InvalidMessage !== "") {
        alert(InvalidMessage);
        return false;
    } else {
        var valuesProvided = "Do you want to test the accounts for toxicity?\n";
        return window.confirm(valuesProvided);
    }
}