@extends('admin.master')
@section('title' , 'فاکتور')
@section('page-title' , 'فاکتور')
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <label>نام کاربر</label>
                            <input type="text" class="form-control" name="user-name" placeholder="نام کاربر">
                        </div>
                        <div class="col-12 col-md-3">
                            <label>شماره موبایل کاربر</label>
                            <input type="text" class="form-control" name="user-mobile" placeholder="موبایل" >
                        </div>
                        <div class="col-12 col-md-3">
                            <label>شماره پیش فاکتور</label>
                            <input type="text" class="form-control" name="factor-number" placeholder="شماره پیش فاکتور">
                        </div>
                        <div class="col-12 col-md-3">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control exp-date" name="exp-date" placeholder="تاریخ تحویل">
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
                            <input type="text" class="form-control" name="product-title[]" placeholder="نام محصول">
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
                            <input type="text" class="form-control" placeholder="تاریخ تقریبی محصول" name="product-date[]">
                        </div>
                        <div class="col-12 col-md-12 mt-3">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="product-description[]"></textarea>
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
    <script>
        let steps = @json($steps);
    </script>
    <script src="{{ asset('assets/factor/factor.js') }}"></script>
@endsection
