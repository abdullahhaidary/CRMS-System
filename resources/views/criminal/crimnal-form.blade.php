@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>فورم ایجاد مجریم جدید</h3>
    </div>
    <!-- criminalcontroller from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{route('criminal-from')}}" enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf()
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label"
                                            >نوم</label
                                            >
                                            <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="نوم"
                                                name="name"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label"
                                            >تخلص </label
                                            >
                                            <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="تخلص"
                                                name="lname"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">پلار نوم</label>
                                            <input
                                                type="text"
                                                id="city-column"
                                                class="form-control"
                                                placeholder="پلار نوم"
                                                name="father_name"
                                                data-parsley-restricted-city="Jakarta"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label"
                                            >تلفن</label
                                            >
                                            <input
                                                type="number"
                                                id="country-floating"
                                                class="form-control"
                                                name="phone"
                                                placeholder="شماره تماس"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            >ایمیل آدرس</label
                                            >
                                            <input
                                                type="email"
                                                id="company-column"
                                                class="form-control"
                                                name="email"
                                                placeholder="ایمیل ادرس"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > آدرس اصلی</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="address"
                                                placeholder="آدرس اصلی"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="curent-address" class="form-label"
                                            > آدرس فعلی</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="current_address"
                                                placeholder="آدرس فعلی"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >تصویر</label
                                            >
                                            <input type="file" class="form-control" required id="inputGroupFile01" name="photo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >جنسیت</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="gender" id="disabledSelect">
                                                <option>جنسیت</option>
                                                <option value="1">نر</option>
                                                <option value="2">زن</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >حالت مدنی</label>
                                        <!-- <fieldset class="form-group">
                                            <select class="form-select"  id="disabledSelect">
                                                <option>حالت مدنی</option>
                                                <option>مجرد</option>
                                                <option>متاهل</option>
                                            </select>
                                        </fieldset> -->
                                        <div class="form-check form-check-info">
                                            <input class="form-check-input" type="radio" name="gender" id="info" checked="">
                                            <label class="form-check-label" for="info">
                                                مجرد
                                            </label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <input class="form-check-input" type="radio" name="gender" id="info" checked="">
                                            <label class="form-check-label" for="info">
                                                متاهل
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >  تاریخ تولد</label
                                            >
                                            <input
                                                type="date"
                                                id="email-id-column"
                                                class="form-control"
                                                name="dateofbirth"
                                                placeholder=" تاریخ تولد"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >  تاریخ جرم</label
                                            >
                                            <input
                                                type="date"
                                                id="email-id-column"
                                                class="form-control"
                                                name="arrest_date"
                                                placeholder=" تاریخ جرم"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > عضو فامیل</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="familymember"
                                                placeholder=" عضو فامیل"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > وظیفه</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="job"
                                                placeholder=" وظیفه"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >مظنون</label>
                                        <fieldset class="form-group">
                                            <select class="form-select"  name="suspect" id="disabledSelect">
                                                <option>اتیخاب مضنون</option>
                                            @foreach($data as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
{{--                                                <option value="0">زن</option>--}}
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >case</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="case"  id="disabledSelect">
                                                <option>اتیخاب case</option>
                                            @foreach($case as $item)
                                                    <option value="{{$item->id}}">{{$item->case_number}}</option>
                                                    {{--                                                <option value="0">زن</option>--}}
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > توضیحات</label
                                            >
                                            <textarea name="discription" required id="discription" class="form-control"  data-parsley-required="true"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button
                                            type="reset"
                                            class="btn btn-light-secondary me-1 mb-1"
                                        >
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- criminalcontroller from end -->
@endsection
