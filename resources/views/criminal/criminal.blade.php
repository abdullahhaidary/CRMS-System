@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('criminalcontroller-form')}}" class="btn btn-outline-primary btn-light">ایجاد مجریم جدید</a>
    </div>
    <!--  Inverse table start -->
    <section class="section p-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول تمام مجرمین در سیستم</h3>
                @include('massage')
            </div>
            <div class="card-content">
                <table class="table  mb-0">
                    <thead>
                    <tr>
                        <th>تصویر</th>
                        <th>نوم</th>
                        <th>پلارن نوم</th>
                        <th> فعلی آدرس</th>
                        <th>شماره موبایل</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- Accessing specific properties of the $item object --}}
                        {{-- Uncomment the following lines to display the data in a table --}}
                        @foreach($data as $item)
                            <tr class="mb-1">
                                @php
                                $firstPicture = (is_array($item->picture) && isset($item->picture[0])) ? $item->picture[0] : null;

                                @endphp

                                @if($firstPicture)
                                    <td><img src="{{ asset('criminal/' . $firstPicture->path) }}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                                @else
                                    <td>No picture available</td>
                                @endif
                                <td class="text-bold-500">{{ $item->criminal_name }}</td>
                                <td class="text-bold-500">{{ $item->father_name }}</td>
                                <td>{{ $item->current_address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="m-0 p-0">
                                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->
                                    <a href="{{ url('/criminal/all/' . $item->id) }}" class="btn btn-primary btn-sm">معلومات مکمل</a>
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
