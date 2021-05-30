<?php 
if(isset($_POST['password']) && isset($_POST['email'])){
    require_once "connect.php";
    require_once "validate.php";
    $password = validate($_POST['password']);
    $email = validate($_POST['email']);
    $sql = "select * from users where password='".md5($password)."' and email='$email'";
    $result = $conn->query($sql);
    if($result->num_rows >0){
        echo "success";
    }else{
        echo "failure";
    }
}
?>