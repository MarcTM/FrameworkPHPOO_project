////////////////
////FUNCTIONS VALIDATE
//////////////////
function validate_user(user){
    if (user.length >= 2 && user.length <= 10) {
        return true;
    }else{
        return false;
    }
}


function validate_email(email){
    var regemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    if (email.length > 0) {
        var regexp = regemail;
        return regexp.test(email);
    }else{
        return false;
    }
}


function validate_pass(pass){
    if (pass.length > 5) {
        return true;
    }else{
        return false;
    }
}

////////////////
////VALIDATE LOGIN
///////////////
function validate_login(){

    var v_email=document.getElementById('email').value;
    var v_pass=document.getElementById('pass').value;


    var r_email=validate_email(v_email);
    var r_pass=validate_pass(v_pass);

    
    if(!r_email){
        document.getElementById('e_email').innerHTML = " * Ivalid email";
        return 0;
    }else{
        document.getElementById('e_email').innerHTML = "";
    }
    if(!r_pass){
        document.getElementById('e_pass').innerHTML = " * Introduce at least 6 characters";
        return 0;
    }else{
        document.getElementById('e_pass').innerHTML = "";
    }
    

    var email = $("#email").val();
    var pass = $("#pass").val();
    var data = {'email':email, 'pass':pass};

    $.ajax({
        url: "?module=login&function=validate_login",
        type: "POST",
        data: {'credentials':JSON.stringify(data)},
        dataType: "JSON",
    })
    .done(function(cred) {
        if(cred==="not exists"){
            alert("Your email or password is incorrect");
        }else if(cred==="not activated"){
            alert("Check your email to activate your account");
        }else if(cred==="incorrect"){
            alert("Your email or password is incorrect");
        }else{
            localStorage.setItem('id_token', cred);
            setTimeout(function(){ window.location.href = "?module=home&function=list_home" }, 2000);
        }
    })
}


////////////////
////VALIDATE REGISTER AND INSERT USER
///////////////
function validate_register(){

    var v_user=document.getElementById('user').value;
    var v_email=document.getElementById('email').value;
    var v_pass=document.getElementById('pass').value;

    var r_user=validate_user(v_user);
    var r_email=validate_email(v_email);
    var r_pass=validate_pass(v_pass);


    if(!r_user){
        document.getElementById('e_user').innerHTML = " * Ivalid user (between 2 and 10 characters)";
        return 0;
    }else{
        document.getElementById('e_user').innerHTML = "";
    }    
    if(!r_email){
        document.getElementById('e_email').innerHTML = " * Ivalid email";
        return 0;
    }else{
        document.getElementById('e_email').innerHTML = "";
    }
    if(!r_pass){
        document.getElementById('e_pass').innerHTML = " * Introduce at least 6 characters";
        return 0;
    }else{
        document.getElementById('e_pass').innerHTML = "";
    } 


    var email = $("#email").val();
    var user = $("#user").val();
    var pass = $("#pass").val();

    $.ajax({
        url: "?module=login&function=check_register&email="+email+"&user="+user,
        type: "GET",
        dataType: "JSON",
    })
    .done(function(data) {
        if(data===false){
            var data = {'email':email, 'user':user, 'pass':pass};

            $.ajax({
                url: "?module=login&function=insert_user",
                type: "POST",
                data: {data:JSON.stringify(data)},
                dataType: "JSON"
            })

            console.log("You have received an email, go and activate your account");
            setTimeout(function(){ window.location.href = "?module=login&function=list_login" }, 3000);
        }else{
            alert("This account already exists");
        }
    })
}





////////////////
//// LOGIN / REGISTER / LOGOUT
///////////////
function gotologin(){
    $('body').on("click", "#login_html", function() {
        setTimeout('window.location.href = "?module=login&function=list_login",1000');
    });
}

function gotoregister(){
    $('body').on("click", "#register_html", function() {
        setTimeout('window.location.href = "?module=login&function=list_register",1000');
    });
}

function logout(){
    $('body').on("click", "#logout_html", function() {
        localStorage.removeItem('id_token');
        setTimeout('window.location.href = "?module=home&function=list_home",1000');
    });
}



/////////////
//// RECOVER PASSWORD
//////////////////77
function recover_pass(){
    $('body').on("click", "#rec", function() {
        var email = validate_email($("#emailr").val());
        
        if(!email){
            document.getElementById('e_emailr').innerHTML = " * Ivalid email";
            return 0;
        }else{
            document.getElementById('e_emailr').innerHTML = "";
        }

        $.ajax({
            url: "?module=login&function=send_rec_mail",
            type: "POST",
            data: {'email':$("#emailr").val()},
            dataType: "JSON"
        })
        .done(function(data){
            if(data===false){
                alert("Not registered");
            }else{
                alert("Check your email");
            }
        })
    });
}

function new_pass(){
    $('body').on("click", "#new", function() {
        var pass = validate_pass($("#passn").val());

        if(!pass){
            document.getElementById('e_passn').innerHTML = " * Introduce at least 6 characters";
            return 0;
        }else{
            document.getElementById('e_passn').innerHTML = "";
        }

        if($("#passn").val() != $("#rpassn").val()){
            document.getElementById('e_rpassn').innerHTML = " * This is not the same password";
            return 0;
        }else{
            document.getElementById('e_rpassn').innerHTML = "";
        }

        $.ajax({
            url: "?module=login&function=update_pass",
            type: "POST",
            data: {'pass':$("#passn").val()},
        })
        .done(function(data){
            alert("Password changed");
            setTimeout('window.location.href = "?module=login&function=list_login", 3000');
        })
    });
}




$(document).ready(function () {

    gotologin();
    gotoregister();
    logout();
    recover_pass();
    new_pass();

});