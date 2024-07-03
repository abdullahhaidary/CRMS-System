@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="user-add-from.html" class="btn btn-outline-primary btn-light">ایجاد یوزر جدید</a>
    </div>
    <div class="page-heading text-center">
        <h3>جدول تمام یوزر های سیستم</h3>
    </div>
    <!--  Inverse table start -->
    <section class="section">
        <div class="table-responsive">
            <table class="table table-dark mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>تصویر</th>
                    <th>نوم</th>
{{--                    <th>تخلص</th>--}}
                    <th>UserName</th>
                    <th>ایمیل</th>
                    <th>پوزیشن</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><img src="asit/img/RK.jpg" style="height: 30px; width: 30px;" alt=""></td>
                        <td class="text-bold-500">{{$item->name}}</td>

                        <td class="text-bold-500">{{$item->user_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->user_type}}</td>
                        <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                            <a href="criminal-view.html" class="btn btn-info">view</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!--  Inverse table end -->
@endsection
