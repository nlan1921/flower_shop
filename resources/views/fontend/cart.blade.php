<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
    
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    
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
                                    <li><a href="/products_categories/GioHoa">Giỏ Hoa</a></li>
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
                        </div>
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
<!-- Search Modal End -->


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

    <!-- Main content to display cart items -->
    <div class="container" style="margin-top: 100px;">
        <main>
            <h2>Giỏ hàng</h2>
            <div id="cart-items">
                <!-- Cart items will be dynamically loaded here -->
                @if(empty($cartItems))
                    <p>Giỏ hàng của bạn đang trống.</p>
                @else
                    <!-- Calculate totalAmount -->
                @php
                $totalAmount = 0;
                foreach($cartItems as $item) {
                    $totalAmount += $item->product->price * $item->quantity;
                }
                @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng cộng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr id="item-{{ $item->id }}">
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    <div class="input-group">
                                        <input type="number" class="form-control quantity" name="quantity" value="{{ $item->quantity }}" min="1" data-item-id="{{ $item->id }}">
                                            <button class="btn btn-sm btn-primary update-cart" data-item-id="{{ $item->id }}">Cập nhật</button>
                                    </div>
                                </td>
                                <td>{{ $item->product->price }} vnd</td>
                                <td>{{ $item->product->price * $item->quantity }} vnd</td>
                                <td>
                                    <button class="btn btn-sm btn-danger remove-cart" data-item-id="{{ $item->id }}">Xóa</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        <h4>Tổng tiền: {{ $cartItems->sum(function($item) {
                                return $item->product->price * $item->quantity;
                            }) }} vnd</h4>
                            <a id="checkoutBtn" class="btn btn-primary checkoutModal">Thanh toán</a>
                    </div>
                @endif

                <!-- Popup form thanh toán -->
                <div id="checkoutModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Thông tin thanh toán</h2>
                        <form id="paymentForm">
                            <div class="form-group">
                                <label for="name">Tên khách hàng</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label for="paymentCode">Mã thanh toán (4 chữ số)</label>
                            <input type="text" id="paymentCode" name="paymentCode" class="form-control" required pattern="[0-9]{4}" maxlength="4" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
                        </form>
                        <ul>
                                <li><strong>Số tiền:</strong> {{ $totalAmount }} vnd</li>
                                <li><strong>Tài khoản nhận:</strong> XXXX-XXXX-XXXX</li>
                                <li><strong>Chủ tài khoản:</strong> Nguyễn Văn A</li>
                                <li><strong>Ngân hàng:</strong> XXX Bank</li>
                                <!-- Add more details as needed -->
                            </ul>
                        <div id="qrCodeContainer" style="text-align: center;">
                            <h3>Mã QR Thanh Toán</h3>
                            <div id="qrCode">
                            <img style="width: 150, height: 150" src="{{ asset('fontend/assets/images/qr.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </main>
    </div>

    <!-- JavaScript to handle modal interactions and AJAX operations -->
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

    $(document).ready(function() {
        // Xử lý sự kiện khi click vào button cập nhật số lượng
        $(document).on('click', '.update-cart', function() {
            var itemId = $(this).data('item-id');
            var quantity = $(this).closest('tr').find('.quantity').val();
            updateCartItem(itemId, quantity);
        });

        // Xử lý sự kiện khi click vào button xóa sản phẩm khỏi giỏ hàng
        $(document).on('click', '.remove-cart', function() {
            var itemId = $(this).data('item-id');
            removeCartItem(itemId);
        });

        // Function to handle updating cart items
        function updateCartItem(itemId, quantity) {
            $.ajax({
                url: "{{ route('cart.update') }}",
                method: 'POST',
                data: {
                    item_id: itemId,
                    quantity: quantity,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Reload cart items after update
                    location.reload();
                },
                error: function(err) {
                    console.error('Error updating cart item:', err);
                }
            });
        }

        // Function to remove cart item via AJAX
        function removeCartItem(itemId) {
            $.ajax({
                url: "{{ route('cart.remove') }}",
                method: 'POST',
                data: {
                    item_id: itemId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Reload cart items after removal
                    location.reload();
                },
                error: function(err) {
                    console.error('Error removing cart item:', err);
                }
            });
        }

        // Function to load cart items dynamically
        function loadCartItems() {
            $.ajax({
                url: "{{ route('cart.index') }}",
                method: 'GET',
                success: function(response) {
                    $('#cart-items').html(response);
                },
                error: function(err) {
                    console.error('Error loading cart items:', err);
                }
            });
        }

        // Xử lý sự kiện khi click vào button thanh toán
        $('.checkoutModal').on('click', function() {
            $('#checkoutModal').show(); // Hiển thị popup form
            var randomCode = generateRandomPaymentCode(); // Tạo số ngẫu nhiên
            $('#paymentCode').val(randomCode); // Đặt giá trị cho trường nhập liệu
            generateQRCode(); // Tạo và hiển thị mã QR
        });

        // Đóng popup khi click vào nút đóng
        $('.close').on('click', function() {
            $(this).closest('.modal').hide();
        });

        $('#paymentForm').submit(function(event) {
            $(this).closest('.modal').hide();
        });
            

        // Hàm tạo mã QR
        function generateQRCode() {
            // Thông tin để tạo mã QR, ví dụ:
            var paymentDetails = {
                amount: "{{ $totalAmount }}",
                account: "XXXX-XXXX-XXXX",
                name: "Nguyễn Văn A",
                bank: "XXX Bank"
                // Các thông tin khác nếu cần
            };

            // Tạo mã QR từ thông tin thanh toán
            var qrCode = new QRCode(document.getElementById("qrCode"), {
                text: JSON.stringify(paymentDetails),
                width: 150,
                height: 150
            });
        }
    });
    function generateRandomPaymentCode() {
    // Tạo số ngẫu nhiên từ 1000 đến 9999
    var randomCode = Math.floor(1000 + Math.random() * 9000);
    return randomCode;
}
             </script>

    <!-- Include footer -->
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

</body>
