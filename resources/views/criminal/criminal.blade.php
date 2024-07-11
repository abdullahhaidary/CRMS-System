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
                    @foreach($data as $item)
                    <tr class="mb-1">
                        <td><img src="{{asset('criminal/'. $item->photo)}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                        <td class="text-bold-500">{{$item->criminal_name}}</td>
                        <td class="text-bold-500">{{$item->father_name}}</td>
                        <td>{{$item->current_address}}</td>
                        <td>{{$item->phone}}</td>
                        <td class="m-0 p-0">
                            <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                            <!-- <a href="#"><i class="fas fa-edit"></i></a> -->
                            <a href="{{url('/criminal/all/'. $item->id)}}" class="btn btn-primary btn-sm">معلومات مکمل</a>
                        </td>
                    </tr>
                    @endforeach
{{--                    <tr class="mb-1">--}}
{{--                        <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>--}}
{{--                        <td class="text-bold-500">احمد</td>--}}
{{--                        <td class="text-bold-500">عبدالولی</td>--}}
{{--                        <td>کابل خوشحال خان</td>--}}
{{--                        <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                        <td class="m-0 p-0">--}}
{{--                            <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                            <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                            <a href="{{route('criminal_all')}}" class="btn btn-primary btn-sm">معلومات مکمل</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

                    {{-- <tr>
                        <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                        <td class="text-bold-500">احمد</td>
                        <td class="text-bold-500">عبدالولی</td>
                        <td>کابل خوشحال خان</td>
                        <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                        <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                        <td class="text-bold-500">احمد</td>
                        <td class="text-bold-500">عبدالولی</td>
                        <td>کابل خوشحال خان</td>
                        <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                        <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                        <td class="text-bold-500">احمد</td>
                        <td class="text-bold-500">عبدالولی</td>
                        <td>کابل خوشحال خان</td>
                        <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                        <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                        <td class="text-bold-500">احمد</td>
                        <td class="text-bold-500">عبدالولی</td>
                        <td>کابل خوشحال خان</td>
                        <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                        <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" class="rounded-5" alt=""></td>
                        <td class="text-bold-500">احمد</td>
                        <td class="text-bold-500">عبدالولی</td>
                        <td>کابل خوشحال خان</td>
                        <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                        <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        </td>
                    </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!--  Inverse table end -->
    <div class="mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-primary">
                <li class="page-item"><a class="page-link" href="#">قبلی</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item "><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
            </ul>
        </nav>
    </div>
@endsection
