<?php include('../../templates/header.php'); ?>
<?php
include('../../admin/configs/connectDB.php');
    $id = $_GET['id'];
    $sql_detail= "SELECT * FROM categories,products WHERE categories.catID=products.catID AND products.productID = '$id' LIMIT 1";
    $query = $connect->query($sql_detail);
    $result = $query->fetch_all(MYSQLI_ASSOC);
include('../../admin/configs/closeDB.php');
    foreach($result as $array):
?>
<div class="container-lg text-center">
    <div class="row">
        <div class="product-img col">
            <img width="50%" src="../../admin/modules/handles/upload/<?php echo $array['imageLink'];?>" alt="">
        </div>
        <div class="product-detail col">
            <form action="../carts/addtocart.php?proid=<?php echo  $array['productID'] ?>" method="POST">
                <h4><?php echo $array['catName'] ?></h4>
                <h4><?php echo $array['productName'] ?></h4>
                <h4 class="fw-bolder">Mã: <?php echo $array['productCode'] ?></h4>
                <h4 class="fw-light">Giá: <?php echo number_format($array['price'],0,',','.').' VNĐ'; ?></h4>
                <p>Tình trạng: <?php 
                if($array['quantity']>0){echo "Còn hàng";}else{echo"Hết hàng";}
                 ?></p>
                <h5 class="fst-italic"><?php echo $array['description'] ?></h5>
                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn btn-success btn-lg">            
            </form>
        </div>  
    </div>
</div>
    <?php endforeach?>
<?php include('../../templates/footer.php'); ?>