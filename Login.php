<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="login_form">
                
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/USS.svg/1200px-USS.svg.png" alt="GOogle" class="logo img-fluid"> <br>
            <?php
if(isset($_GET['loginerror'])) {
  $loginerror=$_GET['loginerror'];
}
if(!empty($loginerror)){ echo '<p class="errmsg">Invalid login credentials, Please Try Again....</p>' ; }  ?>
        
      <form action="login_process.php" method="POST">
  
      <div class="form-group">
    <label class="lable_text">Username or Email</label>
    <input type="text" name="login_var" value="<?php  if(!empty($loginerror)){ echo $loginerror; } ?>" class="form-control">
    
  </div>
  <div class="form-group">
    <label class="lable_text">Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  
  <button type="submit" name="sublogin" class=" form_btn btn btn-primary">Login</button>
</form>

<p style="font-size: 12px;text-align: center;margin-top: 10px;"><a href="forgot-password.php" style="color: #00376b;">forgot password?</a></p>
    <br>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
</div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    </div>
<!-- </div> -->
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</html>
