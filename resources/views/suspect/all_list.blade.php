@extends('layout.mian-dashbord')
@section('content')
   <div class="row">
       <div class="page-heading mt-5 text-center">
               <h3>{{__('Suspect_list')}}</h3>
           </div></div>

    @include('massage')
    <!--  Inverse table start -->
    <section class="section">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Last_name')}}</th>
                    <th>{{__('Father_name')}}</th>
                    <th>{{__('ID_number')}}</th>
                    <th>{{__('Phone_number')}}</th>
                    <th>{{__('Main_address')}}</th>
                    <th>{{__('Current_address')}}</th>
                    <th>{{__('Status')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($suspects as $suspect)
                    <tr>
                        <td>{{$suspect->name}}</td>
                        <td>{{$suspect->last_name}}</td>
                        <td>{{$suspect->father_name}}</td>
                        <td>{{$suspect->tazcira_number}}</td>
                        <td>{{$suspect->phone}}</td>
                        <td>{{$suspect->actual_address}}</td>
                        <td>{{$suspect->current_address}}</td>
                        @if($suspect->isCriminal==0)
                                <td style="color: #ffc604;">مظنون</td>
                        @elseif($suspect->isCriminal==1)
                        <td  style="color: #02f602;">فرد عادی</td>
                            @elseif($suspect->isCriminal==2)
                                <td  style="color: red;">مجریم</td>
                        @endif
                        <th>
                            @can('super_admin')
                                <a class="btn btn-info btn-sm" href="{{url('suspect/edit/'.$suspect->id)}}">تصحیح</a>
                                <a class="btn btn-danger btn-sm" href="{{url('/suspect/delete/'.$suspect->id)}}">حذف</a>
                        </th>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <nav aria-label="Page navigation example">
                <div class="mt-3">
                    <nav aria-label="Page navigation example">
                        {{$suspects->links()}}
                    </nav>
                </div>
            </nav>
        </div>
    </section>

@endsection
