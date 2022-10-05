@extends('layouts.dash')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css'); }}" />
@endsection

@section('content')

<div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Congratulations {{Auth::user()->name}}! 🎉</h5>
              <p class="mb-4"> {{ __('You are logged in!') }}</p>
              </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png'); }}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png'); }}" data-app-light-img="illustrations/man-with-laptop-light.png'); }}">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection

@section('js')
  <!-- Vendors JS -->
  <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js'); }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js'); }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('assets/js/dashboards-analytics.js'); }}"></script>
@endsection

