@extends('layouts.admin')

@section('content')

<div class="commisions-page">
  <div class="commisions-pagewrap">

    <div class="commison-header">
      <div class="comission-det">
        <h3>Team Helping Bonus</h3>
        <h1 class="format-commas">₹ {{ !empty($teamHelpingBonus) ? $teamHelpingBonus : 0 }}</h1>
      </div>
    </div>

    <div class="transaction-cont">
      <div class="transac-wrap">
        <div class="individual-transc-cont" id="direct-income">
          <div class="helpingb-transctions">

            @foreach($getDetails as $row)
            <div class="transaction-card">
              <div class="tran-card-wrap">
                @if($row->send_by != '')
                <?php
                $sponsor = DB::table('users')->select(['name', 'email', 'mobile_no'])->where('id', $row->send_by)->first(); ?>
                @endif
                <div class="spo-det-btn" id="spo-det-btn"><span class="material-symbols-outlined">info</span></div>
                <div class="sponsors-details">
                  <div class="spo-det-left">
                    <h4 class="spo-ttl">Reffered By</h4>
                    <h5>{{$sponsor->name}}</h5>
                  </div>
                  <div class="spo-det-right">
                    @if(auth()->user()->order_status == 1)
                    <h5><a href="mailto:{{$sponsor->email}}"><span class="material-symbols-outlined">alternate_email</span></a></h5>
                    <h5><a href="tel:{{$sponsor->mobile_no}}"><span class="material-symbols-outlined">call</span></a></h5>
                    @endif
                  </div>
                </div>

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
                  <div class="timestamp">
                    <h5>{{ date('d-m-Y H:i A', $row->timestamp) }}</h5>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
    function animateNumbers(element) {
      $(element).each(function() {
        var $this = $(this);
        var finalNumber = parseFloat($this.text().replace(/[^0-9.]/g, ''));
        var currentNumber = 0;

        // Define animation duration and intervals
        var duration = 2000;
        var refreshInterval = 50;
        var steps = duration / refreshInterval;
        var increment = finalNumber / steps;

        var interval = setInterval(function() {
          currentNumber += increment;
          if (currentNumber >= finalNumber) {
            currentNumber = finalNumber;
            clearInterval(interval);
          }
          $this.text('₹ ' + formatNumber(currentNumber));
        }, refreshInterval);
      });
    }

    function formatNumber(number) {
      return number.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Trigger the animation only for elements within comission-det class
    $('.comission-det .format-commas').each(function() {
      animateNumbers($(this));
    });

    $('.tran-card-wrap .spo-det-btn').click(function(event) {
      event.stopPropagation();
      $(this).siblings('.sponsors-details').toggleClass('show');
    });

    // Hide sponsors-details when clicking outside
    $(document).click(function(event) {
      if (!$(event.target).closest('.tran-card-wrap').length) {
        $('.sponsors-details').removeClass('show');
      }
    });

  })
</script>

@endsection