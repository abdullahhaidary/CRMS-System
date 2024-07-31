@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">لیست توضیحات یک فرد شکایت کننده</h2>
        @include('massage')
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Description')}}</th>
                    <th scope="col">{{__('Case')}}</th>
                    <th scope="col">تاریخ ثبت</th>
                    <th>ثبت فنگر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td style="width: 10%">{{$item->name." ". $item->last_name}}</td>
                    <td style="width: 50%">{{$item->description}}</td>
                    <td><a href="{{url('case/form/'.$item->id)}}">{{__('Case')}}</a></td>
                    <td>{{$item->created_at}}</td>
                    <td></td>
{{--                     <td><a href="{{route('finger_print_add')}}"></a></td>--}}
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
