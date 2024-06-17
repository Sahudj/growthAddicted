@extends('layouts.admin')

@section('content')

<style>
  .licenseClass {
    display: none;
  }

  .requiredClass {
    color: red;
  }

  .customButton {
    margin: 7px;
  }
</style>

<div class="affiliate-link-page">
  <div class="affiliate-wrap">
    <div class="affli-dash-header">
      <div class="affli-title">
        <h1>Affiliate Links</h1>
      </div>
    </div>

    <div class="inner-cont">
      <!-- upper row  -->
      <div class="custom-row">
        <!-- card 1 -->
        <div class="crd">
          <div class="crd-title">
            <span class="material-symbols-outlined">
              person
            </span>
            <h2>
              My Referral code
            </h2>
          </div>
          <div class="crd-detail">

            <input type="text" id="userReferralCode" readonly class="custom-input form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->referral_code }}" placeholder="Referral Code" required>

            <button class="copy-btn" id="referral_code">
              <span class="material-symbols-outlined">
                file_copy
              </span>
            </button>
          </div>
        </div>
        <!-- card 2 -->
        <div class="crd">
          <div class="crd-title">
            <span class="material-symbols-outlined">
              videocam
            </span>
            <h2>
              Orientation video
            </h2>
          </div>
          <div class="crd-detail">

            <input type="text" id="orientation" readonly class=" custom-input form-control @error('name') is-invalid @enderror" value="{{!empty($setting) ? $setting->meta_value : '' }}" placeholder="Enter First Name" required>

            <button class="copy-btn" id="orientationLink">
              <span class="material-symbols-outlined">
                file_copy
              </span>
            </button>
          </div>
        </div>
      </div>
      <!-- bottom row  -->
      <div class="custom-row">
        <div class="crd1">
          <div class="crd-title">
            <span class="material-symbols-outlined">
              link
            </span>
            <h2>
              Generate Link For
            </h2>
          </div>
          <select onchange="getLink(this)" class="form-control custom-select1" name="packages" id="packages">
            <option value="0">All Packages</option>
            @foreach($packages as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
          </select>
          <div class="crd-detail">
            <input type="text" id="packageLink" readonly class="custom-input customButton form-control" value="{{url('/')}}/Biz/Orientation?uid=7PZWJvE1bb8WrPOUDsSrsg==" placeholder="Enter First Name" required>
            <button class="copy-btn" id="copyPackageLink">
              <span class="material-symbols-outlined">
                file_copy
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>



</script>

@endsection