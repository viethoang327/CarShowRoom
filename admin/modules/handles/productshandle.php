<?php
include ('../../configs/connectDB.php');
// CATALOG Table function
if(isset($_POST['addcat'])){
    $catname = $_POST['catname'];
    $catid = $_POST['catid'];
    $sql_addcat = "INSERT INTO categories(catID,catName) VALUE('$catid','$catname')";
    $connect->query($sql_addcat);
    header('Location:../../index.php?navigate=products');
}
if(isset($_GET['act'])=='deletecat'){
    $idcat = $_GET['catid'];
    $sql_deletecat = "DELETE FROM categories WHERE catID = '$idcat'";
    $connect->query($sql_deletecat);
    header('Location:../../index.php?navigate=products');
}
if (isset($_POST['addproduct'])){
    $productid = $_POST['productid'];
    $productname = $_POST['productname'];
    $productcode = $_POST['productcode'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $descript = $_POST['descript'];
    $catename = $_POST['catename'];
    $imglink = $_FILES['imglink']['name'];
    $imglink = time().'_'.$imglink;
    $imglink_tmp = $_FILES['imglink']['tmp_name'];
    move_uploaded_file($imglink_tmp,'upload/'.$imglink);
    $sql_addproduct = "INSERT INTO products(productID,productName,productCode,price,quantity,catID,description,imageLink) VALUE('$productid','$productname','$productcode','$price','$quantity','$catename','$descript','$imglink')";
    $connect->query($sql_addproduct);
    header('Location:../../index.php?navigate=products');
}elseif(isset($_POST['editproduct'])){
    $id = $_GET['productid'];
    $productname = $_POST['productname'];
    $productcode = $_POST['productcode'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $descript = $_POST['descript'];
    $catename = $_POST['catename'];
    $imglink = $_FILES['imglink']['name'];
    $imglink = time().'_'.$imglink;
    $imglink_tmp = $_FILES['imglink']['tmp_name'];
    move_uploaded_file($imglink_tmp,'upload/'.$imglink);
    $sql_editproduct = "UPDATE products SET productID='$id', productName = '$productname',productCode = '$productcode',price = '$price',quantity = '$quantity',catID = '$catename',description = '$descript',imageLink = '$imglink' WHERE productID = '$id'";
    $connect->query($sql_editproduct);
    header('Location:../../index.php?navigate=products');
}
else{
    $id = $_GET['productid'];
    
    $sql = "SELECT * FROM products WHERE productID = '$id' LIMIT 1";
    
    $query = $connect->query($sql);
    $results = $query->fetch_all(MYSQLI_ASSOC);
    foreach($results as $result){
        unlink('upload/'.$result['imageLink']);
    }
    $sql_del = "DELETE FROM products WHERE productID = '$id'";
    $connect->query($sql_del);
    header('Location:../../index.php?navigate=products');
}
?>