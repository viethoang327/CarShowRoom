<?php
	$email = $password = $confirmPassword = $phoneNumber = $name= '';
	include ("../../admin/configs/connectDB.php");
	include ("../../templates/header.php");
		if(isset($_POST['login'])){
			if(empty($_POST['email'])) {
				$errEmail = "Bạn chưa nhập email";
			} else {
				$email = $_POST['email'];
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					$errEmail = "Email không hợp lệ!";
				}
			}
			if(empty($_POST['password'])) {
				$errPassword = "Bạn chưa nhập password";
			}else {
				$password = $_POST['password'];
				if(!preg_match('/^[A-Za-z0-9]{6,}$/', $password)) {
					$errEmail = "Password phải có ít nhất 6 kí tự!";
				}
			}
			if(empty($_POST['confirmPassword'])) {
				$errConfirmPassword = "Bạn chưa nhập xác nhận mật khẩu!";
			} else {
				$confirmPassword = $_POST['confirmPassword'];
				if(strcmp($password,$confirmPassword) != 0) {
					$errConfirmPassword = "Xác nhận mật khẩu chưa chính xác!";
				}
			}
			if(empty($_POST['name'])) {
				$errName = "Bạn chưa nhập tên";
			} else {
				$name = $_POST['name'];
			}
			if(empty($_POST['phoneNumber'])) {
				$errPhoneNumber = "Bạn chưa nhập số điện thoại";
			} else {
				$phoneNumber = $_POST['phoneNumber'];
			}
			$sql = "INSERT INTO users(userEmail,userPassword,userName,userPhone)
			         VALUES ('$email','$password','$name','$phoneNumber')";
			$qr = $connect->query($sql);
			if($qr === true) {
               $inform = "Chúc mừng, bạn đã tạo tài khoản thành công!";
			} else {
				die("error".$connect->error);
			}
		}
	include ("../../admin/configs/closeDB.php");
?>
<div class="container-md m-5 p-5 justify-content-center">
    <div class="row p-5 ">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
        <div class="mb-5 px-5">
            <h2 class="text-center"> Đăng kí tài khoản</h2>
        </div>
        <div class="mb-5 px-5">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="ví dụ:thienhavodich@gmail.com" aria-describedby="errorEmail">
			<div id="errorEmail" class="form-text"><?php echo $errEmail ?? '' ?></div>
        </div>
        <div class="mb-5 px-5">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="pass" aria-describedby="errorPassword">
			<div id="errorPassword" class="form-text"><?php echo $errPassword ?? '' ?></div>
        </div>
		<div class="mb-5 px-5">
            <label for="pass" class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" id="pass" aria-describedby="errorconfirm">
			<div id="errorconfirm" class="form-text"><?php echo $errConfirmPassword ?? ''  ?></div>
        </div>
		<div class="mb-5 px-5">
            <label for="pass" class="form-label">Your name</label>
            <input type="text" name="name" class="form-control" id="pass" aria-describedby="errorName">
			<div id="errorName" class="form-text"><?php echo $errName ?? ''  ?></div>
        </div>
		<div class="mb-5 px-5">
            <label for="pass" class="form-label">Phone number</label>
            <input type="text" name="phoneNumber" class="form-control" id="pass" aria-describedby="errorPhone">
			<div id="errorPhone" class="form-text"><?php echo $errPhoneNumber ?? ''  ?></div>
        </div>
        <div class="mb-3 px-5">
            <button type="submit" name="login" class="btn btn-primary" aria-describedby="error">Đăng kí</button>
			<a href="../../home.php" type="submit" name="login" class="btn btn-primary ">Quay về trang chủ</a>
            <div id="error" class="form-text text-success"><?php echo $inform ?? '' ?></div>
        </div>
    </form>
    </div>
</div>