@extends('layouts.admin_layout')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">


                                    @if(isset($category))
                                        {{ __('تعديل بيانات الإعلان') }}
                                    @else
                                        {{ __('إضافة إعلان') }}

                                    @endif
                                </h3>
                            </div>


                            <form role="form" action="@if(isset($sponsor)){{route('admin-sponsors.update',$sponsor->id) }} @else {{route('admin-sponsors.store') }} @endif" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($sponsor))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">رابط الإعلان</label>
                                        <input class="form-control @error('link') is-invalid @enderror" type="text" @if(isset($sponsor)) value="{{old('link',$sponsor->link)}}" @else value="{{old('link')}}" @endif name="link" id="example-text-input" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2">الصورة</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept=".jpeg,.png,.jpg,.JPG" id="example-text-input" @if(!isset($category)) required @endif oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="card-footer" style="background-color: white">
                                    <input class="btn btn-purple" type="submit" @if(isset($sponsor)) value="تعديل" @else value="إضافة" @endif>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



            </div> <!-- container-fluid -->
        </div>

@endsection
