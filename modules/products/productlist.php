<?php 
include('admin/configs/connectDB.php');
    $id = $_GET['id'] ??'1';
    $sql_product = "SELECT * FROM categories,products WHERE categories.catID=products.catID AND products.catID = '$id' ORDER BY products.productID ASC";
    $query = $connect->query($sql_product);
    $result = $query->fetch_all(MYSQLI_ASSOC);
include('admin/configs/closeDB.php');
?>
    <div class="products" id="product-sportback">
        <?php foreach($result as $array): ?>
        <div class="product-item">
            <a href="modules/products/productdetail.php?id=<?php echo $array['productID'] ?>">
                <img src="admin/modules/handles/upload/<?php echo $array['imageLink'];?>"
                alt="<?php echo $array['productName'] ?>">
                <h5><?php echo $array['productName'] ?></h5>
                <!-- <h5><?php echo $array['productCode'] ?></h5> -->
            </a>
        </div>
        <?php endforeach ?>
    </div>