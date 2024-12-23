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
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="btn-logout">
                                Đăng Xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </div>
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

<section class="section" id="product" style="margin-top: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="left-images">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <!-- Nếu có nhiều hình ảnh khác, bạn có thể thêm chúng vào đây -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{ $product->name }}</h4>
                    <span class="price">{{ number_format($product->price, 0)  }} vnd</span>
                    <ul class="stars">
                        <!-- Giả sử bạn lưu điểm đánh giá của sản phẩm trong trường rating -->
                        @for ($i = 0; $i < $product->rating; $i++)
                            <li><i class="fa fa-star"></i></li>
                        @endfor
                        @for ($i = $product->rating; $i < 5; $i++)
                            <li><i class="fa fa-star-o"></i></li>
                        @endfor
                    </ul>
                    <span>{{ $product->description }}</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>{{ $product->quote }}</p>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>Số lượng</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus">
                                <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                <input type="button" value="+" class="plus">
                            </div>                        
                        </div>
                    </div>
                    <div class="total">
                        <h3>Tổng: <h4 id="total-price">{{ number_format($product->price, 0) }} vnd</h4></h3>
                        &nbsp;&nbsp;
                        @if (Auth::check())
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    &nbsp;&nbsp;
                                    <button class="btn btn-sm btn-primary main-border-button add-to-cart" data-product-id="{{ $product->id }}">
                                    <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                                </button>
                                </form>
                        @else
                            <div class="main-border-button"><a href="/login">Đăng nhập để mua</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="comments">
    <style>
        .comments {
            margin-top: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .comments h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .comment {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .comment p {
            margin: 0;
        }

        .comment p strong {
            font-weight: bold;
            color: #333;
        }

        .comment p small {
            color: #888;
        }

        .comment p.content {
            margin-top: 5px;
            color: #666;
        }

        .comment .meta {
            font-size: 0.8rem;
            color: #888;
            margin-top: 5px;
        }

        .comment .actions {
            margin-top: 5px;
        }

        .comment .actions a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .comment .actions a:hover {
            text-decoration: underline;
        }

        .comment .actions form {
            display: inline-block;
        }

        .comment .actions form button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            margin: 0;
            padding: 0;
            font-size: 1rem;
        }

        .comment .actions form button:hover {
            text-decoration: underline;
        }

        .comment-form {
            margin-top: 20px;
        }

        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }

        .comment-form button {
            margin-top: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .comment-form button:hover {
            background-color: #0056b3;
        }

        .login-link {
            color: #007bff;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .alert {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>

    <h3>Bình luận:</h3>
    @if ($product->comments && $product->comments->count() > 0)
        @foreach ($product->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
                <p class="meta"><small>{{ $comment->created_at->diffForHumans() }}</small></p>
            </div>
        @endforeach
    @else
        <p>Chưa có bình luận nào cho sản phẩm này.</p>
    @endif

    @auth
        <form class="comment-form" action="{{ route('product.comment', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="content" rows="3" placeholder="Viết bình luận của bạn..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
    @else
        <p>Vui lòng <a href="{{ route('login') }}" class="login-link">đăng nhập</a> để bình luận.</p>
    @endauth

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>

</section>

@include('partials.footer')

<style>
.section {
    padding: 60px 0;
}

.left-images img {
    width: 100%;
    margin-bottom: 20px;
}

.right-content {
    text-align: left;
}

.right-content h4 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.right-content .price {
    font-size: 1.5rem;
    color: #ff6b6b;
    margin-bottom: 20px;
}

.right-content .stars {
    margin-bottom: 20px;
}

.right-content .stars li {
    display: inline-block;
    color: #ffdd57;
}

.right-content .quote {
    margin: 20px 0;
    font-style: italic;
}

.right-content .quantity-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.right-content .total {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 20px;
}

.right-content .main-border-button a {
    padding: 10px 30px;
    background-color: #ff6b6b;
    color: #fff;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.right-content .main-border-button a:hover {
    background-color: #ff4c4c;
}
</style>

<script>

document.addEventListener('DOMContentLoaded', function () {
    const price = {{ $product->price }};
    const qtyInput = document.querySelector('input[name="quantity"]');
    const totalPriceElem = document.getElementById('total-price');

    function updateTotalPrice() {
        const quantity = parseInt(qtyInput.value);
        totalPriceElem.textContent = (price * quantity).toFixed(2);
    }

    qtyInput.addEventListener('input', updateTotalPrice);
    document.querySelector('.minus').addEventListener('click', function () {
        if (qtyInput.value > 1) {
            qtyInput.value--;
            updateTotalPrice();
        }
    });
    document.querySelector('.plus').addEventListener('click', function () {
        qtyInput.value++;
        updateTotalPrice();
    });
});

// Xử lý khi gửi bình luận thành công
$('.comment-form').on('submit', function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    var url = $(this).attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(response) {
            // Xóa nội dung của textarea sau khi gửi thành công
            $('.comment-form textarea').val('');

            // Hiển thị thông báo thành công
            $('.alert-success').text(response.success).show('Đã gửi bình luận');
            location.reload();

            // Thêm bình luận mới vào danh sách hiện tại
            var commentHtml = '<div class="comment">';
            commentHtml += '<p><strong>' + response.user.name + '</strong>: ' + response.content + '</p>';
            commentHtml += '<p class="meta"><small>' + response.created_at + '</small></p>';
            commentHtml += '</div>';

            $('.comments').append(commentHtml);
        },
        error: function(xhr, status, error) {
            console.error(error);
            // Xử lý lỗi nếu có
        }
    });
});
    
        //funtion addtocart
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(e) {
                e.preventDefault();

                var productId = $(this).data('product-id');
                var quantity = parseInt($(this).siblings('.quantity').find('input[name="quantity"]').val());

                $.ajax({
                    url: '/cart/add/' + productId, // Đường dẫn thêm productId vào URL
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.success) {
                            $('.cart-count').text(response.cartCount);
                            alert('thêm giỏ hàng thành công!');
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



</body>