<!DOCTYPE html>
<?php 
include ("config.php"); 
?>
<html>
<head>
<title> SignUp </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
</head>                                                                                         
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
     <div class="col-sm-4">
      
    </div>
     <div class="col-sm-4">
    </div>
  </div>              
	<div class="row">
<?php 
 if(isset($_POST['signup'])){
  extract($_POST);

//--------------------------------------------------fname---------------------------------------------------------------------------//
  if(strlen($fname)<3){ // Minimum 
      $error[] = 'Please enter First Name using 3 charaters atleast.';
        }
if(strlen($fname)>20){  // Max 
      $error[] = 'First Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
            $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
        }

//--------------------------------------------------lname----------------------------------------------------------------------//        
if(strlen($lname)<3){ // Minimum 
      $error[] = 'Please enter Last Name using 3 charaters atleast.';
        }
if(strlen($lname)>20){  // Max 
      $error[] = 'Last Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
            $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
              }
              
//--------------------------------------------------username------------------------------------------------------------------------//              
      if(strlen($username)<3){ // Change Minimum Lenghth   
            $error[] = 'Please enter Username using 3 charaters atleast.';
        }
  if(strlen($username)>50){ // Change Max Length 
            $error[] = 'Username : Max length 50 Characters Not allowed';
        }
  if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
            $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername, okuniqueuser or myusername123';
        }  

//----------------------------------------------email-------------------------------------------------------------//        
if(strlen($email)>50){  // Max 
            $error[] = 'Email: Max length 50 Characters Not allowed';
        }
   if($passwordConfirm ==''){
            $error[] = 'Please confirm the password.';
        }
        if($password != $passwordConfirm){
            $error[] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }
        
         if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }
          $sql="select * from users where (username='$username' or email='$email');";
      $result=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);

     if($username==$row['username'])
     {
           $error[] ='Username alredy Exists.';
          } 
       if($email==$row['email'])
       {
            $error[] ='Email alredy Exists.';
          } 
      }
         if(!isset($error)){ 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
    $password = password_hash($password,PASSWORD_BCRYPT,$options);
            
            $result = mysqli_query($dbc,"INSERT into users(fname,lname,username,email,password,date) values('$fname','$lname','$username','$email','$password','$date')");

           if($result)
    {
     $done=2; 
    }
    else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>

		 <div class="col-sm-4">
     
 <?php 
  if(isset($error)){ 
foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
}
}
?>
		</div>
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
       <div class="signup_form">
       <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/USS.svg/1200px-USS.svg.png" alt="GOogle" class="logo img-fluid"> <br>
		<form action="" method="POST">
  <div class="form-group">
  	
        <label class="label_txt">First Name</label>
    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">Last Name </label>
    <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
  </div>
 
<div class="form-group">
    <label class="label_txt">Username </label>
    <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
  </div>

<div class="form-group">
    <label class="label_txt">Email </label>
    <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">Password </label>
    <input type="password" name="password" class="form-control" required="">
  </div>
   <div class="form-group">
    <label class="label_txt">Confirm Password </label>
    <input type="password" name="passwordConfirm" class="form-control" required="">
  </div>
  <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
   <p>Have an account?  <a href="login.php">Log in</a> </p>
</form>
<?php } ?> 
</div>
		</div>
		<div class="col-sm-4">
		</div>

	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</html>
