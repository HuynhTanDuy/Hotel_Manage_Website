@extends('layout.index')
@section('content')
    
  
    <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Events</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="home">Home</a></li>
              <li>&bullet;</li>
              <li>Events</li>
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

    <!--  Event -->
   
    <section class="section blog-post-entry bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Events</h2>
            <p data-aos="fade-up">{{$description->event}} </p>
          </div>
        </div>
        <div class="row">

          @foreach ($event as $e)
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

            <div class="media media-custom d-block mb-4 h-100">
              <a href="#" class="mb-4 d-block"><img src={{$e->image}} alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <span class="meta-post">{{$e->created_at}}</span>
                <h2 class="mt-0 mb-3"><a href="#">{{$e->name}}</a></h2>
                <p>{{$e->body}}</p>
              </div>
            </div>

          </div>
          @endforeach
       
        </div>
      </div>
    </section>

@endsection    
    
    