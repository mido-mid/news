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
                                <h4 class="card-title">الشكاوي و المقترحات</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>الإسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>رقم الهاتف</th>
                                        <th>الشكوي</th>
                                    </tr>
                                    </thead>

                                    @foreach($contacts as $contact)
                                        <tbody>
                                            <tr>
                                                <td><a href="{{route('admin-contacts.show',$contact->id)}}">{{ $contact->name }}</a></td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
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
