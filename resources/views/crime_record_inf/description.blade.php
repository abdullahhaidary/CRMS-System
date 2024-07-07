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
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
