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
            <img src="{{asset('criminal/'. $item->photo)}}" alt="Profile Picture" class="img-fluid">
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
                <span class="details-value">{{$item->gender}}</span>
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

{{--    <style>--}}
{{--        body {--}}
{{--            background-color: #f8f9fa;--}}
{{--            font-family: 'Arial', sans-serif;--}}
{{--        }--}}
{{--        .page-heading {--}}
{{--            margin-top: 20px;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}
{{--        .user-details-container {--}}
{{--            margin-top: 20px;--}}
{{--        }--}}
{{--        .user-details-item {--}}
{{--            margin-bottom: 10px;--}}
{{--        }--}}
{{--        .user-details-label {--}}
{{--            font-weight: bold;--}}
{{--        }--}}
{{--        .user-profile-picture {--}}
{{--            border-radius: 5px;--}}
{{--            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);--}}
{{--            display: block;--}}
{{--            margin: 0 auto 20px auto;--}}
{{--        }--}}
{{--        .finger-print img {--}}
{{--            border: 1px solid #ddd;--}}
{{--            border-radius: 4px;--}}
{{--            padding: 5px;--}}
{{--            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);--}}
{{--            display: block;--}}
{{--            margin: 10px auto;--}}
{{--        }--}}
{{--        .container-fluid {--}}
{{--            padding-left: 50px;--}}
{{--            padding-right: 50px;--}}
{{--        }--}}
{{--    </style>--}}

{{--<div id="main">--}}
{{--    <div class="page-heading text-center">--}}
{{--        <h3>معلومات مکمل یک مجریم</h3>--}}
{{--    </div>--}}

{{--    <!-- Inverse table start -->--}}
{{--    <section class="section">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="Criminal-view">--}}
{{--                <div class="user-details-container row">--}}
{{--                    <div class="col-lg-4 col-md-6">--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">ایدی:</span>--}}
{{--                            <span class="user-details-value">1</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">نوم:</span>--}}
{{--                            <span class="user-details-value"> عبدالولی ارین</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">پلار نوم:</span>--}}
{{--                            <span class="user-details-value">عبدالولی </span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">حالت مدنی:</span>--}}
{{--                            <span class="user-details-value">مجرد پرو</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label"> جنسیت:</span>--}}
{{--                            <span class="user-details-value"> نر</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">عمر:</span>--}}
{{--                            <span class="user-details-value">۲۳</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">وظیفه:</span>--}}
{{--                            <span class="user-details-value">محصل</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">ایمیل:</span>--}}
{{--                            <span class="user-details-value">abdulwaliaryan@gmail.com</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">تلمن :</span>--}}
{{--                            <span class="user-details-value">۰۷۷۳۷۶۷۵۷۰</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label"> آدرس اصلی:</span>--}}
{{--                            <span class="user-details-value">کابل افغانستان شهر نو</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">ادرس فعلی:</span>--}}
{{--                            <span class="user-details-value">غزنی ګیلان</span>--}}
{{--                        </div>--}}
{{--                        <div class="user-details-item">--}}
{{--                            <span class="user-details-label">فامیلی ممبر:</span>--}}
{{--                            <span class="user-details-value">ارین</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-8 col-md-6">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-6 col-md-6">--}}
{{--                                <div class="user-details-item">--}}
{{--                                    <img src="https://via.placeholder.com/300" height="300" width="300" alt="Profile Picture" class="user-profile-picture">--}}
{{--                                </div>--}}
{{--                                <div class="user-details-item">--}}
{{--                                    <span class="user-details-label">تاریخ ثبت:</span>--}}
{{--                                    <span class="user-details-value">2024-05-02 08:45 PM</span>--}}
{{--                                </div>--}}
{{--                                <div class="user-details-item">--}}
{{--                                    <span class="user-details-label">تاریخ جرم:</span>--}}
{{--                                    <span class="user-details-value">2024-05-02 08:45 PM</span>--}}
{{--                                </div>--}}
{{--                                <div class="user-details-item">--}}
{{--                                    <span class="user-details-label">Created At:</span>--}}
{{--                                    <span class="user-details-value">2024-05-01 10:30 AM</span>--}}
{{--                                </div>--}}
{{--                                <div class="user-details-item">--}}
{{--                                    <span class="user-details-label">Updated At:</span>--}}
{{--                                    <span class="user-details-value">2024-05-02 08:45 PM</span>--}}
{{--                                </div>--}}
{{--                                <div class="user-details-item">--}}
{{--                                    <span class="user-details-label">توضیحات:</span>--}}
{{--                                    <span class="user-details-value">راشد خان یو ډیر غټ مجریم ده د ډیرو افغانانو زړونه یی غلا کړی.</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-6 col-md-6">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="user-details-item">--}}
{{--                                            <span class="user-details-label"> اوله:</span>--}}
{{--                                            <div class="finger-print">--}}
{{--                                                <img src="https://via.placeholder.com/100" height="100" width="100" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-details-item">--}}
{{--                                            <span class="user-details-label"> دویم:</span>--}}
{{--                                            <div class="finger-print">--}}
{{--                                                <img src="https://via.placeholder.com/100" height="100" width="100" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-details-item">--}}
{{--                                            <span class="user-details-label"> دریم:</span>--}}
{{--                                            <div class="finger-print">--}}
{{--                                                <img src="https://via.placeholder.com/100" height="100" width="100" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="user-details-item">--}}
{{--                                            <span class="user-details-label"> څلورم:</span>--}}
{{--                                            <div class="finger-print">--}}
{{--                                                <img src="https://via.placeholder.com/100" height="100" width="100" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-details-item">--}}
{{--                                            <span class="user-details-label"> پنځم:</span>--}}
{{--                                            <div class="finger-print">--}}
{{--                                                <img src="https://via.placeholder.com/100" height="100" width="100" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div> <!-- end of user-details-container -->--}}
{{--            </div> <!-- end of Criminal-view -->--}}
{{--        </div> <!-- end of container-fluid -->--}}
{{--    </section>--}}
{{--</div> <!-- end of main -->--}}

@endsection






{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Crime Details</title>--}}
{{--    <!-- Bootstrap CSS -->--}}
{{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <style>--}}
{{--        body {--}}
{{--            background-color: #f8f9fa;--}}
{{--        }--}}
{{--        .crime-details-header {--}}
{{--            background-color: #343a40;--}}
{{--            color: white;--}}
{{--            padding: 20px;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        .crime-summary, .crime-info {--}}
{{--            padding: 20px;--}}
{{--            background-color: #ffffff;--}}
{{--            margin-bottom: 20px;--}}
{{--            border-radius: 5px;--}}
{{--            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}
{{--        .map-section {--}}
{{--            padding: 20px;--}}
{{--            background-color: #ffffff;--}}
{{--            margin-bottom: 20px;--}}
{{--            border-radius: 5px;--}}
{{--            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);--}}
{{--            height: 300px;--}}
{{--        }--}}
{{--        .footer {--}}
{{--            text-align: center;--}}
{{--            padding: 20px;--}}
{{--            background-color: #343a40;--}}
{{--            color: white;--}}
{{--            margin-top: 20px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<!-- Header -->--}}
{{--<div class="crime-details-header">--}}
{{--    <h1>Crime Details</h1>--}}
{{--</div>--}}

{{--<!-- Container for the page content -->--}}
{{--<div class="container mt-4">--}}
{{--    <!-- Crime Summary Section -->--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="crime-summary">--}}
{{--                <h2>Summary</h2>--}}
{{--                <p>--}}
{{--                    This section provides a brief overview of the crime. It includes the type of crime, location, date, and a short description.--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Crime Details Section -->--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="crime-info">--}}
{{--                <h2>Details</h2>--}}
{{--                <table class="table table-striped">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">Field</th>--}}
{{--                        <th scope="col">Information</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>Crime Type</td>--}}
{{--                        <td>Theft</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>Location</td>--}}
{{--                        <td>123 Main Street, Springfield</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>Date & Time</td>--}}
{{--                        <td>July 5, 2024, 2:30 PM</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>Description</td>--}}
{{--                        <td>A theft incident occurred at the specified location...</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>Suspects</td>--}}
{{--                        <td>Unknown</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>Witnesses</td>--}}
{{--                        <td>John Doe, Jane Smith</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>Additional Notes</td>--}}
{{--                        <td>Police are investigating the incident...</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Map Section -->--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="map-section">--}}
{{--                <h2>Location Map</h2>--}}
{{--                <!-- Placeholder for the map, you can embed a real map here -->--}}
{{--                <div id="map" style="height: 100%; background-color: #e9ecef; text-align: center; line-height: 300px;">--}}
{{--                    Map Placeholder--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Footer -->--}}
{{--    <div class="footer">--}}
{{--        <p>&copy; 2024 Crime Report. All Rights Reserved.</p>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- Bootstrap JS and dependencies -->--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
{{--</body>--}}
{{--</html>--}}
