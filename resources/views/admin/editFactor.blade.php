@extends('admin.master')
@section('title' , 'ویرایش فاکتور')
@section('page-title' , 'ویرایش فاکتور')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <h2 class="text-center my-3">ویرایش فاکتور </h2>
            <hr>
            <form >
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-md-3 mt-3">
                            <label>نام کاربر</label>
                            <input type="text" class="form-control" name="user-name" placeholder="نام کاربر" autocomplete="off" value="{{ $user->full_name }}" disabled>
                        </div>
                        <div class="col-12 col-md-3 mt-3">
                            <label>شماره موبایل کاربر</label>
                            <input type="text" class="form-control" name="user-mobile" placeholder="موبایل"  autocomplete="off" value="{{ $user->mobile }}" disabled>
                        </div>
                        <div class="col-12 col-md-3 mt-3">
                            <label>شماره پیش فاکتور</label>
                            <input type="text" class="form-control" name="factor-number" placeholder="شماره پیش فاکتور" autocomplete="off" value="{{ $factor->factor_number }}" disabled>
                        </div>
                        <div class="col-12 col-md-3 mt-3">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control exp-date" name="exp-date" placeholder="تاریخ تحویل" autocomplete="off" value="{{ $factor->exp_date }}">
                        </div>
                    </div>
                </div>
                <div class="form-group items">
                    @foreach($factorItems as $factorItem)
                        <div class="row items-continer p-5 border">
                        <div class="col-12">
                            <h3>آیتم محصول</h3>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>نام محصول</label>
                            <input type="text" class="form-control" name="product-title[]" placeholder="نام محصول" autocomplete="off" value="{{ $factorItem->title }}" disabled>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>مرحله</label>
                            <select class="form-control" name="product-step-id[]">
                                @foreach($steps as $step)
                                        <option {{ $step->step_id == $factorItem->step_id ? 'selected' : '' }} value="{{ $step->step_id }}">{{ $step->step_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>تاریخ تقریبی تحویل</label>
                            <input type="text" class="form-control product-date" placeholder="تاریخ تقریبی محصول" name="product-date[]" autocomplete="off" value="{{ $factorItem->date }}">
                        </div>
                        <div class="col-12 col-md-12 mt-3">
                            <label>توضیحات</label>
                            <textarea class="form-control product-description" name="product-description[]" autocomplete="off" >
                                {{ $factorItem->description }}
                            </textarea>
                        </div>
                        <div class="col-12 col-md-12 text-center mt-3" >
                            <button class="btn btn-primary btn-edit-factor-item" type="button"  data-url="{{ route('admin.edit.factorItem') }}" data-id="{{ $factorItem->factor_item_id }}">ویرایش</button>
                        </div>
                    </div>
                    @endforeach
                </div>
{{--                <button type="button" class="btn btn-success btn-add-item">افزودن آیتم جدید</button>--}}
{{--                <button type="submit" class="btn btn-primary">ثبت</button>--}}
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/factor/factorItem.js') }}"></script>
@endsection
