@extends('layouts.admin_layout')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('تفاصيل الخبر') }}</h4>
                                <form method="post">
                                    <textarea id="elm1" name="area">{{$new->body}}</textarea>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                @if(count($new->media) > 0)
                    <div class="row">
                        @foreach($new->media as $media)
                            <div class="col-lg-3 col-md-6">
                                <img src="{{asset('media')}}/{{$media->filename}}" alt="img" class="gallery-thumb-img" style="height: 300px; width: 200px">
                            </div>
                        @endforeach
                    </div>
                @endif

            </div> <!-- container-fluid -->
        </div>

@endsection
