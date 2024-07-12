@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-5">
        <h2>  لسیت Cases یک فرد مشخص</h2>
        @include('massage')
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr class="bg-info">
                    <th scope="col">#</th>
{{--                    <th scope="col">case name</th>--}}
                    <th scope="col">crime Type</th>
                    <th scope="col">status</th>
                    <th scope="col">crime location </th>
                    <th scope="col">case Number</th>
                    <th scope="col">Start date</th>
                    <th scope="col">end date</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
{{--                        <td>{{$item->case_name}}</td>--}}
                        <td>{{$item->crime_type}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->crime_location}}</td>
                        <td>{{$item->case_number}}</td>
                        <td style="width: 95px">{{$item->start_date}}</td>
                        <td style="width: 95px">{{$item->end_date}}</td>
                        <td>{{$item->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

