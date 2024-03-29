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
                                        {{ __('تعديل بيانات القسم') }}
                                    @else
                                        {{ __('إضافة قسم') }}

                                    @endif
                                </h3>
                            </div>


                            <form role="form" action="@if(isset($category)){{route('admin-categories.update',$category->id) }} @else {{route('admin-categories.store') }} @endif" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($category))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">اسم القسم</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" @if(isset($category)) value="{{old('name',$category->name)}}" @else value="{{old('name')}}" @endif name="name" id="example-text-input" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('name')
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
                                    <input class="btn btn-purple" type="submit" @if(isset($category)) value="تعديل" @else value="إضافة" @endif>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



            </div> <!-- container-fluid -->
        </div>

@endsection
