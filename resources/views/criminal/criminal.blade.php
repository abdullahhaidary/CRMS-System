@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('criminalcontroller-form')}}" class="btn btn-outline-primary btn-light">{{__('New_criminal_creation_form')}}</a>
    </div>
    <!--  Inverse table start -->
    <section class="section p-2">
        <div class="card">
            <div class="card-header">
                <!-- جدول تمام مجرمین در سیستم -->
                <h3 class="card-title text-center">{{__('Table_all_criminals_in_system')}}</h3>
                @include('massage')
            </div>
            <div class="card-content">
                <table class="table  mb-0">
                    <thead>
                    <tr class="active">
                        <th>{{__('Picture')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Father_name')}}</th>
                        <th>{{__('Current_address')}}</th>
                        <th>{{__('Phone_number')}}</th>
                        <th>{{__('Create_by')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                        {{-- Accessing specific properties of the $item object --}}
                        {{-- Uncomment the following lines to display the data in a table --}}
                        @foreach($data as $item)
                            <tr class="mb-1">
{{--                                @php--}}
//                                $firstPicture = (is_array($item->picture) && isset($item->picture[0])) ? $item->picture[0] : null;
{{--                                @endphp--}}
{{--                                @if($firstPicture)--}}
                                    <td><img src="{{asset('criminal/'.$item->photo)}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
{{--                                   --}}
                                <td class="text-bold-500">{{ $item->criminal_name }}</td>
                                <td class="text-bold-500">{{ $item->father_name }}</td>
                                <td>{{ $item->current_address }}</td>
                                <td>{{ $item->phone}}</td>
                                <td>{{ $item->Created_by}}</td>
                                <td class="m-0 p-0">

                                    <a href="{{ url('/criminal/all/' . $item->id) }}" class="btn btn-primary btn-sm">{{__('Full_info')}}</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--  Inverse table end -->
    <div class="mt-3">
        <nav aria-label="Page navigation example">
             {{$data->links()}}
        </nav>
    </div>
@endsection
