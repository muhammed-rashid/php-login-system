<?php
session_start();

$errors = [];
$con = mysqli_connect('localhost','root','','users') or die('cannot able to connect db');
if(isset($_POST['register'])){
$user_name = mysqli_real_escape_string($con,$_POST['user_name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password_1 = mysqli_real_escape_string($con,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($con,$_POST['password_2']);

//validating user inputs

if(!$user_name || !$email ||!$password_1 || !$password_2){
    array_push($errors,'all fields are required');
}

// check password 1 equels password 2

if($password_1 != $password_2){
    array_push($errors,'passwords do not match');
}

//user already exist check

$sql = "SELECT * from user WHERE email = '$email'LIMIT 1";
$result = mysqli_query($con,$sql);
$user = mysqli_fetch_assoc($result);
if($user){
    array_push($errors,'email is already taken');
}

//adding to db

if(count($errors) == 0){
    $hash_pass = md5($password_1);
   $add_query =  "INSERT INTO user (user_name,email,password) values('$user_name','$email','$hash_pass')";
    mysqli_query($con,$add_query);

    $_SESSION['username'] = $username;
    header("location:index.php");
}
}
// login logic

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email)){
        array_push($errors,'pleese enter the user name');
    }
    if(empty($password)){
        array_push($errors,'pleese enter the password');
    }
    if(count($errors)==0){
        
        $password = md5($password);
        $login_query = "SELECT * FROM user WHERE email == '$email' AND password = '$password'";
        $result = mysqli_query($con,$login_query);
         
         if(mysqli_num_rows($result)){
            echo('hello');
         }
    

    }
    
    
}

?>