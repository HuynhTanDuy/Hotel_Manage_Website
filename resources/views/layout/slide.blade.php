 <section class="section slider-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Photos</h2>
            <p data-aos="fade-up" data-aos-delay="100">{{$description->photo}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="home-slider major-caousel owl-carousel text-center mb-5" data-aos="fade-up" data-aos-delay="200" >
              @foreach ($slide as $sl)
                <div class="slider-item">
                  <a  href={{$sl->link}} data-fancybox="images" ><img src={{$sl->link}} alt="Image placeholder" class="img-fluid" >{{$sl->caption}}</a>
                </div>
              @endforeach
            </div>
            <!-- END slider -->
          </div>
        
        </div>
      </div>
    </section>