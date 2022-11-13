<?php
include('connectDB.php');
$sql_cat = "CREATE TABLE categories(
    catID INT PRIMARY KEY NOT NULL UNIQUE,
    catName NVARCHAR(50) NOT NULL  
);";
if($connect->query($sql_cat)){
    echo "catalog table has been created successfully <br/>";
}else{
    echo "catalog table has been created failed <br/>";
}
$sql_product = "CREATE TABLE products(
    productID INT PRIMARY KEY NOT NULL UNIQUE,
    catID INT,
    CONSTRAINT FK_CategoriesProduct FOREIGN KEY (catID)
    REFERENCES categories(catID),
    productName NVARCHAR(100) NOT NULL,
    productCode VARCHAR(10) NOT NULL UNIQUE,
    description NVARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    imageLink VARCHAR(255),
    quantity INT
);";
if($connect->query($sql_product)){
    echo "products table has been created successfully <br/>";
}else{
    echo "products table has been created failed <br/>";
}
$sql_user = "CREATE TABLE users(
    userID INT PRIMARY KEY NOT NULL ,
    userEmail NVARCHAR(100) NOT NULL,
    userPassword VARCHAR(20) NOT NULL,
    userName NVARCHAR(100) NOT NULL,
    userPhone VARCHAR(20) NOT NULL
);";
if($connect->query($sql_user)){
    echo "users table has been created successfully <br/>";
}else{
    echo "users table has been created failed <br/>";
}
$sql_oder = "CREATE TABLE oders(
    oderID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    oderEmail VARCHAR(100) NOT NULL,
    oderName VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    note NVARCHAR(255)
);";
if($connect->query($sql_oder)){
    echo "oders table has been created successfully <br/>";
}else{
    echo "oders table has been created failed <br/>";
}
$sql_oderdetail = "CREATE TABLE oderDetail(
    oderdetailID INT PRIMARY KEY NOT NULL,
    oderID  INT,
    CONSTRAINT FK_OdersOderdetail FOREIGN KEY (oderID)
    REFERENCES oders(oderID),
    productID INT ,
    CONSTRAINT FK_ProductOderdetail FOREIGN KEY (productID)
    REFERENCES products(productID),
    quantity INT,
    price  FLOAT
);";
if($connect->query($sql_oderdetail)){
    echo "oderDetail table has been created successfully <br/>";
}else{
    echo "oderDetail table has been created failed <br/>";
}
include('closeDB.php');