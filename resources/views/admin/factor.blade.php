@extends('admin.master')
@section('title' , 'فاکتور')
@section('page-title' , 'فاکتور')
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربر</th>
                            <th>شماره پیش فاکتور</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $counter = 0 ; @endphp
                        @foreach($factors as $factor)
                            <tr>
                                <td>{{ ++$counter }}</td>
                                <td>{{ $factor->name . ' ' . $factor->last_name }}</td>
                                <td>{{ $factor->factor_number }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <h2 class="text-center my-3">افزودن فاکتور جدید</h2>
            <hr>
            <form method="POST" action="{{ route('admin.add.factor') }}">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-3 mt-3">
                            <label>نام کاربر</label>
                            <input type="text" class="form-control" name="user-name" placeholder="نام کاربر" autocomplete="off">
                        </div>
                        <div class="col-12 col-md-3 mt-3">
                            <label>شماره موبایل کاربر</label>
                            <input type="text" class="form-control" name="user-mobile" placeholder="موبایل"  autocomplete="off">
                        </div>
                        <div class="col-12 col-md-3 mt-3">
                            <label>شماره پیش فاکتور</label>
                            <input type="text" class="form-control" name="factor-number" placeholder="شماره پیش فاکتور" autocomplete="off">
                        </div>
                        <div class="col-12 col-md-3 mt-3">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control exp-date" name="exp-date" placeholder="تاریخ تحویل" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group items">
                    <div class="row items-continer p-5 border">
                        <div class="col-12">
                            <h3>آیتم محصول</h3>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>نام محصول</label>
                            <input type="text" class="form-control" name="product-title[]" placeholder="نام محصول" autocomplete="off">
                        </div>
                        <div class="col-12 col-md-4">
                            <label>مرحله</label>
                            <select class="form-control" name="product-step-id[]">
                                @foreach($steps as $step)
                                    <option value="{{ $step->step_id }}">{{ $step->step_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control product-date" placeholder="تاریخ تقریبی محصول" name="product-date[]" autocomplete="off">
                        </div>
                        <div class="col-12 col-md-12 mt-3">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="product-description[]" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-add-item">افزودن آیتم جدید</button>
                <button type="submit" class="btn btn-primary">ثبت</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/adminlte') }}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/adminlte') }}/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script>
        let steps = @json($steps);
    </script>
    <script src="{{ asset('assets/factor/factor.js') }}"></script>
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
