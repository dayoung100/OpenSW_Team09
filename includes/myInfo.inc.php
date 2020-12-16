<?php
if(isset($_POST['my-info'])){

    require 'dbh.inc.php';

    $username = $_POST['nuid'];
    // $email = $_POST['nmail'];
    $password = $_POST['npwd'];
    $passwordRepeat = $_POST['npwd-repeat'];
    // $id = $_SESSION['userId'];
    $uid = $_SESSION['userUid'];

    if($password !== $passwordRepeat){
        header("Location: ../settings.php?error=passwordcheck&uid".$username."&mail=".$email);
        exit();
    }
    else{
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        // $sql = "UPDATE users SET uidUsers='".$username."', emailUsers='".$email."', pwdUsers='".$hashedPwd.' WHERE idUsers=".$id;
        // $sql="UPDATE users set uidUsers = '$username',emailUsers='$email', pwdUsers='$hashedPwd' where idUsers= '$id'";
        $sql="UPDATE users set emailUsers='$email', pwdUsers='$hashedPwd' where uidUsers= '$uid'";


        $res = mysqli_query($conn, $sql);
        if ($res==TRUE){
            header("Location: ../settings.php?update=success");
            exit();  
        } 
        else {
            // header("Location: ../settings.php?error=sqlerror");
            header("Error updating user info: " . mysqli_error($conn));
            // echo "Error updating user info: " . mysqli_error($conn);
            exit();
        }
    }
    mysqli_close($conn);
}
else{
    header("Location: ../settings.php");
    exit();
}