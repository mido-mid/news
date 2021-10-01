@extends('layouts.admin_layout')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12" style="margin-bottom: 20px;">
                        <button style="float: right" type="button" class="btn btn-primary waves-effect waves-light" onclick="window.location.href='{{route('admins.create')}}'">إضافة مشرف</button>
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
                            <div class="card-body">
                                <h4 class="card-title">المشرفون</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>الإسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>النوع</th>
                                        <th>أدوات التحكم</th>
                                    </tr>
                                    </thead>

                                    @foreach($admins as $admin)
                                        <tbody>
                                        <tr>
                                            <td><a href="{{ route("admins.show", $admin->id) }}" class="text-dark">{{ $admin->name }}</a></td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->type }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="drop-down-button">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <form action="{{ route('admins.destroy', $admin->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("هل تريد حذف هذا المشرف؟") }}') ? this.parentElement.submit() : ''">حذف</button>
                                                        </form>
                                                        <a class="dropdown-item" href="{{ route('admins.edit', $admin->id) }}">تعديل</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
    </div>
@endsection
