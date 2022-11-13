<?php include('../../templates/header.php') ?>
<?php
    $totalprice = $_GET['totalprice'];
 ?>
<div class="container-md justify-content-center">
    <h1 class="my-5">Chi tiết đặt hàng</h1>
    <form action="oderinfor.php" method="POST">
        <div class="mb-3">
            <label for="fullname" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="fullname" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Chúng tôi sẽ gửi cho bạn thông báo đơn hàng qua email này</div>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="fullname" id="fullname">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address">    
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Ghi chú cho người bán</label>
            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="totalprice" class="form-label">Thành tiền</label>
            <input type="text" readonly class="form-control-plaintext" name="price" id="staticEmail" value="<?php echo number_format($totalprice ?? 0 ,0,',','.').' VNĐ'?? 0 ; ?>">
        </div>
        <button type="submit" name="oder" class="btn btn-primary">Đặt hàng</button>
    </form>
</div>