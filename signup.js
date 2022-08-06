
function create(){

    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;

    if(username == ""){
        swal("warning!", "Please enter a username", "warning");
    }

    if(email == ""){
        swal("warning!", "Please enter a valid email", "warning");
    }

    if(phone == ""){
        swal("warning!", "Please enter your mobile number", "warning");
    }

    if(password.length < 6){
        swal("warning!", "Password should be 6 or more characters", "warning");
    }
    
    }