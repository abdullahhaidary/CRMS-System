@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-5">
        <h2>Responsive Table Example</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">case</th>
                    <th scope="col">تاریخ ثبت</th>
                    <th>ثبت فنگر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td style="width: 10%">{{$item->name}}</td>
                    <td style="width: 60%">{{$item->description}}</td>
                    <td><a href="{{url('case/form/'.$item->id)}}">case</a></td>
                    <td>{{$item->created_at}}</td>
                    {{-- <td><a href="{{route('finger_add')}}"></a></td> --}}
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>

    <div class="container">
        <div class="mb-3 mt-2">
            <a href="" class="btn btn-primary">ثبت معلومات مضنون</a>
        </div>
        <h2>معلومات یک مضنون</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم</th>
                    <th scope="col"> اسمپ پدر</th>
                    <th scope="col">تلفن</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">ادرس اصلی</th>
                    <th scope="col">ادرس فعلی</th>
                    <th scope="col">تاریخ ثبت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td><a href="{{url('case/form/'.$item->id)}}">case</a></td>
                        <td>{{$item->created_at}}</td>
                        <td><a href="{{url('case/form/'.$item->id)}}">case</a></td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
