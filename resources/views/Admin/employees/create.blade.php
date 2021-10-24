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


                                    @if(isset($employee))
                                        {{ __('تعديل بيانات الموظف') }}
                                    @else
                                        {{ __('إضافة موظف') }}

                                    @endif
                                </h3>
                            </div>


                            <form role="form" action="@if(isset($employee)){{route('admin-employees.update',$employee->id) }} @else {{route('admin-employees.store') }} @endif" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($employee))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">اسم الموظف</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" @if(isset($employee)) value="{{old('name',$employee->name)}}" @else value="{{old('name')}}" @endif name="name" id="example-text-input" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">اسم الوظيفة</label>
                                        <input class="form-control @error('position') is-invalid @enderror" type="text" @if(isset($employee)) value="{{old('position',$employee->position)}}" @else value="{{old('position')}}" @endif name="position" id="example-text-input" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="example-text-input" class="col-sm-2">الصورة</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept=".jpeg,.png,.jpg,.JPG" id="example-text-input" @if(!isset($employee)) required @endif oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="card-footer" style="background-color: white">
                                    <input class="btn btn-purple" type="submit" @if(isset($employee)) value="تعديل" @else value="إضافة" @endif>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



            </div> <!-- container-fluid -->
        </div>

@endsection
