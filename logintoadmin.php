<?php
include('admin/configs/connectDB.php');
 if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT count(*) as acc FROM adminacc WHERE username = '$username' AND password = '$password' ";
    $result = $connect->query($sql);
    $arr_result = $result->fetch_all(MYSQLI_ASSOC);
    if($arr_result[0]['acc']>0){
        header('Location:admin/index.php');
    }else{
        $error = "Your email or password is incorrect" ;
    }
 }
include('admin/configs/closeDB.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link rel="stylesheet" type="text/css" href="css/adminlogin.css">-
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <h1 class="wrapper-title">Login for Admin</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="uname" aria-describedby="emailHelp" placeholder="Enter email" name="password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="pass" placeholder="Password" name="pass">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <h3 style="color:red"><?php echo $error ?? ''; ?></h3>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>