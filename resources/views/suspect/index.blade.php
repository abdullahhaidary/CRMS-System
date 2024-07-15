@extends('layout.mian-dashbord')
@section('content')

<div class="page-heading">
    <a href="{{url('/suspect/form/')}}" class="btn btn-outline-primary btn-light"> ثبت مظنون جدید  </a>
</div>
<div class="page-heading">
    <h3>افراد مظنون</h3>
</div>
<!--  Inverse table start -->
<section class="section">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            @foreach($suspects as $suspect)
            <tr>
                <th>نوم</th>
                <th> تخلص</th>
                <th>ایمیل</th>
                <th> شماره تماس</th>
                <th>آدرس اصلی</th>
                <th> ادرس فعلی</th>
                <th></th>
            </tr>
            </thead>
            <tbody>


                <tr>
                    <td>{{$suspect->name}}</td>
                    <td>{{$suspect->last_name}}</td>
                    <td>{{$suspect->email}}</td>
                    <td>{{$suspect->phone}}</td>
                    <td>{{$suspect->actual_address}}</td>
                    <td>{{$suspect->current_address}}</td>
                    <th></th>
                    <th><a class="btn btn-sm btn-primary" href="{{url('finger_print_add/'.$suspect->id)}}">اثر انگشت</a>
                        @can('super_admin')
                        <a class="btn btn-info btn-sm" href="{{url('suspect/edit/'.$suspect->id)}}">تصحیح</a>
                        <a class="btn btn-danger btn-sm" href="{{url('/suspect/delete/'.$suspect->id)}}">حذف</a></th>
                    @endcan
                </tr>

            </tbody>
        </table>
    </div>
</section>
@endforeach
@endsection
