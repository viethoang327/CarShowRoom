<?php 
include('../../templates/header.php');
session_start();
 ?>
<div class="container-md text-center justify-content-center">
    <h1 class="my-5">Giỏ hàng của bạn</h1>
    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Quản lý</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_SESSION['cart'])):
                $i = 0;
                $total = 0;
                // print_r($_SESSION['cart']);
                foreach($_SESSION['cart'] as $cart_item):
                    $money = $cart_item['quantity']*$cart_item['price'];
                    $total +=$money;
                    $i++;
            ?>
                    <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $cart_item['productCode'] ?></td>
                    <td><?php echo $cart_item['productName'] ?></td>
                    <td><img width="150px" src="../../admin/modules/handles/upload/<?php echo $cart_item['imageLink'];?>" alt=""></td>
                    <td> 
                        <a href="addtocart.php?add=<?php echo $cart_item['productID']?>"><i class="ti-plus"></i></a> 
                        <?php echo $cart_item['quantity']  ?> 
                        <a href="addtocart.php?remove=<?php echo $cart_item['productID']?>"><i class="ti-minus"></i></a>
                    </td>
                    <td><?php echo number_format($cart_item['price'],0,',','.').' VNĐ'; ?></td>
                    <td><?php echo number_format($money,0,',','.').' VNĐ';?></td>
                    <td><a href="addtocart.php?delete=<?php echo $cart_item['productID'] ?>"><button class="btn btn-secondary">Xóa</button></a></td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <td colspan ="8"><p>Giỏ hàng hiện đang trống</p></td>
            <?php endif ?>    
        </tbody>
        <tfoot>
            <tr>
                <th scope='row' colspan="6">Tổng tiền</th>
                <td><?php echo number_format($total ?? 0 ,0,',','.').' VNĐ'; ?></td>
                <td><a class="btn btn-secondary" href="addtocart.php?deleteAll=1"> Xóa tất cả</a></td>
            </tr>
            <tr>
            <td colspan="8"><a href="../oders/oders.php?totalprice=<?php echo $total ?? 0 ; ?>" class="btn btn-primary">Đặt hàng</a></td>
            </tr>
        </tfoot>
    </table>        
</div>
