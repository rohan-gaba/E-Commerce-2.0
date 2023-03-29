let new_password=document.getElementById("new_pass");
let confirm_new_password=document.getElementById("cnew_pass");
let message=document.getElementById("message");
function change_password()
{
    if(password_validation())
    {
        let request=new XMLHttpRequest();
        request.open("POST","/changepassword");
        request.setRequestHeader("content-type","application/json");
        request.send(JSON.stringify({"new_pass":new_password.value,"cnew_pass":confirm_new_password.value}));
        request.addEventListener("load",function(){
                message.innerText="*"+request.responseText;
                new_password.value="";
                confirm_new_password.value="";
        })
    }
}

function password_validation()
{
    if(new_password.value.trim()&&confirm_new_password.value.trim())
    return true;
    return false;
}