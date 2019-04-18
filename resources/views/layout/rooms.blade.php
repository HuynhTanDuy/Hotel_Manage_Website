<section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <a href="rooms"><h2 class="heading" data-aos="fade-up">Rooms &amp; Suitess</h2></a>
            <p data-aos="fade-up" data-aos-delay="100">{{$description->room}}</p>
          </div>
        </div>
        <div class="row">
          @foreach ($category as $cate)
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="rooms" class="room">
              <figure class="img-wrap">
                <img src={{$cate->image}} alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>{{$cate->name}}</h2>
                <span class="text-uppercase letter-spacing-1">{{$cate->price}}$ / per night</span>
              </div>
            </a>
          </div>
          @endforeach

          


        </div>
      </div>
    </section>