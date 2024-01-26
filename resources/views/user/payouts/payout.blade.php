@extends('layouts.admin')

@section('content')
 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-content">
            
                <div class="row">

                  @if(isset($payouts) && !empty($payouts))
                    <?php $amountArr = []; ?>
                    @foreach($payouts as $row)
                        <?php $amountArr[] = $row->amount; ?>  
                    @endforeach

                  <a class="btn btn-sm waves-effect waves-light blue lightrn-1">Total Payout Amount : {{array_sum($amountArr)}}</a>
                    <br>

                  <form method="get" name="banner-form" id="banner-form" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col m4 s12">
                                <label>From </label>
                                <input type="date" name="fromDate" class="form-control" value="{{isset($_GET['fromDate']) ? $_GET['fromDate'] : ''}}"  placeholder="Enter from date" required>
                          </div>

                          <div class="col m4 s12">
                                <label>To </label>
                                <input type="date" name="toDate" class="form-control" value="{{isset($_GET['toDate']) ? $_GET['toDate'] : ''}}"  placeholder="Enter to date" required>
                          </div> 

                          <div class="col m4 s12">
                            <br><br>
                            <button type="submit" class="btn indigo">Filter</button>
                          </div>
                        </div>
                    </form>
                    
                    <table id="users-list-datatable" class="table">
                        <thead>
                          <tr>
                            <th>Sr. No</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Amount</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          
                          @if(isset($payouts) && !empty($payouts))
                          <?php $i = 1; ?>
                            @foreach($payouts as $row)

                        
                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->payoutDate}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->amount}}</td>
                              </tr>
                          
                             @endforeach
                          @endif
                             
                        </tbody>
                      </table>
                  @endif

                  </div>
                  
                </div>

              </div>
             </div>
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection           
