@extends('layouts.admin')

@section('content')
<style>
   .background-round
{
    padding: 1px 10px 6px !important;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, .18);
}
</style>
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">
             <div id="card-stats" class="pt-0">
             <h4>Total Fund</h4>
                <div class="row">
                   <div class="col s12 m6 l6 xl3">
                      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                         <div class="padding-4">
                           <div class="row">
                              <div class="col s12 m12">
                              <i class="material-icons background-round mt-5">₹</i> <strong style="font-size:25px"> {{!empty($totalFunds) ? $totalFunds : 0 }} </strong>
                              </div>
                           </div>
                           
                           <div class="row">
                              <div class="col s12 m12">
                              <p>Total Fund</p>
                              </div>
                           </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
            </div>
          </div>
        <!--   <div class="content-overlay"></div> -->
        </div>
      </div>
@endsection           
