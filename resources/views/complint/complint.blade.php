@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading">
        <a href="{{route('complint_list')}}" class="btn btn-outline-primary btn-light"> لیست تمام شکایت ها </a>
    </div>
    <div class="page-heading text-center">
        <h3>فورم ثبت شکایت جدید</h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('complint-from')}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf()
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label"
                                            >اسم شکایت کننده</label
                                            >
                                            <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="نوم"
                                                name="comname"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label"
                                            > تخلص شکایت کننده </label
                                            >
                                            <input
                                                type="text"
                                                id="comlname"
                                                class="form-control"
                                                placeholder="تخلص"
                                                name="comlname"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label"
                                            > اسم پدر شکایت کننده </label
                                            >
                                            <input
                                                type="text"
                                                id="father_name"
                                                class="form-control"
                                                placeholder="اسم پدر"
                                                name="father_name"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label"> نمبر تذکره</label>
                                            <input
                                                type="text"
                                                id="city-column"
                                                class="form-control"
                                                placeholder=" نمبر تذکره"
                                                name="tazkira"
                                                data-parsley-restricted-city="Jakarta"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label"
                                            >تلفن</label
                                            >
                                            <input
                                                type="text"
                                                id="country-floating"
                                                class="form-control"
                                                name="phone"
                                                placeholder="شماره تماس"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label"
                                            >ایمیل آدرس</label
                                            >
                                            <input
                                                type="text"
                                                id="email"
                                                class="form-control"
                                                name="email"
                                                placeholder="ایمیل آدرس"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            >آدرس فعلی</label
                                            >
                                            <input
                                                type="text"
                                                id="company-column"
                                                class="form-control"
                                                name="current_address"
                                                placeholder="آدرس فعلی"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            >آدرس اصلی</label
                                            >
                                            <input
                                                type="text"
                                                id="actual_address"
                                                class="form-control"
                                                name="actual_address"
                                                placeholder=" آدرس اصلی"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >موضوع شکایت </label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="com_subject"
                                                placeholder=" موضوع شکایت"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >  دلیل شکایت</label
                                            >
                                            <input
                                                type="text"
                                                id="com-rison"
                                                class="form-control"
                                                name="com_rison"
                                                placeholder=" دلیل شکایت"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >  تاریخ شکایت</label
                                            >
                                            <input
                                                type="date"
                                                id="email-id-column"
                                                class="form-control"
                                                name="com_date"
                                                placeholder=" تاریخ شکایت"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >عریضه</label
                                            >
                                            <input type="file" name="ariza" class="form-control" id="inputGroupFile01">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > توضیحات</label
                                            >
                                            <textarea name="discription" id="discription" class="form-control"  data-parsley-required="true"></textarea>
                                        </div>
                                    </div>

                                    <hr class="mt-0 mb-3">


                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > اسم متهم</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="criminal_name"
                                                placeholder="اسم متهم "
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > تخلص متهم</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="criminal_lname"
                                                placeholder="تخلص متهم "
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >  ادرس </label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="criminal_address"
                                                placeholder=" ادرس متهم"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label"
                                            >تلفن</label
                                            >
                                            <input
                                                type="text"
                                                id="country-floating"
                                                class="form-control"
                                                name="cphone"
                                                placeholder="شماره تماس"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            ثبت شکایت
                                        </button>
                                        <button
                                            type="reset"
                                            class="btn btn-light-secondary me-1 mb-1"
                                        >
                                            بازګشت
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
    <!-- criminal from end -->
@endsection
