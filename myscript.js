function validation() {
    
    var nm = document.getElementById("fname").value;
    var lnm = document.getElementById("lname").value;
    var nameformat = /[a-zA-Z]+$/;
    if(nm.match(nameformat) && lnm.match(nameformat))
    {
        if(nm.length != 0)
        {
            var email = document.getElementById("Email").value;
            var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(email.match(emailformat))
            {
                var pass = document.getElementById("Password").value;
                if(pass.length < 6)
                {
                    alert("VALID Name and Email Address but INVALID Password! Minimum 6 Characters needed");
                    return false;
                }
                else
                {
                    alert("Name, Email and Password are VALID!");
                    return true;
                }
            }
            else
            {
                alert("VALID Name but INVALID EMAIL!");
                return false;
            }
        }
        else
        {
            alert("Invalid Name!");
            return false;
        }
    }
    else
    {
        alert("Invalid Name!");
        return false;
    }
}

function validation_login() {

    var email = document.getElementById("email").value;
    var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.match(emailformat))
    {
        var pass = document.getElementById("password").value;
        if(pass.length < 6)
        {
            alert("VALID Email but Invalid Password! Minimum 6 Characters needed");
            return false;
        }
        else
        {
            alert("VALID Email & Password!");
            return true;
        }
        
    }
    else
    {
        alert("Invalid Email!");
        return false;
    }
}