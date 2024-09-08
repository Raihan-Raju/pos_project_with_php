<?php
    session_start();

$conn = new mysqli('localhost','root','','pos_project');

if(isset($_POST["btnLogin"])){
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];
   

    $dataselect = "SELECT * FROM user Where username='$username' and password='$password'";
    $dataquery = mysqli_query($conn,$dataselect);
   
    
    $dataarray = mysqli_fetch_assoc($dataquery);


   
    if($dataarray){
        $_SESSION["sname"] = $username;
        header("location:dashboard.php");
    }else{
        $msg="User or password is not correct !";
    }
}
       
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets2/login/style.css">

    <style>
       
    </style>
</head>
<body>
    <di v class="logo">
        <h1 class="text-danger">
            <img style="width: 200px;" src="assets2/logo/logopic.png" alt="">
        </h1>
    </div>

    <div class="container">


        <h2>Login Form</h2> 
       

           <p style=" color: red ";> 
                 <?php
                echo isset($msg)?$msg:"";
                  ?>
            </p>
        <form action="#" method="post" class="form">
       
            <label for="userId"><span>User name</span></label>
            <input type="text" name="txtUsername" id="userId">
            <label for="password"><span>Password</span></label>
            <input type="password" name="txtPassword" id="password">
            <div>
            <input type="submit" value="Login" name="btnLogin" id= "button" class= "btn btn-login bg-primary">
        </div>
        </form>
            <p class="newUser">
                Not a member? <span>Signup now</span>
            </p>

        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
