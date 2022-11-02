<?php
    $db = mysqli_connect('localhost', 'root', '', 'login1');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `tasks` where id=$id";
        $db->query($sql);
    }
    header('location:home.php');
    exit;
?>
