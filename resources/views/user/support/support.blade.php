@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
            
              <div id="contact-us" class="section">
                        <div class="app-wrapper">
                          <div class="contact-header">
                            <div class="row contact-us ml-0 mr-0">
                              <div class="col s12 m12 l4 sidebar-title">
                                <h5 class="m-0"><i class="material-icons contact-icon vertical-text-top">mail_outline</i> Contact
                                  Us</h5>
                                <span class="social-icons hide-on-med-and-down">
                                  <?php $socialIcons = DB::table('setting')->where('status', 1)->get(); ?>
                                   @foreach($socialIcons as $row)
                                    <a class="socialClass" href="{{$row->meta_value}}"><img src="{{url('public/social/'.$row->meta_key.'.png')}}" width="40px" /> </a>
                                   
                                    @endforeach
                                </span>
                              </div>
                             
                            </div>
                          </div>

                          <!-- Contact Sidenav -->
                          <div id="sidebar-list" class="row contact-sidenav ml-0 mr-0">
                            <div class="col s12 m12 l4">
                              <!-- Sidebar Area Starts -->
                              <div class="sidebar-left sidebar-fixed">
                                <div class="sidebar">
                                  <div class="sidebar-content">
                                    <div class="sidebar-menu list-group position-relative">
                                      <div class="sidebar-list-padding app-sidebar contact-app-sidebar" id="contact-sidenav">
                                       
                                        <div class="row">
                                          <!-- Place -->
                                        <!--   <div class="col s12 place mt-4 p-0">
                                            <div class="col s2 m2 l2"><i class="material-icons"> place </i></div>
                                            <div class="col s10 m10 l10">
                                              <p class="m-0">H-70, Ward No. 31, <br> Shivaji Nagar, Near JP Hospital, Bhopal</p>
                                            </div>
                                          </div> -->
                                          <!-- Phone -->
                                          <div class="col s12 phone mt-4 p-0">
                                            <div class="col s2 m2 l2"><i class="material-icons"> call </i></div>
                                            <div class="col s10 m10 l10">
                                              <p class="m-0">+91 8962479929</p>
                                            </div>
                                          </div>
                                          <!-- Mail -->
                                          <div class="col s12 mail mt-4 p-0">
                                            <div class="col s2 m2 l2"><i class="material-icons"> mail_outline </i></div>
                                            <div class="col s10 m10 l10">
                                              <p class="m-0">care@growthaddicted.com</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <!-- Sidebar Area Ends -->
                            </div>
                           
                            <div class="col s12 m12 l8 contact-form margin-top-contact">

                              @if(session()->has('message'))
                                @if($message = Session::get('message'))
                                <div class="card-alert card gradient-45deg-green-teal">
                                <div class="card-content white-text">
                                  <p>
                                    <i class="material-icons">check</i> SUCCESS : {{ $message }}.</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                @endif
                              @endif
                              
                              <div class="row">
                                <form class="col s12" action="{{ url('user/contact-mail') }}" method="POST">
                                     @csrf
                                  <div class="row">
                                    <div class="input-field col m6 s12">
                                      <input id="name" type="text" class="validate" name="name">
                                      <label for="name">Your Name</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                      <input id="email" type="text" class="validate" name="email">
                                      <label for="email">Your e-mail</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <input id="company" type="text" class="validate" name="subject">
                                      <label for="company">Subject</label>
                                    </div>
                                    <div class="input-field col s12 width-100">
                                      <textarea id="textarea1" class="materialize-textarea" cols="5" name="message"></textarea>
                                      <label for="textarea1">Textarea</label>
                                      <input type="submit" class="waves-effect waves-light btn" name="submit" value="Send">
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                  
                </div>

              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection           
