@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-3 ">
        <h2 class="text-center mb-5">{{__('Cases_of_a_persons_history')}}</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr class="" style="background-color: rgba(136,180,156,0.28)">
                    <th scope="col">#</th>
                    <th scope="col">{{__('Case_type')}}</th>
                    <th scope="col">{{__('Status')}}</th>
                    <th scope="col">{{__('Crime_location')}}</th>
                    <th scope="col">{{__('Case_number')}}</th>
                    <th scope="col">{{__('Start_date')}}</th>
                    <th scope="col">{{__('End_date')}}</th>
                    <th scope="col">{{__('Description')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->crime_type}}</td>
                        <td>{{$item->status==1 ? "درحال برسی" : "محاکمه شده"}}</td>
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
    <div class="mt-3">
        <nav aria-label="Page navigation example">
             {{$data->links()}}
        </nav>
    </div>
@endsection

