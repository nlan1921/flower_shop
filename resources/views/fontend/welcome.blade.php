  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Flower shop</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/templatemo-hexashop.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/lightbox.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="{{ asset('fontend/assets/images/logo.png') }}" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/" class="active">Trang Chủ</a></li>
                            <li class="scroll-to-section"><a href="#men">Hoa Tươi</a></li>
                            <li class="scroll-to-section"><a href="#women">Hoa Sáp</a></li>
                            <li class="scroll-to-section"><a href="#kids">Giỏ Hoa</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Danh mục</a>
                                <ul>
                                    <li><a href="/products_categories/HoaTuoi">Hoa Tươi</a></li>
                                    <li><a href="/products_categories/HoaSap">Hoa Sáp</a></li>
                                    <li><a href="/products_categories/GioHoa">Giỏ Hoa</a></li>
                                    <li><a href="/products">Toàn bộ sản phẩm</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="/contact">Liên Hệ</a></li>
                            <button id="searchBtn" class="btn btn-primary">Tìm Kiếm</button>
                        </ul>
                        <!-- ***** Menu End ***** -->

                        <!-- ***** Search, Cart, and Account Buttons Start ***** -->
                        <div class="nav-right">
                            <!-- Nút giỏ hàng -->
                            <a href="/cart" class="cart">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-count">{{ \App\Models\Cart::where('user_id', auth()->id())->count() }}</span>
                            </a>
                            <!-- Nút đăng nhập/đăng xuất -->
                            @guest
                                <a href="{{ route('login') }}" class="btn-login">Đăng Nhập</a>
                            @else
                                <div class="dropdown">
                                    <a class="btn-logout dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tài khoản
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('edit-profile-modal').style.display = 'block';">Chỉnh sửa thông tin</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Đăng Xuất
                                        </a>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                        <!-- ***** Search, Cart, and Account Buttons End ***** -->
                    </nav>
                </div>
            </div>
        </div>

    <style>
        /* css menu */
        .header-area .main-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-area .nav-right {
            display: flex;
            align-items: center;
        }

        .header-area .nav-right .cart {
            position: relative;
            margin-right: 20px;
        }

        .header-area .nav-right .cart .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
        }

        .header-area .nav-right .btn-login, .header-area .nav-right .btn-logout {
            padding: 5px 10px;
            background: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .header-area .nav-right .btn-login:hover, .header-area .nav-right .btn-logout:hover {
            background: #555;
        }

    /* CSS cho popup */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

         <!-- Search Modal Start -->
         <div id="searchModal" class="modal">
    <div class="modal-content">
        <span class="close1">&times;</span>
        <h2>Tìm kiếm sản phẩm</h2>
        <form action="{{ route('products.search') }}" method="GET">
            <div class="form-group">
                <input type="text" name="query" class="form-control" placeholder="Nhập tên sản phẩm...">
            </div>
            <div class="form-group">
                <label for="min_price">Giá tối thiểu:</label>
                <input type="number" name="min_price" class="form-control" placeholder="Giá tối thiểu">
            </div>
            <div class="form-group">
                <label for="max_price">Giá tối đa:</label>
                <input type="number" name="max_price" class="form-control" placeholder="Giá tối đa">
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
</div>

<!-- Popup để chỉnh sửa thông tin người dùng -->
@if (Auth::check())
<div id="edit-profile-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="document.getElementById('edit-profile-modal').style.display='none'">&times;</span>
        <h2>Chỉnh sửa thông tin</h2>
        <form action="{{ route('user.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="form-group">
                <button type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endif
</header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are Hexashop</h4>
                                <span>Cung Cấp các loại hoa</span>
                                <div class="main-border-button">
                                    <a href="/contact">Liên hệ ngay</a>
                                </div>
                            </div>
                            <img src="{{ asset('fontend/assets/images/left-banner-image.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Hoa Tươi</h4>
                                            <span>Các Loại Hoa Tươi</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Hoa Tươi</h4>
                                                <div class="main-border-button">
                                                    <a href="/products_categories/HoaTuoi">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('fontend/assets/images/baner-right-image-01.jpg') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Hoa Sáp</h4>
                                            <span>Các loại hoa sáp</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Hoa Sáp</h4>
                                                <div class="main-border-button">
                                                    <a href="/products_categories/HoaSap">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('fontend/assets/images/baner-right-image-02.jpg') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Bó Hoa</h4>
                                            <span>Các bó hoa tươi</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Bó Hoa</h4>
                                                <div class="main-border-button">
                                                    <a href="/products_categories/BoHoa">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('fontend/assets/images/baner-right-image-03.jpg') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Các Loại khác</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Các Loại khác</h4>
                                                <div class="main-border-button">
                                                    <a href="/products">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('fontend/assets/images/baner-right-image-04.jpg') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Hoa Tươi Mới Nhất</h2>
                    <span>Chi tiết sản phẩm.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach($hoaTuoiProducts as $product)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{ $product->image_url }}" class="card-img-1" alt="{{ $product->name }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $product->name }}</h4>
                                    <span>{{ number_format($product->price, 0) }} vnd</span>
                                    <ul class="stars">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $product->rating)
                                                <li><i class="fa fa-star"></i></li>
                                            @else
                                                <li><i class="fa fa-star-o"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.card-img-1 {
    height: 200px; /* Bạn có thể điều chỉnh chiều cao theo ý muốn */
    object-fit: cover;
    width: 100%; /* Đảm bảo hình ảnh chiếm hết chiều rộng của thẻ chứa */
}

.thumb {
    position: relative;
}

.thumb .hover-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.5); /* Màu nền với độ trong suốt */
    opacity: 0;
    transition: opacity 0.3s ease;
}

.thumb:hover .hover-content {
    opacity: 1;
}

.thumb .hover-content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.thumb .hover-content ul li {
    display: inline-block;
}

.thumb .hover-content ul li a {
    color: white;
    font-size: 24px; /* Kích thước biểu tượng */
    padding: 10px;
    background: rgba(0, 0, 0, 0.7); /* Nền cho biểu tượng */
    border-radius: 50%;
    transition: background 0.3s ease;
}

.thumb .hover-content ul li a:hover {
    background: rgba(255, 255, 255, 0.7); /* Thay đổi nền khi hover */
    color: #000; /* Thay đổi màu biểu tượng khi hover */
}
</style>
<!-- ***** Men Area Ends ***** -->


    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Hoa Sáp Mới Nhất</h2>
                    <span>Chi tiết sản phẩm.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach($hoaSapProducts as $product)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{ $product->image_url }}" class="card-img-1" alt="{{ $product->name }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $product->name }}</h4>
                                    <span>{{ number_format($product->price, 0) }} vnd</span>
                                    <ul class="stars">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $product->rating)
                                                <li><i class="fa fa-star"></i></li>
                                            @else
                                                <li><i class="fa fa-star-o"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Giỏ Hoa Mới Nhất</h2>
                    <span>Chi tiết sản phẩm.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach($boHoaProducts as $product)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{ $product->image_url }}" class="card-img-1" alt="{{ $product->name }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $product->name }}</h4>
                                    <span>{{ number_format($product->price, 0) }} vnd</span>
                                    <ul class="stars">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $product->rating)
                                                <li><i class="fa fa-star"></i></li>
                                            @else
                                                <li><i class="fa fa-star-o"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Khám phá các sản phẩm của chúng tôi</h2>
                        <span>thêm nội dung.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Thêm nội dung.</p>
                        </div>
                        <p>Thêm nội dung.</p>
                        <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                        <div class="main-border-button">
                            <a href="/products">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Leather Bags</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="{{ asset('fontend/assets/images/explore-image-01.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="{{ asset('fontend/assets/images/explore-image-02.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Different Types</h4>
                                    <span>Over 304 Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{ asset('fontend/assets/images/white-logo.png') }}" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">SHOP HOA TP. HCM</a></li>
                            <li><a href="#">SHOP HOA HÀ NỘI</a></li>
                            <li><a href="#">SHOP HOA CÁC TỈNH</a></li>
                            <li><a href="#">SDT: 09xx</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="/products_categories/HoaTuoi">Hoa Tươi</a></li>
                        <li><a href="/products_categories/HoaSap">Hoa Sáp</a></li>
                        <li><a href="/products_categories/Giỏ Hoa">Giỏ Hoa</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="/">Homepage</a></li>
                        <li><a href="/contact">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright ©                        
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="{{ asset('fontend/assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('fontend/assets/js/popper.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('fontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/accordions.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('fontend/assets/js/imgfix.min.js') }}"></script> 
    <script src="{{ asset('fontend/assets/js/slick.js') }}"></script> 
    <script src="{{ asset('fontend/assets/js/lightbox.js') }}"></script> 
    <script src="{{ asset('fontend/assets/js/isotope.js') }}"></script> 
    
    <!-- Global Init -->
    <script src="{{ asset('fontend/assets/js/custom.js') }}"></script>

    <script>
    // Get the modal
    var modal = document.getElementById("searchModal");

    // Get the button that opens the modal
    var btn = document.getElementById("searchBtn");

    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close1")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });
    </script>

    <script>
                    // JavaScript để hiển thị và ẩn popup chỉnh sữa thông tin
                    document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('edit-profile-modal');
            var span = document.getElementsByClassName('close')[0];

            span.onclick = function() {
                modal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
            });
        </script>

  </body>