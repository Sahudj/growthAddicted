@extends('layouts.frontend.master')

@section('content')
    <section class=" slider_section ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="slider_detail-box">
                    <h1>
                      Start <br/>
                      Business with <br/>
                      Our Company
                    </h1>
                    <p>
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                      nostrud exercitation ullamco laboris nisi
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="{{url('public/frontend')}}/images/slider-img.png" alt=""/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="slider_detail-box">
                    <h1>
                      Start <br/>
                      Business with <br/>
                      Our Company
                    </h1>
                    <p>
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                      nostrud exercitation ullamco laboris nisi
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="{{url('public/frontend')}}/images/slider-img.png" alt=""/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-6">
                  <div class="slider_detail-box">
                    <h1>
                      Start <br/>
                      Business with <br/>
                      Our Company
                    </h1>
                    <p>
                      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                      nostrud exercitation ullamco laboris nisi
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="{{url('public/frontend')}}/images/slider-img.png" alt=""/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- welcome section -->
  <section class="welcome_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Welcome To Our Company
        </h2>
      </div>
      <div class="layout_padding2">
        <div class="img-box">
          <img src="{{url('public/frontend')}}/images/welcome.png" alt=""/>
        </div>
        <div class="detail-box">
          <p>
            dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis
            aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
          </p>
          <div>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- end welcome section -->

  <!-- service section -->

  <section class="service_section">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Our Services
        </h2>
      </div>
      <div class="service_container layout_padding2">
        <div class="service_box">
          <div class="img-box">
            <img src="{{url('public/frontend')}}/images/s-1.jpg" alt=""/>
          </div>
          <div class="detail-box">
            <h4>
              Business <br/>
              Consultant
            </h4>
            <p>
              have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even
              slightly believable. If you are
            </p>
          </div>
        </div>
        <div class="service_box">
          <div class="img-box">
            <img src="{{url('public/frontend')}}/images/s-2.jpg" alt=""/>
          </div>
          <div class="detail-box">
            <h4>
              Marketing <br/>
              Analytics
            </h4>
            <p>
              have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even
              slightly believable. If you are
            </p>
          </div>
        </div>
        <div class="service_box">
          <div class="img-box">
            <img src="{{url('public/frontend')}}/images/s-3.jpg" alt=""/>
          </div>
          <div class="detail-box">
            <h4>
              Financial <br/>
              Planning
            </h4>
            <p>
              have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even
              slightly believable. If you are
            </p>
          </div>
        </div>
      </div>
      <div>
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end service section -->
  <!--problem section -->
  <section class="problem_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Do you have any business problem ?
        </h2>
      </div>
      <div class="layout_padding2">
        <div class="img-box">
          <img src="{{url('public/frontend')}}/images/problem.jpg" alt=""/>
        </div>
        <div class="detail-box">
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
            some form, by injected humour, or randomised words which don&#39;t look even slightly believable. I
          </p>
          <div>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- end problem section -->
  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="content-container">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua. Ut enim ad minim veniam, quis
        </p>
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="{{url('public/frontend')}}/images/smiley.png" alt=""/>
            </div>
            <div class="detail-box">
              <h3>
                99%
              </h3>
              <h6>
                SATISFIED CLIENTS
              </h6>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="{{url('public/frontend')}}/images/monitor.png" alt=""/>
            </div>
            <div class="detail-box">
              <h3>
                4700+
              </h3>
              <h6>
                AWESOME planing
              </h6>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="{{url('public/frontend')}}/images/multiple-users-silhouette.png" alt=""/>
            </div>
            <div class="detail-box">
              <h3>
                4500+
              </h3>
              <h6>
                CLIENTS
              </h6>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="img-box">
              <img src="{{url('public/frontend')}}/images/bar-chart.png" alt=""/>
            </div>
            <div class="detail-box">
              <h3>
                19000+
              </h3>
              <h6>
                DAILY business
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end why section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <h2>
        What Our Clients Says
      </h2>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container layout_padding2">
              <div class="client_text">
                <p>
                  psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                </p>
              </div>
              <div class="detail-box">
                <div class="img-box">
                  <img src="{{url('public/frontend')}}/images/client.png" alt=""/>
                </div>
                <div class="name">
                  <h5>
                    Joans Mark
                  </h5>
                  <p>
                    cal
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_text">
                <p>
                  psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                </p>
              </div>
              <div class="detail-box">
                <div class="img-box">
                  <img src="{{url('public/frontend')}}/images/client.png" alt=""/>
                </div>
                <div class="name">
                  <h5>
                    Joans Mark
                  </h5>
                  <p>
                    cal
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_text">
                <p>
                  psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                </p>
              </div>
              <div class="detail-box">
                <div class="img-box">
                  <img src="{{url('public/frontend')}}/images/client.png" alt=""/>
                </div>
                <div class="name">
                  <h5>
                    Joans Mark
                  </h5>
                  <p>
                    cal
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
  </section>
  <!-- end client section -->
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container contact_heading">
      <h2>
        Contact Us
      </h2>
      <p>
        psum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
      </p>
    </div>
    <div class="container">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName4">Name</label>
            <input type="text" class="form-control" id="inputName4"/>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4"/>
          </div>

        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNumber4">Phone number</label>
            <input type="tel" class="form-control" id="inputNumber4"/>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Select Service</label>
            <select id="inputState" class="form-control">
              <option selected=""></option>
              <option>...</option>
            </select>
          </div>

        </div>
        <div class="form-group">
          <label for="inputMessage">Message</label>
          <input type="text" class="form-control" id="inputMessage" placeholder=""/>
        </div>
    </div>

    <div class="d-flex justify-content-center">
      <button type="submit" class="">Send</button>
    </div>
    </form>
    
  </section>
  @endsection     