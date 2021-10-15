@extends('layouts.admin_layout')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('تفاصيل الشكوي') }}</h4>
                                <form method="post">
                                    <textarea id="elm1" name="area">{{$contact->body}}</textarea>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>

@endsection
