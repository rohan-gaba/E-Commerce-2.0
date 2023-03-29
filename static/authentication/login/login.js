let login_button=document.getElementById("login_sumbit_button");
let login_mail = document.getElementById("login_mail");
let login_password = document.getElementById("login_password");
let login_type_admin = document.getElementById("login_type_admin");
let login_type_user = document.getElementById("login_type_user");
let login_empty = document.getElementById("login_empty");
let signup_empty = document.getElementById("signup_empty");
let login_form = document.getElementById("login_form");
let signup_name=document.getElementById("signup_name");
let signup_mail=document.getElementById("signup_mail");
let signup_mobile=document.getElementById("signup_mobile");
let signup_password=document.getElementById("signup_password");

function sign() {
    window.location.href = "/signup";
}


function login_validation() {
    if (login_mail.value && login_password.value.trim() && (login_type_user.checked || login_type_admin.checked))
        return true;
    login_empty.style.display = "block";
    return false;

}
function forgotpassword() {
    // write code for forgot password
    var link = "/forgot_password";
    window.location.href = link;
}

function login_send() {
    if (login_validation()) {
        let obj;
        if (login_type_admin.checked)
            obj = { "who": 1, "mail": login_mail.value, "password": login_password.value };
        else
            obj = { "who": 0, "mail": login_mail.value, "password": login_password.value };

        let request = new XMLHttpRequest();
        request.open("POST", "/login");
        request.setRequestHeader("content-type", "application/json");
        request.send(JSON.stringify(obj));
            request.addEventListener("load",function () {
                console.log(request.responseText);
                switch (request.responseText) {
                    case "admin login":
                        window.location.href = "/seller";
                        break;
                    case "login success":
                        window.location.href = "/";
                        break;
                    default:
                        login_empty.innerText ="*"+request.responseText;
                        login_empty.style.display = "block";
                }
            });
    }
    else {
        login_empty.style.display = "block";
    }
}
