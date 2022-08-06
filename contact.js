function sendEmail(){

    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    if(firstname == ""){
        swal("Oops!", "please enter your first name", "error");
    }

    if(lastname == ""){
        swal("Oops!", "please enter your last name", "error");
    }

    if(email == ""){
        swal("Oops!", "please enter your email", "error");
    }

    if(message == ""){
        swal("Oops!", "please write a message", "error");
    }

}