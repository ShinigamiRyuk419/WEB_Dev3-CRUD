<?php
    session_start();

    $fname = '';
    $lname = '';
    $address = '';
    $errors = array();
    

    //to connect to database

    $db = mysqli_connect('localhost', 'root', '', 'login1');


    //receiving inputs
if(isset($_POST['reg-user'])){
    $fname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lname = mysqli_real_escape_string($db, $_POST['lastname']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);
    $confirm = mysqli_real_escape_string($db, $_POST['confirm']);

    
//to validate the form

if(empty($fname)){
    array_push($errors,'Firstname is required!');
}
if(empty($lname)){
    array_push($errors,'Lastname is required!');
}
if(empty($address)){
    array_push($errors,'Address is required!');
}
if(empty($email)){
    array_push($errors,'Email is required!');
}
if($pass != $confirm){
    array_push($errors,'Password did not match!');
}

//to validate password strength
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number = preg_match('@[0-9]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);

if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
    array_push($errors,'Password is too weak! please include uppercase, numbers and special characters');
}

//checking if the user already exist

$check_user= "SELECT * FROM users WHERE lastname='$lname' OR email='$email' LIMIT 1";
$result= mysqli_query($db, $check_user);
$user=mysqli_fetch_assoc($result);


//if user already exist
if($user){
    if($user['lastname']===$lname){
        array_push($errors, 'User already exists');
    }

    if ($user['email']===$email){
        array_push($errors, "Email already exists!");
    }
}
//if no errors register the new user

if(count($errors)== 0){

    $query = "INSERT INTO users (firstname, lastname, address, email, password) VALUES('$fname','$lname', '$address', '$email', '$pass')";
    mysqli_query($db, $query );



    $_SESSION['lastname']=$lname;
    $_SESSION['success'] = 'You registered successfully';
    header('location:home.php');
}

}

?>