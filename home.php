<?php
session_start();
if(isset($_GET['logout'])&&$_GET['logout']=='exit'){
    unset($_SESSION['userName']);
}
?>

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
    <link rel="stylesheet" type="text/css" href="css/styleHome.css"  />
    <title>Home-Page</title>
</head>

<body>
    <div class="wrapper">
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
                    <li><a href="home.php">Trang chủ</a></li>
                    <li><a href="introduce.php">Giới Thiệu</a></li>
                    <!-- <li><a href="introduce.php">Giá sản phẩm</a></li> -->
                    <li><a href="showRoom.php">ShowroomAudi Hà Nội</a></li>
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
                <!-- <span style="margin-left:10px" class="text-light">Xin chào,<?php echo $_SESSION['userName'] ?? 'GUEST' ?></span> -->
             </div>
          </div>
       </div>
    </header>
    <section>
        <?php
            include('admin/configs/connectDB.php');
                // GET CATEGORIES
                $sql_cat = "SELECT * FROM categories ORDER BY catID";
                $query = $connect->query($sql_cat);
                $result = $query->fetch_all(MYSQLI_ASSOC);
            include('admin/configs/closeDB.php');
        ?>
        <div class="catogory-cars">
                <ul class="category-item">
                    <?php foreach($result as $array):?>
                    <li><a href="?id=<?php echo $array['catID'];?>"><?php echo $array['catName'];?></a></li>
                    <?php endforeach ?>
                </ul>
        </div>
        <?php include('modules/products/productlist.php') ?>
        <div class="carousel">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="IMG/productsample/Background/background3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="IMG/productsample/Background/background2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="IMG/productsample/Background/background1.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        </div>
        <!-- imageeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee  -->
        <h1 class="title-image">
            <a href="">Ảnh Xe Audi</a>
        </h1>
        <div class="image-cars">

            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi1.jpg"
                        alt="" srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi2.jpg" alt=""
                        srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi3.jpg" alt=""
                        srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi4.jpg" alt=""
                        srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img
                        src="IMG/productsample/ImageCar/audi5.jpg"
                        alt="" srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi6.jpg" alt=""
                        srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi7.jpg" alt=""
                        srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi8.jpg" alt=""
                        srcset=""></a>
            </div>
            <div class="image-item">
                <a href=""><img src="IMG/productsample/ImageCar/audi9.jpg" alt=""
                        srcset=""></a>
            </div>
        </div>
        <!-- Resigterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr -->
        <h1 class="title-register">
            <a href="">Đăng Kí Lái Thử.</a>
        </h1>
        <div class="register">
            <div class="image-register">
                <a href=""><img src="IMG/productsample/Background/bgr.webp" alt="" srcset=""></a>
            </div>
            <div class="form-register">
                <h5>Nhận báo giá đăng kí lái thử</h5>
                <form action="../../register_drive.php" method="post">
                    <div class="form-row">
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Họ và tên" name="yourName">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phoneNumber">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Xe muốn mua" name="buyProduct">
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-light" name="request">Gửi yêu cầu</button>
                      </div>
                      
                    </div>
                  </form>
            </div>
        </div>

    </section>
    <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.572648530951!2d105.78685191473106!3d21.009760986008626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab556315d0e9%3A0x12c186a45be93155!2zOCBQaOG6oW0gSMO5bmcsIE3hu4UgVHLDrCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpIDEwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1660808716371!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="footer">
            <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>AUDI MỸ ĐÌNH
                        </h6>
                        <p>
                            <i class="fas fa-gem me-3"></i>8 Đường Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm,
                            Tp. Hà Nội, Việt Nam
                        </p>

                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Thời Gian Làm Việc:
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Showroon từ 8:00-18:00 Thứ 2 đến Chủ Nhật</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Tư Vấn-Dịch Vụ:
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Sáng từ 08:00 - 12:00 Chiều từ 13:00 - 17:00 Thứ Hai đến Thứ
                                Bẩy Trừ Chủ Nhật, ngày Lễ và ngày Tết</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> @audi.vn hoặc hai.phan@audi.vn</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> Kinh doanh : 0967.944.288</p>
                        <p><i class="fas fa-print me-3"></i>
                            Dịch vụ sửa chữa : 0967.944.288</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/"></a>
        </div>
        <!-- Copyright -->
        </div>
        
        </footer>
        <!-- Footer -->
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H           +K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="js/home.js"></script>
</html>