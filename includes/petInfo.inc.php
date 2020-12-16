<?php
if(isset($_POST['my-info'])){

    require 'dbh.inc.php';

    $petname = $_POST['pname'];
    // $email = $_POST['nmail'];
    $type = $_POST['type'];
    $id = $_SESSION['userId'];
    $uid = $_SESSION['userUid'];

    // INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)
    $sql="INSERT INTO pets (name, type, owner) VALUES  ($petname, $type, $id)";
    $res= mysqli_query($conn, $sql);
    if ($res==TRUE){
        header("Location: ../settings.php?insert=success");
        exit();  
    } 
    else {
        // header("Location: ../settings.php?error=sqlerror");
        header("Error updating user info: " . mysqli_error($conn));
        // echo "Error updating user info: " . mysqli_error($conn);
        exit();
    }
    

    mysqli_close($conn);
}
else{
    header("Location: ../settings.php");
    exit();
}