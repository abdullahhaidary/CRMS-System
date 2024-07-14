@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('people_form')}}" class="btn btn-outline-primary btn-light"> ثبت شکایت  </a>
    </div>
{{--    @include('search')--}}
    <div class="page-heading text-center">
        <h3>جدول تمام افراد شکایت کننده ها</h3>
    </div>
    <!--  Inverse table start -->
    <section class="section">
        <div class="table-responsive">
            <table class="table table-dark mb-0">
                <thead>

                <tr>
                    <th>شماره</th>
                    <th>نوم</th>
                    <th> پلار نوم</th>
                    <th>ایمیل</th>
                    <th> شماره تماس</th>
                    <th> نمبر تذکره</th>
                    <th>آدرس</th>
                    <th> ادرس فعلی</th>
                    <th> case</th>
                    <th>تاریخ شکایت</th>
                    <th>موضوع شکایت</th>
                    <th>عریضه</th>
                    <th>توضیحات</th>
                    <th>دیدن مظنونین</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td class="text-bold-500">{{$item->name." ". $item->last_name}}</td>
                        <td>{{$item->father_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->tazkira_number}} </td>
                        <td>{{$item->actual_address}}</td>
                        <td>{{$item->current_address}}</td>
                        <td>{{$item->crime_case}}</td>
                        <td>{{$item->crim_date}}</td>
                        <td>{{$item->subject_crim}}</td>
                        <td><a href="{{url('ariza/arizafile')}}">عریضه</a></td>
                        <td><a href="{{url('crime/info/'.$item->id)}}">توضیحات</a></td>
                        <td><a href="{{url('suspect_list/'.$item->id)}}">لیست مظنونین</a></td>
                        <td>
                            <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                            <!-- <a href="#"><i class="fas fa-edit"></i></a> -->
                            <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->
                        </td>
                    </tr>
                @endforeach

{{--                <tr>--}}
{{--                    <td>۱</td>--}}
{{--                    <td class="text-bold-500">احمد ارین</td>--}}
{{--                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                    <td>0547392</td>--}}
{{--                    <td>کابل خوشحال خان</td>--}}
{{--                    <td>دذی موبایل</td>--}}
{{--                    <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                    <td>۲۰۲۴/۵/۴</td>--}}
{{--                    <td><a href="">عرضه</a></td>--}}
{{--                    <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                    <td>--}}
{{--                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                        <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>۱</td>--}}
{{--                    <td class="text-bold-500">احمد ارین</td>--}}
{{--                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                    <td>0547392</td>--}}
{{--                    <td>کابل خوشحال خان</td>--}}
{{--                    <td>دذی موبایل</td>--}}
{{--                    <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                    <td>۲۰۲۴/۵/۴</td>--}}
{{--                    <td><a href="">عرضه</a></td>--}}
{{--                    <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                    <td>--}}
{{--                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                        <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>۱</td>--}}
{{--                    <td class="text-bold-500">احمد ارین</td>--}}
{{--                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                    <td>0547392</td>--}}
{{--                    <td>کابل خوشحال خان</td>--}}
{{--                    <td>دذی موبایل</td>--}}
{{--                    <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                    <td>۲۰۲۴/۵/۴</td>--}}
{{--                    <td><a href="">عرضه</a></td>--}}
{{--                    <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                    <td>--}}
{{--                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                        <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>۱</td>--}}
{{--                    <td class="text-bold-500">احمد ارین</td>--}}
{{--                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                    <td>0547392</td>--}}
{{--                    <td>کابل خوشحال خان</td>--}}
{{--                    <td>دذی موبایل</td>--}}
{{--                    <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                    <td>۲۰۲۴/۵/۴</td>--}}
{{--                    <td><a href="">عرضه</a></td>--}}
{{--                    <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                    <td>--}}
{{--                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                        <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>۱</td>--}}
{{--                    <td class="text-bold-500">احمد ارین</td>--}}
{{--                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                    <td>0547392</td>--}}
{{--                    <td>کابل خوشحال خان</td>--}}
{{--                    <td>دذی موبایل</td>--}}
{{--                    <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                    <td>۲۰۲۴/۵/۴</td>--}}
{{--                    <td><a href="">عرضه</a></td>--}}
{{--                    <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                    <td>--}}
{{--                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                        <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                    </td>--}}
{{--                </tr>--}}
                </tbody>
            </table>
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
