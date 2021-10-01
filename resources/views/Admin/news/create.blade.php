@extends('layouts.admin_layout')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @if(count($errors) > 0)

                    <div class="row">
                        <div class="col-12">
                            @include('includes.errors')
                        </div>
                    </div>

                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">


                                    @if(isset($new))
                                        {{ __('تعديل بيانات الخبر') }}
                                    @else
                                        {{ __('إضافة خبر') }}

                                    @endif
                                </h3>
                            </div>


                            <form role="form" action="@if(isset($new)){{route('admin-news.update',$new->id) }} @else {{route('admin-news.store') }} @endif" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($new))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">عنوان الخبر</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error('title') is-invalid @enderror" type="text" @if(isset($new)) value="{{old('title',$new->title)}}" @else value="{{old('title')}}" @endif name="title" id="example-text-input" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        </div>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">الكاتب</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error('author') is-invalid @enderror" type="text" @if(isset($new)) value="{{old('author',$new->author)}}" @else value="{{old('author')}}" @endif name="author" id="example-text-input" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        </div>
                                        @error('author')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">التفاصيل</label>
                                        <div class="col-sm-10">
                                            <textarea id="elm1" name="body" class="form-control @error('body') is-invalid @enderror"  required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">@if(isset($new)) {{old('body',$new->body)}} @else {{old('body')}} @endif</textarea>
                                        </div>
                                        @error('body')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2">صور الخبر</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control @error('media') is-invalid @enderror" name="media" id="example-text-input" multiple required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')">
                                        </div>
                                        @error('media')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color: white">
                                    <input class="btn btn-purple" type="submit" @if(isset($new)) value="تعديل" @else value="إضافة" @endif>
                                </div>

                                @if(count($new->media) > 0)
                                    <div class="row">
                                        @foreach($new->media as $media)
                                            <div class="col-lg-3 col-md-6">
                                                <img src="{{asset('media')}}/{{$media->filename}}" alt="img" class="gallery-thumb-img" style="height: 300px; width: 100%">
                                                <div class="w-100 text-center">
                                                    <input checked type="checkbox" value="{{$media->filename}}" name="checkedimages[]">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>

@endsection
