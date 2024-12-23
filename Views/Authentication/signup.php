<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="../../static/authentication/signup/signup.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background: url('https://images.unsplash.com/photo-1432821596592-e2c18b78144f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bG9naW58ZW58MHx8MHx8&w=1000&q=80');background-repeat: no-repeat;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;">
  <div  class="form signup_div"  >
    <form method="POST"  onsubmit="return false">
      <h1 style="text-align: center;">Create Account</h1>
      <p style="color:red; display:none" id="signup_empty">* Values can't be empty</p>
      <p style="color:red">
      </p>
      <div style="text-align: center; margin:2rem">
        <input type="radio" name="who" value="admin" id="signup_type_seller"><label for="admin"
          style="margin-right:2rem;">Seller</label>
        <input type="radio" name="who" value="user" id="signup_type_user"><label for="user">User</label>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="signup_name">
      </div>
      <!-- user input -->

      <!-- E-mail -->
      <div class="form-outline mb-4">
        <label class="form-label">E-mail</label>
        <input type="mail" class="form-control" name="mail" id="signup_mail">
      </div>

      <!-- for mobile number -->
      <div class="form-outline mb-4">
        <label class="form-label">Phone</label>
        <input type="number" maxlength="10" class="form-control" name="mobile" id="signup_mobile" >
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="signup_password">
      </div>  

      <!-- Submit button -->
      <button class="btn btn-primary btn-block mb-4" style="margin-left:45%;" onclick="signup_send()">Submit</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p onclick="log()" style="color:blue;" class="anchor">Already have account? Login</p>
        <a href="/" id="a">continue without login </a>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="../../static/authentication/signup/signup.js"></script>
</body>

</html>