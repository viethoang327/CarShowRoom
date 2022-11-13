<?php
include('connectDB.php');
$sql_cat = "CREATE TABLE adminDB(
    adminID INT PRIMARY KEY NOT NULL UNIQUE,
    adminName NVARCHAR(50) NOT NULL
    adminPassword VARCHAR(50) NOT NULL
);";
if($connect->query($sql_cat)){
    echo "catalog table has been created successfully <br/>";
}else{
    echo "catalog table has been created failed <br/>";
}
include('closeDB.php');