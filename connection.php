<?php

session_start();

$database = 'localhost';
$database_user = 'root';
$database_pass = '';
$database_name = 'Login1';

//connecting to the data base

$con = mysqli_connect($database, $database_user, $database_pass, $database_name);

if(mysqli_connect_error()){
    exit('failed to connect to the databse :' . mysqli_connect_errno());
}


if($stmt=$con->prepare('SELECT id, password FROM `users` WHERE `email`=?')){
    $stmt->bind_param('s',$_POST['email']);
    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows > 0 ){
        $stmt-> bind_result($id, $pass);
        $stmt->fetch();

        //to verify password 
        if($_POST['password'] === $pass){
            //creating session
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;

            if(!empty($_POST['remember'])){
   
                //set cookie
                setcookie('email', $_POST["email"], time()+3600);//time equivalent to 1 day
                setcookie('password', $_POST["password"], time()+3600);
           }else {
            setcookie("email","");
            setcookie("password","");
            echo "Cookies Not Set";
        }
            header('Location: home.php');
        }else{
            echo ('Incorrect password!');
            header('refresh:1;url=index.php');
        }
    }else{
        echo ('Incorrect Email');
        header('refresh:1;url=index.php');
    }
    $stmt->close();
}

