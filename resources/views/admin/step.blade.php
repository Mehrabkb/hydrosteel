@extends('admin.master')
@section('title' , 'مراحل')
@section('page-title' , 'ثبت مرحله')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام مرحله</label>
                    <input type="text" class="form-control" placeholder="نام مرحله" >
                </div>
                <div class="form-group">
                    <label>شماره مرحله</label>
                    <input type="number" class="form-control"  >
                </div>
                <button type="submit" class="btn btn-primary">ثبت</button>
            </form>
        </div>
        <div class="col-12 col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول اطلاعات</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام مرحله</th>
                            <th>شماره مرحله</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $counter = 0 ; @endphp
                            @foreach($steps as $step)
                                <td>{{ ++$counter }}</td>
                                <td>{{ $step->step_name }}</td>
                                <td>{{ $step->step_number }}</td>
                                <td>
                                    <button class="btn btn-primary">ویرایش</button>
                                    <button class="btn btn-danger">حذف</button>
                                </td>
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
