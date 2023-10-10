<?php
include ("config.php");
if(isset($_POST['sublogin']))
{
    $login=$_POST['login_var'];
    $password=$_POST['password'];
    $query= "select * from users where (username='$login' or email='$login')";
    $result=mysqli_query($dbc,$query);
    $numRow=mysqli_num_rows($result);
    if($numRow == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password'])){
            $_SESSION["login_sess"]="1";
            $_SESSION["login_email"]= $row['email'];
    header("location:account.php");
        }
        else{
            header("location:login.php?loginerror=".$login);
        }
    }
    else{
        header("location:login.php?loginerror=".$login);
    }
}
?>
