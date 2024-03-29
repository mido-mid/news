@extends('layouts.app')

@section('content')
    <section class="complaints" style="padding-top:150px">
        <div class="container ">
            <h4 class="text-center" style="color: red">يسعدنا قبول الشكوي او الاقتراح الخاص بحضراتكم</h4>
            <br>
            <h6 class="text-center"> برجاء ادخال البينات التاليه بشكل صحيح حتي نتمكن من التواصل مع سادتكم بخصوص الشكوي او الاقتراح المقدم لنا</h6>
            <br>
            @include('includes.errors')
            <div class="col-12">
                @if(session('status'))
                    <div dir="rtl" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div dir="rtl" class="col-md-10 col-12 mx-auto complaints-div text-center" >
                <form role="form" enctype="multipart/form-data" action="{{route('contacts.store') }}" method="POST">


                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">{{ __("الإسم :")  }}</label>
                        <input class="is-invalid" type="text" value="{{old('name')}}" id="name" name="name" placeholder="برجاء ادخال الاسم" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">{{ __("البريد الإلكتروني:")  }}</label>
                        <input class="@error('email') is-invalid @enderror" type="text" value="{{old('email')}}" id="email" placeholder="برجاء ادخال البريد الاليكتروني"  name="email" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- State -->
                    <div class="form-group">
                        <label for="state">{{ __("رقم الهاتف :")  }}</label>
                        <input type="tel" value="{{old('phone')}}" class="@error('phone') is-invalid @enderror" name="phone" placeholder="برجاء ادخال رقم الهاتف" id="state" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <textarea class="col-md-8 col-12 @error('complaint') is-invalid @enderror" name="complaint" placeholder="ادخل الشكوي/الاقتراح" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')"></textarea>
                        @error('complaint')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="text-center mx-auto btn btn-success" type="submit" style="width: 100px">إرسال</button>

                </form>
            </div>
            <br>
        </div>
    </section>
@endsection
