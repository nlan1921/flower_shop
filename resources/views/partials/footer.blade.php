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