@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>فورم تغیر معلومات مضنون</h3>
    </div>
    @foreach($data as $item)
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <h3 class="mb-2">فورم ثبت مضنون</h3>
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
                                                value="{{$item->name}}"
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
                                                value="{{$item->last_name}}"
                                                placeholder="تخلص متهم "
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Email</label>
                                            <input
                                                type="email"
                                                id="city-column"
                                                class="form-control"
                                                placeholder=" نمبر تذکره"
                                                name="email"
                                                value="{{$item->email}}"
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
                                                value="{{$item->phone}}"
                                                placeholder="شماره تماس"
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
                                                name="main_address"
                                                value="{{$item->actual_address}}"
                                                placeholder=" ادرس متهم"
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
                                                name="suspect_email"
                                                value="{{$item->current_address}}"
                                                placeholder=""
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
                @endforeach
            </div>
        </div>
    </section>


@endsection
