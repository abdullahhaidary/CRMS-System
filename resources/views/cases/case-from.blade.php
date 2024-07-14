@extends('layout.mian-dashbord')
@section('content')
    <div class="">
        <a class="btn btn-primary" href="{{url('case/'. $id)}}">case موجود</a>
    </div>
    <div class="page-heading text-center">
        <h3>فورم ثبت case جدید</h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card" style="background-color: #edf0f3">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('case-store')}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="row" >
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label"
                                            > caseName</label
                                            >
                                            <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="case_name"
                                                name="case_name"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label"
                                            > case Number </label
                                            >
                                            <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="Enter case number"
                                                name="case_number"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            > StartDate</label
                                            >
                                            <input
                                                type="date"
                                                id="company-column"
                                                class="form-control"
                                                name="start_date"
                                                placeholder=" start date"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >  End Date</label
                                            >
                                            <input
                                                type="date"
                                                id="email-id-column"
                                                class="form-control"
                                                name="end_date"
                                                placeholder="end date"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > crime location </label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="crime_location"
                                                placeholder=" crime location"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >case status</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="case_status"
                                                placeholder=" case status"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > crime type </label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="crime_type"
                                                placeholder="crime type"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
{{--                                        <div class="form-group mandatory">--}}
{{--                                            <label for="email-id-column" class="form-label"--}}
{{--                                            > crime name </label--}}
{{--                                            >--}}
                                            <input
                                                type="hidden"
                                                value="{{$id}}"
                                                id="email-id-column"
                                                class="form-control"
                                                name="crime_record_id"
                                                placeholder="crime name"
                                                data-parsley-required="true"

                                            />
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-3">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > توضیحات</label
                                            >
                                            <textarea name="description" required id="discription" class="form-control"  data-parsley-required="true"></textarea>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            ثبت شکایت
                                        </button>
                                        <a href=""
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
