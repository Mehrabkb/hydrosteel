<!doctype html>
<html lang="fa" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>هیدرواستیل</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">    <link rel="stylesheet" href="{{ asset('assets/fonts/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/alertifyjs/css/themes/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/alertifyjs/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="row border">
            <div class="col-12 text-center pt-3 form-title-container">
                <p class="form-title">کاربر گرامی به هیدرواستیل خوش آمدید شما میتوانید با شماره پیش فاکتور و موبایل خود آخرین وضعیت فاکتور خود را مشاهده کنید</p>
            </div>
            <hr>
            <div class="col-12 col-md-6 mx-auto">
                <form class="text-center mx-auto pb-3" method="POST" action="{{ route('factor.search') }}">
                    @csrf
                    <div class="form-group my-3">
                        <label for="exampleInputEmail1">شماره موبایل پیش فاکتور</label>
                        <input type="text" class="form-control text-center mt-3" id="exampleInputEmail1" name="mobile" aria-describedby="emailHelp" placeholder="شماره موبایل پیش فاکتور">
                    </div>
                    <div class="form-group my-3">
                        <label for="exampleInputEmail1">شماره پیش فاکتور</label>
                        <input type="text" class="form-control text-center mt-3" id="exampleInputEmail1" name="factor-number" aria-describedby="emailHelp" placeholder="شماره پیش فاکتور">
                    </div>
                    <div class="form-group py-3">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>

                    <button type="submit" class="btn btn-primary px-5 mb-3 py-3 bg-dark">پیگیری سفارش</button>
                    <br >
                    <small class="my-3">در صورت بروز هرگونه مشکل لطفا با شماره <a href="tel:+989031306888">09031306888</a> و <a href="tel:+982133409439">02133409439</a> تماس حاصل کنید</small>
                </form>
            </div>
            <hr>
            @if(session('factor'))
                @php
                    $factor = session('factor');
                    $factorItems = session('factorItems');
                    $user = session('user');
                @endphp
                <div class="row mx-auto">
                    <div class="col-12 item py-3 col-md-3 border text-center">
                        <label>نام کاربر</label>
                        <br>
                        <hr>
                        <span>{{ $user->full_name }}</span>
                    </div>

                    <div class="col-12 item py-3 col-md-3 border text-center">
                        <label>موبایل</label>
                        <br>
                        <hr>
                        <span>{{ $user->mobile }}</span>
                    </div>

                    <div class="col-12 item py-3 col-md-3 border text-center">
                        <label>شماره فاکتور</label>
                        <br>
                        <hr>
                        <span>{{ $factor->factor_number }}</span>
                    </div>

                    <div class="col-12 item py-3 col-md-3 border text-center">
                        <label>تاریخ تحویل تقریبی</label>
                        <br>
                        <hr>
                        <span>{{ $factor->exp_date }}</span>
                    </div>
                    <div class="col-12 mt-5">
                        @foreach($factorItems as $factorItem)
                            <div class="row py-3 my-3 border factor-item-row text-center">
                                <div class="col-12 col-md-4">
                                    <label>نام محصول</label>
                                    <hr>
                                    <p>{{ $factorItem->title }}</p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label>مرحله</label>
                                    <hr>
                                    <p>{{ $factorItem->step_name }}</p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <label>تاریخ تحویلی</label>
                                    <hr>
                                    <p>{{ $factorItem->date }}</p>
                                </div>
                                <div class="col-12">
                                    <label>توضیحات</label>
                                    <hr>
                                    <p>{{ $factorItem->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/progressBarPlugin/progress.plugin.js') }}"></script>
<script src="{{ asset('assets/alertifyjs/alertify.min.js') }}"></script>
<script src="{{ asset('assets/customer.js') }}"></script>
    @if($errors->any())
        <script>
            alertify.error('{{ $errors->first() }}');
        </script>
    @endif
    @if(session('success'))
        <script>
            alertify.success('{{ session('success') }}');
        </script>
    @endif
</body>
</html>
