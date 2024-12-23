<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/templatemo-hexashop.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/lightbox.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <style>
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
    </style>
    <style>
    /* Modal CSS */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
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
                        <li class="submenu">
                            <a href="javascript:;">Danh mục</a>
                            <ul>
                                <li><a href="/products_categories/HoaTuoi">Hoa Tươi</a></li>
                                <li><a href="/products_categories/HoaSap">Hoa Sáp</a></li>
                                <li><a href="/products_categories/BoHoa">Giỏ Hoa</a></li>
                                <li><a href="/products">Toàn bộ sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="/contact">Liên Hệ</a></li>
                    </ul>
                    <!-- ***** Search Button Start ***** -->
                    <button id="searchBtn" class="btn btn-primary">Tìm Kiếm</button>
                    <!-- ***** Search Button End ***** -->
                    <div class="nav-right">
                        <!-- Thêm nút giỏ hàng -->
                        <a href="/cart" class="cart">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">{{ \App\Models\Cart::where('user_id', auth()->id())->count() }}</span>
                        </a>
                        <!-- Thêm nút đăng nhập/đăng xuất -->
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
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
    <!-- ***** Header Area End ***** -->

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
<!-- Search Modal End -->


<style>
/* CSS cho popup chỉnh sữa thông tin*/
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

<div class="container">
    <main style="margin-top: 100px;">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="card-description">
                                <p class="card-text">{{ $product->description }}</p>
                            </div>
                            <div class="card-price">
                                <span>{{ number_format($product->price, 0) }} vnd</span>
                            </div>
                            <div class="card-buttons">
                                <a href="/products/{{ $product->id }}" class="btn btn-success">Chi tiết</a>
                                @if (Auth::check())
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary add-to-cart" data-product-id="{{ $product->id }}" data-quantity="1">
                                            <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                @else
                                    <a href="/login" class="btn btn-warning">Đăng nhập để mua</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</div>

<style>
    .card {
        height: 100%;
    }
    
    .card-img-top {
        height: 200px; /* Chiều cao của hình ảnh */
        object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Dãn các thành phần trong card */
        height: 300px; /* Đảm bảo chiều cao card là 100% */
    }

    .card-title {
        font-size: 20px; /* Kích thước phông chữ tiêu đề */
        margin-bottom: 10px; /* Khoảng cách với mô tả */
    }

    .card-description {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Số dòng tối đa hiển thị */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis; /* Hiển thị dấu "..." khi vượt quá chiều cao */
    }

    .card-price {
        font-size: 18px; /* Kích thước phông chữ giá */
        text-align: center; /* Căn giữa giá */
        margin-top: 10px; /* Khoảng cách với các nút button */
    }

    .card-buttons {
        text-align: center; /* Căn giữa các nút button */
        margin-bottom: 10px; /* Khoảng cách với giá */
    }
</style>




<!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

<!-- javascript xử lí thông tin trên page giao diện -->
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
    // JavaScript để hiển thị và ẩn popup chỉnh sữa thông tin
    document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('edit-profile-modal');
    var span = document.getElementsByClassName('close')[0];

    span.onclick = function(event) {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    });

    //funtion addtocart
    $(document).ready(function() {
        $('.add-to-cart').on('click', function(e) {
            e.preventDefault();

            var productId = $(this).data('product-id');

            $.ajax({
                url: '/cart/add/' + productId, // Thêm productId vào URL
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $('.cart-count').text(response.cartCount);
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(response) {
                if (response.status === 401) {
                    alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
                    window.location.href = "/login";
                } else {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                }
                } 
            });
        });
    });
    </script>

</main>

@include('partials.footer')


</body>
