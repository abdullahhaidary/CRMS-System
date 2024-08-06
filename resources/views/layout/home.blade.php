@extends('layout.mian-dashbord')
@php

if (!function_exists('trim_to_words')) {
    function trim_to_words($text, $limit = 20)
    {
        $words = explode(' ', $text);
        if (count($words) > $limit) {
            return implode(' ', array_slice($words, 4, $limit)) . '...';
        }
        return $text;
    }
}

@endphp
@section('content')
    <div class="page-heading">
        <h3>{{__('database_statistics')}}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="fa fa-floppy-disk"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">مجموعه شکایات</h6>
                                        <h6 class="font-extrabold mb-0">{{$total_crime_record}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa fa-receipt"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">مجموعه مجرمین</h6>
                                        <h6 class="font-extrabold mb-0">{{$total_criminal_record}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="fa fa-mask"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">زندانی ها</h6>
                                        <h6 class="font-extrabold mb-0">80.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa fa-file"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">دوسیه زیر فروسیس</h6>
                                        <h6 class="font-extrabold mb-0">{{$total_cases_record}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>قضیه های ثبت شده</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-6 h-100">
                        <div class="card">
                            <div class="card-header">
                                <h4>قضیه ها</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                 style="width:10px">
                                                <use
                                                    xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">جرم ها</h5>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-0 text-end">862</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-europe"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-7">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                 style="width:10px">
                                                <use
                                                    xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Indonesia</h5>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-0 text-end">1025</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-indonesia"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 h-100">
                        <div class="card">
                            <div class="card-header">
                                <h4>تازه ترین قضیه ها</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                        <tr>
                                            <th>اسم مجرم</th>
                                            <th>نوعیت قضیه</th>
                                            <th>توضیحات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($three_criminals as $criminal)
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="{{asset('dist2/img/RK.jpg')}}">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">{{$criminal->criminal_name}}</p>
                                                </div>
                                            </td>
                                            <td class="col-3">
                                                <p class=" mb-0">{{$criminal->case->crime_type}}</p>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"> {{$criminal->case->description}}</p>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                   <tr class="">
                       <th>شماره</th>
                       <th>ولایت</th>
                       <th>تعداد شکایات امروز</th>
                       <th>تعداد شکایات ماه گذشته</th>
                       <th>تعداد قضیه های ثبت شده امروز</th>
                       <th>تعداد قضیه های ثبت شده ماه گذشته</th>
                       <th></th>
                   </tr>
                </thead>
{{--                @foreach($total_provinces as $province)--}}
                <tr>
{{--                    <td>{{$province->id}}</td>--}}
{{--                    <td>{{$province->name}}</td>--}}
                    <td>شماره</td>
                    <td>کابل</td>
                     <td>{{$complaintsToday}}</td>
                     <td>{{$complaintsLastMonth}}</td>
                     <td>{{$casesToday}}</td>
                     <td>{{$casesLastMonth}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
{{--                @endforeach--}}
            </table>
        </section>
    </div>
{{--    @can('admin')--}}
{{--        <h1>Yup I am an admin</h1>--}}
{{--    @endcan--}}

{{--    <footer>--}}
{{--        <div class="footer clearfix mb-0 text-muted">--}}
{{--            <div class="float-end">--}}
{{--                <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>--}}
{{--                    by <a href="https://saugi.me">Saugi</a></p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
@endsection
