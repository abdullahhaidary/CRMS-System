@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-5">
        <h2>Responsive Table Example</h2>
        @include('massage')
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
                    <td style="width: 50%">{{$item->description}}</td>
                    <td><a href="{{url('case/form/'.$item->id)}}">case</a></td>
                    <td>{{$item->created_at}}</td>
                    <td></td>
{{--                     <td><a href="{{route('finger_add')}}"></a></td>--}}
                    <td>
                    @can('super_admin')
                            <a href="{{url('crime/info/edit/'.$item->id)}}" class="p-2 ml-1"><i class="bi bi-pencil"></i></a>
                            <a href="{{url('crime/info/delete/'.$item->id)}}" class="p-2"><i class="bi bi-trash" style="color: red"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
