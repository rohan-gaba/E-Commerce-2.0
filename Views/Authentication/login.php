
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../static/authentication/login/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: url('https://images.unsplash.com/photo-1432821596592-e2c18b78144f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bG9naW58ZW58MHx8MHx8&w=1000&q=80');background-repeat: no-repeat;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
   

<div class="form">
      <form  id="login_form" method="POST" action="login.php" onsubmit="return false">
        <h1 style="text-align: center;">Login</h1>
        <p style="color:red; display:none;" id="login_empty">* Values can't be empty</p>
            <div style="text-align: center; margin:2rem">
              <input type="radio" name="who" value="1" id="login_type_admin"><label for="admin"style="margin-right:2rem;">Seller</label>
              <input type="radio" name="who" value="0" id="login_type_user"><label for="user">User</label>
            </div>


            <div class="form-outline mb-4">
              <label class="form-label">Mail</label>
              <input type="mail" class="form-control" name="mail" id="login_mail">
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="login_password">
            </div>

            <!-- Submit button -->
            <!-- <input type="submit" class="btn btn-primary btn-block mb-4" style="margin-left:45%;" > -->
            <button class="btn btn-primary btn-block mb-4" id="login_sumbit_button" style="margin-left:45%;" onclick="login_send()">Submit</button>
            <!-- <button class="btn btn-primary btn-block mb-4" style="margin-left:45%;" onclick="login_send()">Submit</button>  -->

            <!-- Register buttons -->
            <div class="text-center">
              <p onclick="sign()" style="color:blue;" class="anchor">Not a member? Register</p>
              <p onclick="forgotpassword()" style="color:blue;" class="anchor">Forgot Password</p>
              <a href="/" id="a">continue without login </a>
            </div>
      </form>
    </div>
    <script src="../../static/authentication/login/login.js"></script>
</body>
</html>