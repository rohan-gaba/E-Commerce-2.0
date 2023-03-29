password=document.getElementById('password');
submit=document.getElementById('submit');
home=document.getElementById('home');
heading=document.getElementById('heading');
error_message=document.getElementById('error_message');
submit.addEventListener("click",function () {
    if(password.value.trim())
    {
        let request=new XMLHttpRequest();
        request.open('POST','/forgot_password1');
        request.setRequestHeader("content_type","application/json");
        request.send(JSON.stringify({"password":password.value}));
        request.addEventListener("load",function()
            {        
            
            if(request.responseText=="Password change successfully")
            {
                password.style.display="none";
                submit.style.display="none";
                home.style.display="block";
                heading.innerText=request.responseText;
            }
            else{
            error_message.style.display="block";
            error_message.innerText="* "+request.responseText;
            password.value="";
            }
        })
        return;
    }
    error_message.style.display="block";
    error_message.innerText="* Please enter a valid password";
})