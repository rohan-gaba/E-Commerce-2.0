<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../../static/Authentication/password/mail_sent.css">
</head>
<body>
<div class="header">
    <p id="error_message" style="display:none; color:red;"></p>
    <h1 id="heading">Enter your new password</h1>
    <hr>
    <div class="box">
        <form onsubmit="return false">
            <input type="password" placeholder="Enter here..." name="password" style="width:100%; padding: 5px;" id="password">
            <br>
            <br>
            <button class="submit" id="submit">Submit</button>
            <button class="submit" style="display:none; margin:auto;" id="home"><a href="/" id="home" style="text-decoration:none;">HOME</a></button>
        </form>
    </div>
 </div>
 <script src="../../static/Authentication/password/change_forgot_password.js"></script>
</body>
</html>