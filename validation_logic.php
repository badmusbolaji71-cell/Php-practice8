<?php
$name = $nameerror= $email = $emailerror = $age = $ageerror = $password = $passworderror = $pages = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "validation";
$connection = new mysqli($servername,$username,$password , $dbname);
if($connection){
    // echo "The database is connected";
}else{};
    

if(isset($_POST["submit"])){
    $istrue = true;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    //  $istrue =false;
    // if($istrue){
// if($istrue = false){
    if(empty($name) || empty($email) || empty($age) || empty($password)){
        $pages = "*All box must be filled ";
        $istrue = false;
    }else{
        // echo "Success";
    }
    if(empty($name)){
        $nameerror = "*Name must be filled";
        $istrue = false;
    }
    if(empty($email)){
        $emailerror = "*Input email";
        $istrue = false;
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailerror = "*Email should be well written e.g example@gmail.com";
        $istrue = false;
    }else{}
        $select = mysqli_query(
        $connection,
        "SELECT email FROM validation WHERE email = '$email'"
        );
 if(mysqli_num_rows($select) >0){
    $emailerror  = "email already exists";
    $istrue = false;
 }

    if(empty($age)){
        $ageerror = "*input age";
        $istrue = false;
    }elseif($age < 18){
        $ageerror = "*You must be 18yrs and above ";
        $istrue = false;
    }else{}
    if(empty($password)){
        $passworderror = "*Input password";
        $istrue = false;
    }

    if($istrue){
        $insert = "INSERT into validation(name,email,age,password) VALUES('$name','$email','$age','$password')";
$insert_query = mysqli_query($connection,$insert);
// $istrue = true;
if($insert_query){
    // echo "success";
        header("Location:login.php");
}else{
    // echo "failed";
}

    }


    
};
?>