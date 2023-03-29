<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../../static/authentication/password/password.css">
</head>
<body>
<div class="header">
  <p style="color:red ;display: none;" id="error_message"></p>
<h1>Forgot Password</h1>
<hr>  
<br>  
<br>
<form onsubmit="return false">
  <div class="box" style="margin-top: 0;">
<label>Mail</label>
<br>
<input type="mail" name="mail" placeholder="Enter here...." id="input_mail" >
<br>
<br>
<br>
<br>
<button class="submit" onclick="forgot_password()">Submit</button>
</div>
</form>
</div>
<script src="../../static/authentication/password/forgot_password.js" type="text/javascript"></script>
</body>
</html>