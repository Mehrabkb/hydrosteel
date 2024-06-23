@extends('admin.master')
@section('title' , 'محصولات')
@section('page-title' , 'محصولات')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول اطلاعات</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام محصول</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $counter = 0 ; @endphp
                        @foreach($products as $product)
                            <tr>
                                <td>{{ ++$counter }}</td>
                                <td>{{ $product->title}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/adminlte') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/adminlte') }}/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script>
        $(function(){
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false
            });
        })

    </script>
@endsection
