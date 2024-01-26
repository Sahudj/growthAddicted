@extends('layouts.admin')

@section('content')

 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  
                  <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="templatForm" action="{{url('admin/save-email-template')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s12">
                                <label>Title <sup style="color:red;">*</sup> </label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Title title" required>
                                @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>

                          <div class="col s12">
                              <label> Subject <sup style="color:red;">*</sup> </label>
                              <input type="text" name="subject" id="subject" autocomplete="on" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="Enter subject" required>
                              @error('subject')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>    
                        
                        <section class="snow-editor">
                          <div class="row">
                            <div class="col s12">
                              <div class="card">
                                <div class="card-content">
                                  <h4 class="card-title">Snow Editor</h4>
                                  <p class="mb-1">Snow is a clean, flat toolbar theme.</p>
                                  <div class="row">
                                    <div class="col s12">
                                      <div id="snow-wrapper">
                                        <div id="snow-container">
                                        
                                          <div class="editor" >
                                         
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>

                   
                      <div class="row">

                        <div class="col s12 display-flex justify-content-end">
                         <textarea style="display: none;" name="message" id="quill-html"></textarea>
                          <button type="submit" class="btn indigo">
                            Save changes</button>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <script type="text/javascript">
        function copyText(text){
        var inp =document.createElement('input');
        document.body.appendChild(inp)
        inp.value = text;
        inp.select();
        document.execCommand('copy',false);
        inp.remove();
}






      </script>

@endsection           
