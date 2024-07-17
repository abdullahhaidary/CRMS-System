@extends('layout.mian-dashbord')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .page-heading {
            margin: 20px 0;
            color: #343a40;
        }
        .details-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }
        .details-card img {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .details-label {
            font-weight: bold;
            color: #495057;
        }
        .details-value {
            font-size: 1.1rem;
            color: #212529;
        }
        .details-item {
            margin-bottom: 10px;
        }
        .fingerprint img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            max-width: 100px;
            height: auto;
        }
        .section-title {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #495057;
        }
    </style>

<div class="container">
    @foreach($data as $item)
    <div class="text-center page-heading">
        <div class="nav text-right">
            @can('super_admin')
            <a class="link-item mx-2 btn btn-info" href="{{url('criminal/edit/'.$item->id)}}">Edit</a>
            @endcan
            <a class="link-item btn btn-danger" href="{{url('criminal/delete/'.$item->id)}}">Delete</a>
{{--            <a class="link-item" href="">back</a>--}}
        </div>
        <h1>معلومات مکمل یک مجریم </h1>
        @include('massage')
    </div>
    <div class="row details-card">
        <div class="col-lg-4 col-md-6 mb-4">
            <img src="{{asset('criminal/'.$item->path)}}" alt="Profile Picture" class="img-fluid">
            <div class="details-item">
                <span class="details-label">اسم:</span>
                <span class="details-value">{{$item->criminal_name ." ".$item->last_name}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">اسم پدر:</span>
                <span class="details-value">{{$item->father_name}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">جنسیت</span>
                <span class="details-value">{{$item->gender=1 ? 'male': 'female'}}</span>
            </div>
            <div class="details-item">
                <span class="details-label ">سن:</span>
                <span class="details-value">{{$item->date_of_birth}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">شغل: </span>
                <span class="details-value">{{$item->job}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">caseنمبر: </span>
                <span class="details-value">{{$item->case_number}}</span>
            </div>
            <div class="details-item"><a href="{{url('suspect_list/'.$item->suspect_id)}}">
                <span class="details-label">دیدن معلومات در جدول مضنونی: </span>
                <span class="details-value">{{$item->name}}</span></a>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <h4 class="section-title">معلومات شخصی </h4>

            <div class="details-item">
                <span class="details-label">ایدی:</span>
                <span class="details-value">{{$item->id}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">ایمیل:</span>
                <span class="details-value">{{$item->email}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">تماس:</span>
                <span class="details-value">{{$item->phone}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">ادرس اصلی :</span>
                <span class="details-value">{{$item->actual_address}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">ادرس فعلی :</span>
                <span class="details-value">{{$item->current_address}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">عضو فامیل :</span>
                <span class="details-value">{{$item->family_members}}</span>
            </div>
            <h4 class="section-title mt-4">مشخصات جرم </h4>
            <div class="details-item">
                <span class="details-label"> تاریخ ثبت:</span>
                <span class="details-value">{{$item->created_at}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">تاریخ جرم :</span>
                <span class="details-value">{{$item->arrest_date}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">Created At:</span>
                <span class="details-value">{{$item->created_at}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">Updated At:</span>
                <span class="details-value">{{$item->updated_at}}</span>
            </div>
            <div class="details-item">
                <span class="details-label">توضیحات:</span>
                <span class="details-value">{{$item->marital_status}}</span>
            </div>
        </div>
    </div>

    <div class="row details-card mt-4">
        <div class="col-lg-12">
            <h4 class="section-title">دست راست</h4>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 1">
                    </div>
                    <div class="text-center details-label">First Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 2">
                    </div>
                    <div class="text-center details-label">Second Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 3">
                    </div>
                    <div class="text-center details-label">Third Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 4">
                    </div>
                    <div class="text-center details-label">Fourth Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 5">
                    </div>
                    <div class="text-center details-label">Fifth Fingerprint</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row details-card mt-4">
        <div class="col-lg-12">
            <h4 class="section-title">فینګر دست چپ</h4>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 1">
                    </div>
                    <div class="text-center details-label">First Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 2">
                    </div>
                    <div class="text-center details-label">Second Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 3">
                    </div>
                    <div class="text-center details-label">Third Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 4">
                    </div>
                    <div class="text-center details-label">Fourth Fingerprint</div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3">
                    <div class="fingerprint">
                        <img src="https://via.placeholder.com/100" alt="Fingerprint 5">
                    </div>
                    <div class="text-center details-label">Fifth Fingerprint</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection
