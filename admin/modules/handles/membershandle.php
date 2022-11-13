<?php
include ('../../configs/connectDB.php');
//add function
if(isset($_POST['add'])){
    $userId = $_POST['userId'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sql_add = "INSERT INTO users(userID,userEmail,userPassword,userName,userPhone) VALUE('$userId','$email','$password','$name','$phone')";
    $connect->query($sql_add);
    header('Location:../../index.php?navigate=members');
}
//edit function
if(isset($_POST['edit'])){
    $newemail = $_POST['newemail'];
    $newpassword = $_POST['newpassword'];
    $newname = $_POST['newname'];
    $newphone = $_POST['newphone'];
    $id = $_GET['userid'];
    $sql_edit = "UPDATE users SET userEmail = '$newemail', userPassword = '$newpassword', userName = '$newname', userPhone = '$newphone' WHERE userID = '$id'";
    $connect->query($sql_edit);
    header('Location:../../index.php?navigate=members');
}
//delete function
if(isset($_GET['action'])=='delete'){
    $id = $_GET['userid'];
    $sql_delete = "DELETE FROM users WHERE userID = '$id'";
    $connect->query($sql_delete);
    header('Location:../../index.php?navigate=members');
}
?>