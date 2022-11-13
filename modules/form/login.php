<?php 
session_start();
include ("../../admin/configs/connectDB.php");
include ("../../templates/header.php");
$email=$pass="";
$err_email=$err_pass="";
if (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // query DB
    $sql = "SELECT userName,userEmail,userPassword FROM users WHERE userEmail = '$email'";
    $result = $connect->query($sql);
    //fetch to arr
    $arr_result = $result->fetch_array(MYSQLI_ASSOC);
    // compare password 
    if ($arr_result['userPassword']===$pass) {
        $_SESSION['userName'] = $arr_result['userName'];
        header("location: http://localhost/eproject/home.php");
    }else{
        $err_pass = " Bạn đã nhập sai email hoặc mật khẩu, vui lòng thử lại!";
    }
    // free result and close DB
    $result -> free_result();
    $connect->close();

}
?>
<div class="container-md m-5 p-5 justify-content-center">
    <div class="row p-5 ">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
        <div class="mb-5 px-5">
            <h2 class="text-center"> Đăng nhập</h2>
        </div>
        <div class="mb-5 px-5">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email của bạn" >
        </div>
        <div class="mb-5 px-5">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
        </div>
        <div class="mb-3 px-5">
            <button type="submit" name="login" class="btn btn-primary" aria-describedby="error">Đăng nhập</button>
            <div id="error" class="form-text"><?php echo $err_pass ?></div>
        </div>
    </form>
    </div>
</div>