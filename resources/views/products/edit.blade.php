@extends('layouts.dash')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css'); }}" />
@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Produse /</span> Editeaza Produs
  </h4>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('products.update',$product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>NUME PRODUS:</strong>
                                <input type="text" name="nume" value="{{ $product->nume }}" class="form-control" placeholder="Nume">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>DESCRIERE PRODUS:</strong>
                                <textarea class="form-control" style="height:150px" name="descriere" placeholder="Descriere">{{ $product->descriere }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>PRET PRODUS:</strong>
                                <input type="text" name="pret" value="{{ $product->pret }}" class="form-control" placeholder="Pret">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            
                </form>
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