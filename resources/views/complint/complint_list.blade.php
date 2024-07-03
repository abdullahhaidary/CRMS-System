@extends('layout.mian-dashbord')
@section('content')
<div class="page-heading text-center">
    <h3>جدول تمام شکایت های ثبت شده در سیستم</h3>
    @include('massage')
</div>
<!--  Inverse table start -->
<section class="section">
    <div class="table-responsive">
        <table class="table table-dark mb-0">
            <thead>
            <tr>
                <th>شماره</th>
                <th>نوم</th>
                <th> شماره تماس</th>
                <th> نمبر تذکره</th>
                <th>آدرس</th>
                <th>موضوع شکایت</th>
                <th>دلیل شکایت</th>
                <th>تاریخ شکایت</th>
                <th>عریضه</th>
                <th>معلومات متهم</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td class="text-bold-500">{{$item->com_name. " ". $item->lname}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->number_of_tazkira}}</td>
                    <td>{{$item->address}}</td>
                    <td> {{$item->complient_subject}}</td>
                    <td>{{$item->complinet_reson}}</td>
                    <td>{{$item->complinet_date}}</td>
                    <td><a href="">{{$item->complinet_date}}</a></td>

                    <td><a href="">{{   $item->name_criminal. " ". $item->lname_criminal}}</a></td>
                    <td>
                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->
                        <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->
                    </td>
                </tr>
            @endforeach
{{--            <tr>--}}
{{--                <td>۱</td>--}}
{{--                <td class="text-bold-500">احمد ارین</td>--}}
{{--                <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                <td>0547392</td>--}}
{{--                <td>کابل خوشحال خان</td>--}}
{{--                <td>دذی موبایل</td>--}}
{{--                <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                <td>۲۰۲۴/۵/۴</td>--}}
{{--                <td><a href="">عرضه</a></td>--}}
{{--                <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                <td>--}}
{{--                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                    <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>{{$item->id}}</td>--}}
{{--                <td class="text-bold-500">احمد ارین</td>--}}
{{--                <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                <td>0547392</td>--}}
{{--                <td>کابل خوشحال خان</td>--}}
{{--                <td>دذی موبایل</td>--}}
{{--                <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                <td>۲۰۲۴/۵/۴</td>--}}
{{--                <td><a href="">عرضه</a></td>--}}
{{--                <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                <td>--}}
{{--                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                    <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>۱</td>--}}
{{--                <td class="text-bold-500">احمد ارین</td>--}}
{{--                <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                <td>0547392</td>--}}
{{--                <td>کابل خوشحال خان</td>--}}
{{--                <td>دذی موبایل</td>--}}
{{--                <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                <td>۲۰۲۴/۵/۴</td>--}}
{{--                <td><a href="">عرضه</a></td>--}}
{{--                <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                <td>--}}
{{--                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                    <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>۱</td>--}}
{{--                <td class="text-bold-500">احمد ارین</td>--}}
{{--                <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                <td>0547392</td>--}}
{{--                <td>کابل خوشحال خان</td>--}}
{{--                <td>دذی موبایل</td>--}}
{{--                <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                <td>۲۰۲۴/۵/۴</td>--}}
{{--                <td><a href="">عرضه</a></td>--}}
{{--                <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                <td>--}}
{{--                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                    <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>۱</td>--}}
{{--                <td class="text-bold-500">احمد ارین</td>--}}
{{--                <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                <td>0547392</td>--}}
{{--                <td>کابل خوشحال خان</td>--}}
{{--                <td>دذی موبایل</td>--}}
{{--                <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                <td>۲۰۲۴/۵/۴</td>--}}
{{--                <td><a href="">عرضه</a></td>--}}
{{--                <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                <td>--}}
{{--                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                    <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>۱</td>--}}
{{--                <td class="text-bold-500">احمد ارین</td>--}}
{{--                <td>۰۷۷۳۷۶۷۵۷۵۰</td>--}}
{{--                <td>0547392</td>--}}
{{--                <td>کابل خوشحال خان</td>--}}
{{--                <td>دذی موبایل</td>--}}
{{--                <td>بخاطر پیدا کردن موبایل</td>--}}
{{--                <td>۲۰۲۴/۵/۴</td>--}}
{{--                <td><a href="">عرضه</a></td>--}}
{{--                <td><a href="">عبدالوارث ارین</a></td>--}}
{{--                <td>--}}
{{--                    <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>--}}
{{--                    <!-- <a href="#"><i class="fas fa-edit"></i></a> -->--}}
{{--                    <!-- <a href="criminal-view.html" class="btn btn-info btn-light">view</a> -->--}}
{{--                </td>--}}
{{--            </tr>--}}
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
