@extends('back.layout.template')

@push('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

@endpush

@section('title', 'List Article')

@section('content')

<!-- content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Articles</h1>
  </div>

  <div class="mt3">
    <a href="{{ url('article/create') }}" class="btn btn-success mb-3" >Create Articles</a>


    @if ($errors->any())
    <div class="my-3">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
    @endif

    {{-- success alert --}}
    <div class="swal" data-swal="{{ session('success') }}"></div>

    <table class="table table-striped table-bordered" id="dataTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Title</th>
          <th>Category</th>
          <th>Views</th>
          <th>Status</th>
          <th>Publish Date</th>
          <th>Function</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

  </div>
</main>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- alert --}}

<script>
     const swal = $('.swal').data('swal');

     if (swal) {
        Swal.fire({
            'title':'Success',
            'text':swal,
            'icon':'success',
            'showConfirmButton': false,
            'timer': 2000

        })
     }
</script>

    {{-- data table --}}
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'views',
                        name: 'views'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'publish_date',
                        name: 'publish_date'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]

                });
        });


    </script>

@endpush
