@extends('layout.index')
@section('content')
<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Reservation Form</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="home">Home</a></li>
              <li>&bullet;</li>
              <li>Reservation</li>
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

                                       
   <!--  Form -->
    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="postReservation" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              @if(count($errors)>0)
               <div class="alert alert-danger"> 
               @foreach ($errors->all() as $err) 
                {{$err}} <br>
               @endforeach
              </div>
              @endif
              @if (session('annoucement'))
              <div class="alert alert-success">
              {{session('annoucement')}}
              </div>
              @endif   
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="room" class="font-weight-bold text-black">Room</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="room" id="room" class="form-control">
                      @foreach ($category as $cate)
                      <option @if ($cate->id==$idCate) {{"selected"}} @endif value={{$cate->id}}>{{$cate->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Name</label>
                  <input type="text" id="name" class="form-control  " name="name">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control " name="phone">
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control " name="email">
                </div>
                

              </div>

             
                
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                  <input type="date"  class="form-control" name="datein">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                  <input type="date"  class="form-control" name="dateout">
                </div>
              </div>

              <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="adults" class="font-weight-bold text-black">Numbers</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="numbers" id="adults" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4+</option>
                      </select>
                    </div>
                  </div>
                  
              </div>
              <div class="row">
                  <div class="row mb-4">
                  <div class="col-md-12 form-group">
                    <label class="text-black font-weight-bold" for="message">Notes</label>
                    <textarea name="notes" id="message" class="form-control " cols="30" rows="8"></textarea>
                  </div>
                </div>
                
              </div>
              <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="submit" value="Reserve Now" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                  </div>
                </div>

              

              
              
            </form>

          </div>

          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span> <span class="text-black"> {{$infor->address}}</span></p>
                <p><span class="d-block">Phone:</span> <span class="text-black"> {{$infor->phone_number}}</span></p>
                <p><span class="d-block">Email:</span> <span class="text-black"> {{$infor->email}}</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
   

    
    
   