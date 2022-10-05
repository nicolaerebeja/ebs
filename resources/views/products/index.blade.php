@extends('layouts.dash')

@section('css')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css'); }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css'); }}" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" /> --}}

        <!-- Vendors CSS -->>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'); }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css'); }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css'); }}">

@endsection

@section('content')


@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif

<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Produse /</span> List
  </h4>

<div class="card">
    <div class="card-datatable table-responsive">
        <table id="example" class="invoice-list-table table border-top" style="width:100%">
            <thead>  
            <tr>
                <th>No</th>
                <th>Nume</th>
                <th>Descriere</th>
                <th>Pret</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->nume }}</td>
            <td>{{ $product->descriere }}</td>
            <td>{{ $product->pret }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <div class="d-inline-block text-nowrap">

                    <a class="btn btn-sm btn-icon" href="{{ route('products.edit',$product->id) }}">
                        <i class="bx bx-edit"></i>
                    </a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-icon delete-record" >
                        <i class="bx bx-trash"></i>
                    </button>

                    <a class="btn btn-sm btn-icon" href="{{ route('products.show',$product->id) }}">
                        <i class="bx bx-show-alt"></i>
                    </a>

                </div>
                </form> 
                
            </td>
        </tr>
        @endforeach
        </table>
    </div>
</div>

{!! $products->links() !!}


<div class="modal fade" id="addNewProdus" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3>Adauga Produs</h3>
          </div>

          <form action="{{ route('products.store') }}" method="POST">
            @csrf
          
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>NUME PRODUS:</strong>
                        <input type="text" name="nume" class="form-control" placeholder="NUME">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>DESCRIERE PRODUS:</strong>
                        <textarea class="form-control" style="height:150px" name="descriere" placeholder="DESCRIERE"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>PRET PRODUS:</strong>
                        <input type="text" name="pret" class="form-control" placeholder="PRET">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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
  {{-- <script src="{{ asset('assets/js/dashboards-analytics.js'); }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

  <script src="{{ asset('assets/vendor/libs/moment/moment.js'); }}"></script>
  <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js'); }}"></script>
  <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js'); }}"></script>
  <script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js'); }}"></script>
  <script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js'); }}"></script>

  <script src="{{ asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js'); }}"></script>
  <script src="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js'); }}"></script>
  

  <script>

//let table = $('#example').DataTable();

$(document).ready(function() {
    $('#example').DataTable( {
        dom: '<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"invoice_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [{
            text: '<i class="bx bx-plus me-md-2"></i><span class="d-md-inline-block d-none"  data-bs-toggle="modal" data-bs-target="#addNewProdus" >Adauga produs</span>',
            className: "btn btn-primary",
            // action: function (a, e, t, s) {
            //     window.location = "{{ route('products.create') }}"
            // }
        }]
    } );
} );
 
  </script>
@endsection