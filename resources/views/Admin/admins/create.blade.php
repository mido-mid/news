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
                                    @if(isset($admin))
                                        {{ __('إضافة مشرف') }}
                                    @else
                                        {{ __('تعديل بيانات المشرف') }}
                                    @endif
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" enctype="multipart/form-data"
                                  action="@if(isset($admin)){{route('admins.update',$admin->id) }} @else {{route('admins.store') }} @endif"
                                  method="POST">
                                @csrf
                                @if(isset($admin))
                                    @method('PUT')
                                @endif

                                <div class="card-body">
                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name">{{ __("الإسم")  }}</label>
                                        <input class="form-control" type="text"
                                               @if(isset($admin)) value="{{old('name',$admin->name)}}" @else value="{{old('name')}}"  @endif
                                               id="name" name="name" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">{{ __("البريد الإلكتروني")  }}</label>
                                        <input class="form-control" type="text"
                                               @if(isset($admin)) value="{{old('email',$admin->email)}}" @else value="{{old('email')}}"  @endif
                                               id="email" name="email" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- State -->
                                    <div class="form-group">
                                        <label for="state">{{ __("نوع")  }}</label>
                                        <select class="form-control" name="type" id="state" required oninput="this.setCustomValidity('')"
                                                oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                                <option @if(isset( $admin )) @if($admin->type == "admin") selected @endif @endif value="admin">Admin</option>
                                                <option @if(isset( $admin )) @if($admin->type == "publisher") selected @endif @endif value="publisher">Publisher</option>
                                        </select>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password">{{ __("كلمة السر")  }}</label>
                                        <input class="form-control" type="password" name="password" id="password" @if(!isset( $admin )) required @endif oninput="this.setCustomValidity('')"
                                               oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">{{ __("تأكيد كلمة السر")  }}</label>
                                        <input class="form-control" type="password" name="password_confirmation" id="password2" @if(!isset( $admin )) required @endif oninput="this.setCustomValidity('')"
                                               oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="card-footer" style="background-color: white">
                                    <input class="btn btn-purple" type="submit"
                                           @if(isset($admin)) value="{{ __("تعديل") }}"
                                           @else value="{{ __('إضافة') }}" @endif>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
    </div>

@endsection
