@extends('layouts.admin_layout')

@section('content')


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <button style="float: right" type="button" class="btn btn-primary waves-effect waves-light" onclick="window.location.href='{{route('admin-news.create')}}'">إضافة خبر</button>
                        @if($approved == true)
                            <button type="button" style="float: left" class="btn btn-primary waves-effect waves-light" onclick="window.location.href='{{route('admin.pending_news')}}'">الاخبار التي لم تقبل</button>
                        @endif
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
                                <h3 class="card-title">الأخبار</h3>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    @if(count($news) > 0)
                                        <thead>
                                        <tr>

                                            <th>عنوان الخبر</th>
                                            <th>الكاتب</th>
                                            <th>القسم</th>
                                            <th>أدوات التحكم</th>
                                            @if($approved == false)
                                                <th>حالة الخبر</th>
                                            @endif
                                        </tr>
                                        </thead>

                                        @foreach($news as $new)
                                            <tbody>
                                            <tr>

                                                <td><a href="{{route('admin-news.show',$new->id)}}">{{$new->title}}</a></td>

                                                <td>{{$new->author}}</td>

                                                <td>{{$new->category->name}}</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="drop-down-button">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <form action="{{ route('admin-news.destroy', $new->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("هل تريد حذف هذا الخبر ؟") }}') ? this.parentElement.submit() : ''">{{ __('حذف') }}</button>

                                                            </form>
                                                            <a class="dropdown-item" href="{{ route('admin-news.edit', $new->id) }}">{{ __('تعديل') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                @if($approved == false)
                                                    <td>

                                                        <form action="{{ route('admin.approve_news', $new->id) }}" method="post">
                                                            @csrf
                                                            @method('put')

                                                            <button type="button" class="btn btn-success waves-effect waves-light" onclick="confirm('{{ __("هل تريد قبول هذا الخبر ؟") }}') ? this.parentElement.submit() : ''">{{ __('قبول') }}</button>

                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        @endforeach

                                    @else

                                        <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <center>
                                                    <h3>لا يوجد أخبار حتي الأن !</h3>
                                                    <a class="btn btn-danger" href="{{ route('admin-news.create')}}">إضافة</a>
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
