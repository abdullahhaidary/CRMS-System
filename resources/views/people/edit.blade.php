@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>فورم ثبت شکایت جدید</h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        @foreach($data as $item)
                        <div class="card-body">
                            <form class="form" method="post" action="{{url('people/update/'. $item->id)}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
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
                                                name="name"
                                                value="{{$item->name}}"
                                                data-parsley-required="true"
                                                required
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
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="تخلص شکایت کننده"
                                                name="lname"
                                                value="{{$item->last_name}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fname" class="form-label"
                                            > پلارنوم شکایت کننده </label
                                            >
                                            <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="پلارنوم شکایت کننده"
                                                name="fname"
                                                value="{{$item->father_name}}"
                                                data-parsley-required="true"
                                                required
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
                                                name="tazcira_number"
                                                value="{{$item->tazkira_number}}"
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
                                                value="{{$item->phone}}"
                                                placeholder="شماره تماس"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label"
                                            >ایمیل</label
                                            >
                                            <input
                                                type="email"
                                                id="country-floating"
                                                class="form-control"
                                                name="email"
                                                value="{{$item->email}}"
                                                placeholder="ایمیل"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            > آدرس</label
                                            >
                                            <input
                                                type="text"
                                                id="company-column"
                                                class="form-control"
                                                name="address"
                                                value="{{$item->actual_address}}"
                                                placeholder=" ادرس"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > ادرس فعلی</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="curent_address"
                                                value="{{$item->current_address}}"
                                                placeholder="  ادرس فعلی"
                                                data-parsley-required="true"
                                                required
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
                                                name="creime_subject"
                                                value="{{$item->subject_crim}}"
                                                placeholder=" موضوع شکایت"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >case جرمی</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="crime_case"
                                                value="{{$item->crime_case}}"
                                                placeholder="کیس جرمی"
                                                data-parsley-required="true"
                                                required
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
                                                name="crime_date"
                                                value="{{$item->crim_date}}"
                                                placeholder=" تاریخ شکایت"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >عریضه</label
                                            >
                                            <input type="file" name="ariza_file" class="form-control" id="inputGroupFile01">
                                            <p class="text-danger"> د عریضی د تغیر لپاره نوی عریضه اضافی کړی!</p>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

