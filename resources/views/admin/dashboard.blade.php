@extends('layouts.dash')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css'); }}" />
@endsection

@section('content')

<div class="col-md-12 col-lg-4 mb-4">
  <div class="card">
    <div class="d-flex align-items-end row">
      <div class="col-8">
        <div class="card-body">
          <h6 class="card-title mb-1 text-nowrap">Congratulations {{Auth::user()->name}}!</h6>
          <small class="d-block mb-3 text-nowrap">Faci parte din Administratori acum</small>

          <h5 class="card-title text-primary mb-1">Poti Creea, Edita, Visualiza, Sterge Produse</h5>

          <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Vezi lista cu produse</a>
        </div>
      </div>
      <div class="col-4 pt-3 ps-0">
        <img src="{{ asset('assets/img/illustrations/prize-light.png'); }}" width="90" height="140" class="rounded-start" alt="View Sales">
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