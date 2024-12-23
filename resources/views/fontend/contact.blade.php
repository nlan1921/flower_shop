<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/templatemo-hexashop.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('fontend/assets/css/lightbox.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    @include('partials.header')
        <div class="container">
        <main style="margin-top: 100px;"> <!-- Thêm khoảng cách ở đây -->
        <div class="about-us">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="{{ asset('fontend/assets/images/about-left-image.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="right-content">
                        <h4> Giới thiệu về chúng tôi</h4>
                        <span>là một website chuyên cung cấp dịch vụ điện hoa, quà tặng... chuyên nghiệp đến khắp các tỉnh, thành phố trên cả nước. Với Thông điệp "Flower Delivery Expert", 
                            chúng tôi hướng đến một dịch vụ chuyên nghiệp trong việc truyền tải những thông điệp, cảm xúc của người tặng đến người nhận.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Các định hướng hoạt động của chúng tôi:</p>
                        </div>
                        <p>Liên kết, hỗ trợ các shop hoa tươi trên cả nước trong việc cung cấp các dịch vụ trong lĩnh vực hoa tươi.</p>
                        <p>Xây dựng mạng lưới điện hoa chuyên nghiệp trải rộng khắp các tỉnh, thành phố trên toàn quốc.</p>
                        <p>Hoàn thiện các quy trình kiểm tra chất lượng và giao nhận.</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- ***** About Area Ends ***** -->
    </div>
    @include('partials.footer')
</body>
</html>