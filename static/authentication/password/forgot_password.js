input_mail = document.getElementById("input_mail");
error_message = document.getElementById("error_message");
function forgot_password() {
        if (input_mail.value.trim()) {
                let xml = new XMLHttpRequest();
                xml.open("POST", "/forgot_password");
                xml.setRequestHeader("content-type", "application/json");
                xml.send(JSON.stringify({ "mail": input_mail.value }));
                xml.addEventListener("load", function () {
                        error_message.innerText = "*" + xml.responseText;
                        error_message.style.display = "block";
                        input_mail.value = "";
                })
        }
        else
                error_message.innerText = "* Please enter a valid email address";
        error_message.style.display = "block";
        input_mail.value = "";
}