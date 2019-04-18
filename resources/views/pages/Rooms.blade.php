@extends('layout.index')
@section('content')

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="home">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
            </ul>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    
    
    <section class="section bg-light">

      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade">Great Offers</h2>
            <p data-aos="fade">Chúng tôi mang đến cho bạn những sự lựa chọn phong phú nhất, sang trọng nhất, tiện nghi nhất với mức giá tuyệt vời nhất ! </p>
          </div>
        </div>
        <?php $i=1; ?>
        @foreach ($category as $cate)
        <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
          <a href="#" class="image d-block bg-image-2 @if ($i % 2==0) order-2 @endif " style="background-image: url('{{$cate->image}}');"></a>
          <div class="text @if ($i % 2==0) order-1 @endif">
            <span class="d-block mb-4"><span class="display-4 text-primary">{{$cate->price}}</span> <span class="text-uppercase letter-spacing-2">/ per night</span> </span>
            <h2 class="mb-4">{{$cate->name}}</h2>
            <p>{{$cate->description}}</p>
            <p><a href="reservation/{{$cate->id}}" class="btn btn-primary text-white">Book Now</a></p>
          </div>
        </div>
        <?php $i++; ?>
        @endforeach

      </div>
    </section>

   
    
   
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    
    
    <script src="js/aos.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script> 
    <script src="js/jquery.timepicker.min.js"></script> 

    

    <script src="js/main.js"></script>
  </body>
</html>