@extends('layouts.auth')

@section('content')
    <div class="account-pages mt-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="index.html"><img src="{{asset('assets')}}/images/logo.png" height="30" alt="logo"></a>
                                </div>
                            </div>
                            <div class="p-3">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h4 class="font-size-18 mt-2 text-center">إعادة تعيين كلمة السر</h4>
                                <p class="text-muted text-center mb-4">أدخل البريد الإلكتروني و سيتم إرسال التعليمات الخاصة بإعادة التعيين</p>

                                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">

                                    @csrf

                                    <div class="form-group">
                                        <label for="username">البريد الإلكتروني</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">إرسال رابط إعادة تعيين كلمة السر</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white"><a href="pages-login.html" class="font-weight-bold text-primary"> تسجيل دخول </a> </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

