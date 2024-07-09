@extends('layout.mian-dashbord')
@section('content')
@foreach($suspects as $suspect)
<div class="page-heading">
    <a href="{{route('people_form')}}" class="btn btn-outline-primary btn-light"> ثبت مظنون جدید  </a>
</div>
<div class="page-heading">
    <h3>افراد مظنون</h3>
</div>
<!--  Inverse table start -->
<section class="section">
    <div class="table-responsive">
        <table class="table table-dark mb-0">
            <thead>

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
            @foreach($suspects as $suspect)
                <tr>
                    <td>{{$suspect->name}}</td>
                    <td>{{$suspect->last_name}}</td>
                    <td>{{$suspect->email}}</td>
                    <td>{{$suspect->phone}}</td>
                    <td>{{$suspect->actual_address}}</td>
                    <td>{{$suspect->current_address}}</td>
                    <th></th>
                    <th><a class="btn btn-sm btn-primary" href="{{url('finger_print_add/'.$suspect->id)}}">اثر انگشت</a>    <a class="btn btn-info btn-sm" href="#">تصحیح</a>   <a class="btn btn-danger btn-sm" href="#">حذف</a></th>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endforeach
@endsection
