
function Validate_RegistrationForm() {
    let FirstName = document.forms["RegistrationForm"]["Fname"].value;
        if (FirstName == "") {
        alert("First Name must be filled out");
        return false;
        }
    let LastName = document.forms["RegistrationForm"]["Lname"].value;
        if ( LastName == "") {
        alert("Last Name must be filled out");
        return false;
        }
    let PhoneNum  = document.forms["RegistrationForm"]["PhoneNum"].value;
        if (PhoneNum == "" ||(isNaN(PhoneNum))|| (String(PhoneNum)).length !== 10 ) {
        alert("Phone number is invalid please try again");
        return false;
        }
    
    let Password  = document.forms["RegistrationForm"]["Password"].value;
        if (Password == "") {
        alert("Password must be filled out");
        return false;
        }
        
    let Username  = document.forms["RegistrationForm"]["Uname"].value;
        if (Username == "") {
        alert("Username must be filled out");
        return false;
        }	
    
       
    // Email can not be left blank
    let Email = document.forms["RegistrationForm"]["Email"].value;
    if (Email == "") {
        alert("Email must be filled out");
        return false;
        }
    var at_sign = (String(Email)).indexOf("@");
    var dot = (String(Email)).lastIndexOf(".");
    
    //Checking the postion of the dot and at sign
    if ((at_sign != -1) &&
        (at_sign != 0) &&
        (dot != -1) &&
        (dot != 0) &&
        (dot > at_sign + 1)) {
        alert("Email address is valid.");
        return true;}
        else {
        alert("Email address is not valid. Please re-enter it");
    return false;
    }

}	

