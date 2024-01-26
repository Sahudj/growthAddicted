@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                 
                    <div class="row">

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

                     
                      <form method="POST" name="brand-form" id="brand-form" action="{{url('admin/update-payout')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          @foreach($getDetails as $row)
                            <div class="col s4">
                              <div class="form-group">
                                  <label>Name </label>
                                  <input type="text" name="name[]" class="form-control" value="{{ $row->name}}" required>
                              </div>    
                            </div>

                             <div class="col s4">
                              <div class="form-group">
                                  <label>Amount </label>
                                  <input type="number" name="amount[]" class="form-control" value="{{ $row->amount}}" required>
                              </div>    
                            </div>   

                            <div class="col s4">
                              <div class="form-group">
                                  <label>Company Amount </label>
                                  <input type="text" name="company_amount[]" class="form-control" value="{{ $row->company_amount}}" required>
                              </div>    
                            </div>
                          <input type="hidden" name="affiliateCommId[]" value="{{$row->id}}">
                          <input type="hidden" name="userId[]" value="{{$row->user_id}}">
                          @endforeach 
                        </div>

                        <div class="row">    
                         
                          <input type="hidden" name="affiliateId" value="{{$row->affiliate_id}}">
                          <div class="col s12 display-flex center-content-end mt-3">
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
