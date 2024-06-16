@extends('admin.master')
@section('title' , 'مراحل')
@section('page-title' , 'ثبت مرحله')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/adminlte') }}/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <form action="{{ route('admin.add.step') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">نام مرحله</label>
                    <input type="text" class="form-control" name="step-name" placeholder="نام مرحله" >
                </div>
                <div class="form-group">
                    <label>شماره مرحله</label>
                    <input type="number" name="step-number" class="form-control"  >
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
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $step->step_name }}</td>
                                    <td>{{ $step->step_number }}</td>
                                    <td>
                                        <button class="btn btn-primary step-btn-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" data-url="{{ route('admin.single.step') }}" data-id="{{ $step->step_id }}">ویرایش</button>
                                        <button class="btn btn-danger step-btn-delete" data-url="{{ route('admin.remove.step') }}" data-id="{{ $step->step_id }}">حذف</button>
                                    </td>
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
    <script src="{{ asset('assets/step/step.js') }}"></script>
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
@section('modals')
    <div class="modal fade edit-step-form-container" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ویرایش مرحله</h1>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.add.step') }}" method="POST">
                        @csrf
                        <input type="hidden" name="step-id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام مرحله</label>
                            <input type="text" class="form-control" name="step-name" placeholder="نام مرحله" >
                        </div>
                        <div class="form-group">
                            <label>شماره مرحله</label>
                            <input type="number" name="step-number" class="form-control"  >
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
