<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán hàng</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../fonts/themify-icons/themify-icons.css">
</head>
<body>
    <div class="wrapper">
        <div id="navbar">
            <h1 class='navbar-title'><a href="index.php">Dashboard</a></h1>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="index.php?navigate=members">Members Management</a></li>
                <li class="navbar-item"><a href="index.php?navigate=products">Products Management</a></li>
                <li class="navbar-item"><a href="index.php?navigate=oders">Oders Management</a> </li>
                <li class="navbar-item"><a href="index.php?navigate=contents">Contents Management</a></li>
            </ul>
            <div class="navbar-logout"><a href="../logintoadmin.php">Logout</a></div>
        </div>
        <div id="main">
            <div class="main-view">
                <?php 
                    if(isset($_GET['navigate'])){
                        $navigate = $_GET['navigate'];
                    }else{
                        $navigate = '';
                        include('modules/main.php');
                    }
                    if ($navigate =='members') {
                        include('modules/members.php');
                    }elseif($navigate =='products'){
                        include('modules/products.php');
                    }elseif($navigate =='oders'){
                        include('modules/oders.php');
                    }elseif($navigate =='contents'){
                        include('modules/contents.php');
                    }                                           
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>