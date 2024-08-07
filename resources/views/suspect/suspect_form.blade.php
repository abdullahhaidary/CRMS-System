@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
    <h3 class="mb-2">فورم ثبت مضنون</h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{url('/suspect/form/save/'.$id)}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > اسم متهم</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="suspect_name"
                                                placeholder="اسم متهم "
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="suspect_last_name" class="form-label"
                                            > تخلص متهم</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="last_name"
                                                placeholder="تخلص متهم "
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="suspect_last_name" class="form-label"
                                            >نام پدر متهم</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="father_name"
                                                placeholder="نام پدر متهم "
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > اصلی ادرس </label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="main_address"
                                                placeholder=" ادرس متهم"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label"> نمبر تذکره</label>
                                            <input
                                                type="number"
                                                id="city-column"
                                                class="form-control"
                                                placeholder=" نمبر تذکره"
                                                name="tazcira_number"
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
                                                type="number"
                                                id="country-floating"
                                                class="form-control"
                                                name="phone_number"
                                                placeholder="شماره تماس"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            > ادرس فعلی</label
                                            >
                                            <input
                                                type="text"
                                                id="company-column"
                                                class="form-control"
                                                name="current_address"
                                                placeholder=" ادرس فعلی"
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
                                        <a href="{{route('people')}}"
                                           type="reset"
                                           class="btn btn-light-secondary me-1 mb-1"
                                        >
                                            بازګشت
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
