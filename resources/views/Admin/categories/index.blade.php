@extends('layouts.admin_layout')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <button style="float: right" type="button" class="btn btn-primary waves-effect waves-light" onclick="window.location.href='{{route('admin-categories.create')}}'">إضافة قسم</button>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="col-12">
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">الأقسام</h3>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    @if(count($categories) > 0)
                                        <thead>
                                            <tr>

                                                <th>اسم القسم</th>
                                                <th>صورة القسم</th>
                                                <th>أدوات التحكم</th>
                                            </tr>
                                        </thead>

                                        @foreach($categories as $category)
                                            <tbody>
                                                <tr>

                                                    <td>{{$category->name}}</td>

                                                    <td><center><img src="{{ asset('category_images/'.$category->image) }}" style="width: 20%;height:200px"></center></td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="drop-down-button">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <form action="{{ route('admin-categories.destroy', $category->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("هل تريد حذف هذا القسم ؟") }}') ? this.parentElement.submit() : ''">{{ __('حذف') }}</button>

                                                                </form>
                                                                <a class="dropdown-item" href="{{ route('admin-categories.edit', $category->id) }}">{{ __('تعديل') }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                        @endforeach

                                    @else

                                        <tbody>
                                            <tr>
                                                <td colspan="3">
                                                    <center>
                                                        <h3>لا يوجد أقسام حتي الأن !</h3>
                                                        <a class="btn btn-danger" href="{{ route('admin-categories.create')}}">إضافة</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>

                                    @endif

                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



            </div> <!-- container-fluid -->
        </div>

@endsection
