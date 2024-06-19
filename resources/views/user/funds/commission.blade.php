@extends('layouts.admin')

@section('content')



<div class="commisions-page">
  <div class="commisions-pagewrap">

    <div class="commison-header">
      <div class="comission-det">
        @if($type == 1)
        <h3>Today's Earnings</h3>
        <h1>₹ {{(!empty($todayEarning) || !empty($todayTeamHelpingBonus)) ? ($todayEarning+$todayTeamHelpingBonus) : 0 }}</h1>
        @elseif($type == 2)
        <h3>Pending Amount </h3>
        <h1>₹ {{ !empty($todayPayout) ? $todayPayout : 0 }}</h1>
        @elseif($type == 3)
        <h3>Alltime Total Earning </h3>
        <h1>₹ {{ !empty($alltime) ? $alltime : 0 }}</h1>
        @elseif($type == 4)
        <h3>Last 7 Days Earning </h3>
        <h1>₹ {{ !empty($lastSevenEarning) ? $lastSevenEarning : 0 }}</h1>
        @elseif($type == 5)
        <h3>Last 30 Days Earning </h3>
        <h1>₹ {{ !empty($earningthisMonth) ? $earningthisMonth : 0 }}</h1>
        @endif
      </div>
    </div>

    <div class="transaction-cont">
      <div class="transac-wrap">
        <div class="option-btns">
          <p>Income Type</p>
          <button id="typedirect" class="active">Direct</button>
          <button id="typepassive">Passive</button>
        </div>

        <div class="individual-transc-cont" id="direct-income">
          <div class="title">Direct Income</div>
          <div class="transctions">
            @foreach($getDetails as $row)
            @if($row->comm_status == 1)

            <div class="transaction-card">
              <div class="tran-card-wrap">
                <div class="top">
                  <div class="prof-pic">
                    @if($row->profile_pic)
                    <!-- <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar"> -->
                    <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                    @else
                    <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                    @endif
                  </div>
                  <div class="usr-name">
                    <h2>{{$row->name}}</h2>
                    <h4>{{$row->referral_code}}</h4>

                  </div>
                </div>
                <div class="mid">
                  <div class="md-lft">
                    <div class="amount">₹ {{$row->amount}}</div>
                  </div>
                  <div class="md-rt">
                    <div class="badge">{{$row->packageName}}</div>
                  </div>
                </div>
                <div class="bottm">
                  @if($row->send_by != '')
                  <?php
                  $sponsor = DB::table('users')->select('name')->where('id', $row->send_by)->first(); ?>
                  @endif
                  <div class="sponsor-cont">
                    <h4>Referred By {{$sponsor->name}}</h4>
                    <div class="inc-type">{{($row->comm_status == 1 ? "Direct Income" : "Passive Income")}}</div>
                  </div>
                  <div class="timestamp">
                    <h5>{{ date('d-m-Y H:i A', $row->timestamp) }}</h5>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach

          </div>
        </div>
        <div class="individual-transc-cont" id="passive-income">
          <div class="title">Passive Income</div>
          <div class="transctions">

            @foreach($getDetails as $row)
            @if($row->comm_status == 2)
            <div class="transaction-card">
              <div class="tran-card-wrap">
                <div class="top">
                  <div class="prof-pic">
                    @if($row->profile_pic)
                    <!-- <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar"> -->
                    <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                    @else
                    <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                    @endif
                  </div>
                  <div class="usr-name">
                    <h2>{{$row->name}}</h2>
                    <h4>{{$row->referral_code}}</h4>

                  </div>
                </div>
                <div class="mid">
                  <div class="md-lft">
                    <div class="amount">₹ {{$row->amount}}</div>
                  </div>
                  <div class="md-rt">
                    <div class="badge">{{$row->packageName}}</div>
                  </div>
                </div>
                <div class="bottm">
                  @if($row->send_by != '')
                  <?php
                  $sponsor = DB::table('users')->select('name')->where('id', $row->send_by)->first(); ?>
                  @endif
                  <div class="sponsor-cont">
                    <h4>Referred By {{$sponsor->name}}</h4>
                    <div class="inc-type">{{($row->comm_status == 1 ? "Direct Income" : "Passive Income")}}</div>
                  </div>
                  <div class="timestamp">
                    <h5>{{ date('d-m-Y H:i A', $row->timestamp) }}</h5>
                  </div>
                </div>
              </div>
            </div>

            @endif
            @endforeach

          </div>
        </div>

      </div>

    </div>

  </div>
</div>


<!-- <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              @if($type == 1)
              <h4>Today's Total Earning {{(!empty($todayEarning) || !empty($todayTeamHelpingBonus)) ? ($todayEarning+$todayTeamHelpingBonus) : 0 }}</h4>
              @elseif($type == 2)
              <h4>Pending Amount </h4>
              @elseif($type == 3)
              <h4>Alltime Total Earning </h4>
              @elseif($type == 4)
              <h4>Last 7 Days Earning </h4>
              @elseif($type == 5)
              <h4>Last 30 Days Earning </h4>
              @endif
              <div class="row">

                <div class="col s6">
                  <h5>Direct Income</h5>
                  <hr>
                  @foreach($getDetails as $row)
                  @if($row->comm_status == 1)
                  <div class="card recent-buyers-card animate fadeUp">
                    <div class="card-content">
                      <div class="card-alert card purple">
                        <div class="card-content white-text">
                          <p>{{$row->packageName}}</p>
                        </div>
                      </div>

                      <div class="card-alert card gradient-45deg-purple-deep-orange">
                        <div class="card-content white-text">
                          <p>
                            Ref By :
                            @if($row->send_by != '')
                            <?php
                            $sponsor = DB::table('users')->select('name')->where('id', $row->send_by)->first(); ?>
                            @endif
                            {{$sponsor->name}} - {{($row->comm_status == 1 ? "(Direct Income)" : "(Passive Income)")}}
                          </p>
                        </div>
                      </div>

                      <hr>


                      <ul class="collection mb-0">

                        <li class="collection-item avatar">
                          @if($row->profile_pic)
                          <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar">
                          @else
                          <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                          @endif
                          <p class="font-weight-600" style="width: 30px;">{{$row->name}}</p>
                          <p class="medium-small">{{$row->referral_code}}</p>
                          <p class="medium-small">{{ date('d-m-Y H:i A', $row->timestamp) }}</p>
                          <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                        </li>



                      </ul>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
                <div class="col s6">
                  <h5>Passive Income</h5>
                  <hr>
                  @foreach($getDetails as $row)
                  @if($row->comm_status == 2)
                  <div class="card recent-buyers-card animate fadeUp">
                    <div class="card-content">
                      <div class="card-alert card purple">
                        <div class="card-content white-text">
                          <p>{{$row->packageName}}</p>
                        </div>
                      </div>

                      <div class="card-alert card gradient-45deg-purple-deep-orange">
                        <div class="card-content white-text">
                          <p>
                            Ref By :
                            @if($row->send_by != '')
                            <?php
                            $sponsor = DB::table('users')->select('name')->where('id', $row->send_by)->first(); ?>
                            @endif
                            {{$sponsor->name}} - {{($row->comm_status == 1 ? "(Direct Income)" : "(Passive Income)")}}
                          </p>
                        </div>
                      </div>

                      <hr>


                      <ul class="collection mb-0">

                        <li class="collection-item avatar">
                          @if($row->profile_pic)
                          <img src="{{url('public/profile_pic/'.$row->profile_pic)}}" class="circle" alt="avatar">
                          @else
                          <img src="{{url('public/admin/')}}/app-assets/images/avatar/avatar-7.png" class="circle" alt="avatar">
                          @endif
                          <p class="font-weight-600" style="width: 30px;">{{$row->name}}</p>
                          <p class="medium-small">{{$row->referral_code}}</p>
                          <p class="medium-small">{{ date('d-m-Y H:i A', $row->timestamp) }}</p>
                          <a href="#" class="secondary-content" style="font-size: 20px;"> {{$row->amount}}</a>
                        </li>



                      </ul>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div> -->









<script type="text/javascript">
  function copyText(text) {
    var inp = document.createElement('input');
    document.body.appendChild(inp)
    inp.value = text;
    inp.select();
    document.execCommand('copy', false);
    inp.remove();
  }

  $(document).ready(function() {
    $("#typedirect").click((e)=>{
      e.preventDefault();
      $("#typedirect").addClass('active');
      $("#typepassive").removeClass('active');
      $("#direct-income").slideDown(1000);
      $("#passive-income").hide();
    })
    $("#typepassive").click((e)=>{
      e.preventDefault();
      $("#typedirect").removeClass('active');
      $("#typepassive").addClass('active');
      $("#direct-income").hide();
      $("#passive-income").slideDown(1000);
    })

  })
</script>

@endsection