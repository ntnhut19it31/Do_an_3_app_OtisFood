<?php
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
    require_once "connect.php";
    require_once "validate.php";
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $email = validate($_POST['email']);
    $sql = "insert into users values('', '$username', '".md5($password)."', '$email')";
    if(!$conn->query($sql)){
        echo "failure";
    }else{
        echo "success";
    }
}
?>