<?php
session_start();
include('../../admin/configs/connectDB.php');
//add quantity
if(isset($_GET['add'])){
    $id = $_GET['add'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['productID']!=$id){
            $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$cart_item['quantity'],'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']); 
            $_SESSION['cart'] = $product;
        }else{            
            $plus = $cart_item['quantity']+1;
            if($cart_item['quantity']<=4){
                $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$plus,'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']);            
            }else{
                $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$cart_item['quantity'],'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']); 
            }
            $_SESSION['cart'] = $product;
        }
            
    }
    header('Location:cart.php'); 
}
//reduce quantity
if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['productID']!=$id){
            $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$cart_item['quantity'],'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']); 
            $_SESSION['cart'] = $product;
        }else{            
            $plus = $cart_item['quantity']-1;
            if($cart_item['quantity']>1){
                $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$plus,'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']);            
            }else{
                $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$cart_item['quantity'],'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']); 
            }
            $_SESSION['cart'] = $product;
        }
            
    }
    header('Location:cart.php'); 
}
// delete 1
if(isset($_SESSION['cart'])&&$_GET['delete']){
    $id = $_GET['delete'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['productID']!=$id){
            $product[] = array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$cart_item['quantity'],'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']); 
        }
    $_SESSION['cart']=$product;
    header('Location:cart.php');            
    }   
}
// delete all
if(isset($_GET['deleteAll'])&&$_GET['deleteAll']==1){
    unset($_SESSION['cart']);
    header('Location:cart.php');
}
// add product to cart
if(isset($_POST['addtocart'])){
    $id = $_GET['proid'];
    $quantity = 1;
    $sql = "SELECT * FROM products WHERE productID = '$id' LIMIT 1 ";
    $query = $connect->query($sql);
    $row = $query->fetch_array(MYSQLI_ASSOC);
    if($row){
        $new_product[] = (array('productID'=>$id,'productName'=>$row['productName'],'quantity'=>$quantity,'price'=>$row['price'], 'imageLink'=>$row['imageLink'],'productCode'=>$row['productCode']));
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = $new_product;
        }else{
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
                if($cart_item['productID']==$id){
                    $product = array(array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$quantity+=1,'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']));
                    $found = true;
                    // echo "<pre>";
                    // print_r($product);
                    // echo "</pre>";
                }else{
                    $product = array(array('productID'=>$cart_item['productID'],'productName'=>$cart_item['productName'],'quantity'=>$cart_item['quantity'],'price'=>$cart_item['price'], 'imageLink'=>$cart_item['imageLink'],'productCode'=>$cart_item['productCode']));
                    
                }
            }
            if($found == false){
                $_SESSION['cart'] = array_merge($product,$new_product);
                echo "<pre>";
                print_r($_SESSION['cart']);
                echo "</pre>";
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
    }
    header('Location:cart.php');
}
?>
