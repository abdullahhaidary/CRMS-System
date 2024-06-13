@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="criminal-form.html" class="btn btn-outline-primary btn-light">ایجاد مجریم جدید</a>
    </div>
    <div class="page-heading text-center">
        <h3>جدول تمام مجرمین در سیستم</h3>
    </div>
    <!--  Inverse table start -->
    <section class="section">
        <div class="table-responsive">
            <table class="table  mb-0">
                <thead>
                <tr>
                    <th>تصویر</th>
                    <th>نوم</th>
                    <th>پلارن نوم</th>
                    <th>آدرس</th>
                    <th>شماره موبایل</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" alt=""></td>
                    <td class="text-bold-500">احمد</td>
                    <td class="text-bold-500">عبدالولی</td>
                    <td>کابل خوشحال خان</td>
                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                    <td>
                        <a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                        <!-- <a href="#"><i class="fas fa-edit"></i></a> -->
                        <a href="criminal-view.html" class="btn btn-info btn-light">view</a>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" alt=""></td>
                    <td class="text-bold-500">احمد</td>
                    <td class="text-bold-500">عبدالولی</td>
                    <td>کابل خوشحال خان</td>
                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                    <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" alt=""></td>
                    <td class="text-bold-500">احمد</td>
                    <td class="text-bold-500">عبدالولی</td>
                    <td>کابل خوشحال خان</td>
                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                    <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" alt=""></td>
                    <td class="text-bold-500">احمد</td>
                    <td class="text-bold-500">عبدالولی</td>
                    <td>کابل خوشحال خان</td>
                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                    <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" alt=""></td>
                    <td class="text-bold-500">احمد</td>
                    <td class="text-bold-500">عبدالولی</td>
                    <td>کابل خوشحال خان</td>
                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                    <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                    </td>
                </tr>
                <tr>
                    <td><img src="{{@asset('dist2/img/RK.jpg')}}" style="height: 30px; width: 30px;" alt=""></td>
                    <td class="text-bold-500">احمد</td>
                    <td class="text-bold-500">عبدالولی</td>
                    <td>کابل خوشحال خان</td>
                    <td>۰۷۷۳۷۶۷۵۷۵۰</td>
                    <td><a href="#"><i class="badge-circle font-medium-1" data-feather="mail"></i></a>
                    </td>
                </tr>
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
