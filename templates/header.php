<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="../../css/styleHome.css"  />
    <title>Header</title>
</head>

<body>
<header>
       <div class="menu">
          <div class="menu-top">
            <span class="menu-logo">
            <a href="#"><img src="IMG/productsample/Logo/logo.png" alt="" srcset=""></a>
            </span>
            <h5 class="menu-contact">
            <a href="#">
            <i class="fa-solid fa-phone"></i> Hotline: 0988.567.888
            </a>
            </h5>
          </div>
          <div class="menu-botton">
             <nav>
                <ul class="menu-list">
                    <li><a href="../home.php">Trang chủ</a></li>
                    <li><a href="../introduce.php">Giới Thiệu</a></li>
                    <!-- <li><a href="introduce.php">Giá sản phẩm</a></li> -->
                    <li><a href="../showRoom.php">ShowroomAudi Hà Nội</a></li>
                </ul>
             </nav> 
              <div class="menu-left">
                <form action="modules/search/search.php" method="GET" class="menu-search">
                    <input type="text" id="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
                    <button type="submit" name="search" class="btn btn-dark">Search</button>
                </form>               
                <a href="#">
                <i class="fa-solid fa-cart-arrow-down"></i>
                </a>
                <ul class="menu-user">
                    <li> <a href="#" id="user-icon">
                         <i class="fa-solid fa-user-doctor"></i></a>
                        <ul class="menu-item">
                            <li><a href="modules/form/register.php"> Đăng kí</a></li>
                            <li><a href="modules/form/login.php"> Đăng nhập</a></li>
                            <li><a href="home.php?logout=exit"> Đăng xuất</a></li>
                            <li class="btn btn-dark"><a href="logintoadmin.php">Admin</a></li>
                        </ul> 
                    </li>
                </ul>
             </div>
          </div>
       </div>
    </header>

</body>



