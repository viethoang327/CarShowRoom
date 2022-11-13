<?php 
include('../../templates/header.php');
include('../../admin/configs/connectDB.php');

if(isset($_GET['search'])){
    $keyword = $_GET['keyword'];
}else{
    $keyword = '';
}
$sql = "SELECT * FROM products WHERE productName LIKE '%$keyword%' ";
$query_search = $connect->query($sql);
$rows = $query_search->fetch_all(MYSQLI_ASSOC);
?>
<div class="container-md m-3 p-3 text-center">
    <?php if(isset($rows[0])): ?>
        <h3 >Từ khóa tìm kiếm: <?php echo $_GET['keyword'];  ?> </h3>
        <?php foreach($rows as $row): ?>
        <div class="row">
            <div class="product-img col">
                <img width="50%" src="../../admin/modules/handles/upload/<?php echo $row['imageLink'];?>" alt="">
            </div>
            <div class="product-detail col">
                <form action="../carts/addtocart.php?proid=<?php echo  $row['productID'] ?>" method="POST">
                    <h3>Tên sản phẩm: <?php echo $row['productName'] ?></h3>
                    <p>Danh mục sản phẩm: <?php echo $row['catID'] ?></p>
                    <p>Mã sản phẩm: <?php echo $row['productCode'] ?></p>
                    <p>Giá sản phẩm: <?php echo number_format($row['price'],0,',','.').' VNĐ'; ?></p>
                    <p>Số lượng sản phẩm: <?php echo $row['quantity'] ?></p>
                    <p><?php echo $row['description'] ?></p>
                    <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="btn btn-success btn-lg">            
                </form>
            </div>  
        </div>
        <?php endforeach ?>
    <?php else: ?> 
        <h3>Từ khóa tìm kiếm: <?php echo "Không tìm thấy sản phẩm tương ứng với từ khóa"  ?> </h3>
    <?php endif ?>   
</div>

<?php include('../../templates/footer.php'); ?>