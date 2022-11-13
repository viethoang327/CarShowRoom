<?php 
include('../../admin/configs/connectDB.php');
include('../../templates/header.php');
if(isset($_POST['oder'])){
    if(!empty($email)){
        $error = "Bạn chưa nhập email1!";
    }else{
        $email = $_POST['email'];
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $price = $_POST['price'];
        $sql = "INSERT INTO oders(oderEmail,oderName,phone,address,price,note) VALUE('$email','$name','$phone','$address','$note','$price')";
        if($connect->query($sql)){
            // $mail_to= $email;
			// $subject= 'ODER SUCESSFULLY';
			// $message= "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi, dưới đây là thông tin đơn hàng của bạn: ...";
			// $check = mail($mail_to, $subject, $message);
			// 	if($check){
				$success = "Bạn đã oder thành công, vui lòng kiểm tra email để xem thông tin đơn hàng";
				// }else{
				// echo 'send mail fail';
				// }
        }else{
            echo "Query Fail";
        }
    }   
}
include('../../admin/configs/closeDB.php');
?>
<div class="container-md text-center justify-content-center ">
    <div class="text-bg-success my-5 mx-5 p-3">
        <?php echo $success ?>
    </div>
    <a href="../../home.php" class="btn btn-primary">Quay về trang chủ</a>
</div>