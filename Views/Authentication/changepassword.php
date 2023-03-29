<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../static/authentication/password/password.css">
</head>

<body>
    <div class="header">
        <h4 style="color: red;" id="message"></h4>
        <p style="margin: 0; text-align: left; font-size: larger;" class="cursor"><a href="/" style="color: red;"><i
                    class="fa fa-home" aria-hidden="true"> HOME</i></a></p>
        <h1>Change Password</h1>
        <hr>
        <form onsubmit="return false">
            <div class="box">
                <label>New Password</label>
                <br>
                <input type="password" id="new_pass" placeholder="Enter here" required />
            </div>
            <div class="box">
                <label>Confirm New Password</label>
                <br>
                <input type="password" id="cnew_pass" placeholder="Enter here" required />
            </div>
            <button class="submit" onclick="change_password();">Submit</button>
        </form>
    </div>
    
<script src="../../static/authentication/password/password.js" type="text/javascript"></script>
</body>

</html>