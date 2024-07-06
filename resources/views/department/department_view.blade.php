@extends('layout.mian-dashbord')
@section('content')
    <div class="">
        <a class="btn btn-primary" href="{{route('department_form')}}">ثبت دیپارتمنت جدید</a>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Department List</h2>
        @include('massage')
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم دیپارتمنت </th>
                    <th scope="col">عنوان دیپارتمنت</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->head}}</td>
                    <td>{{$item->short_description}}</td>
                    <td><a href="">Edit</a></td>
                </tr>
                @endforeach
{{--                <tr>--}}
{{--                    <th scope="row">2</th>--}}
{{--                    <td>Engineering</td>--}}
{{--                    <td>John Smith</td>--}}
{{--                    <td>40</td>--}}
{{--                    <td>Building B</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="row">3</th>--}}
{{--                    <td>Marketing</td>--}}
{{--                    <td>Emily Johnson</td>--}}
{{--                    <td>10</td>--}}
{{--                    <td>Building C</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="row">4</th>--}}
{{--                    <td>Sales</td>--}}
{{--                    <td>Robert Brown</td>--}}
{{--                    <td>25</td>--}}
{{--                    <td>Building D</td>--}}
{{--                </tr>--}}
                </tbody>
            </table>
        </div>
    </div>

@endsection
