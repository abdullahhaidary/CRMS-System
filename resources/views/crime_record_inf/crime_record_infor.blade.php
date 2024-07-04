@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>فورم ثبت معلومات </h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('crime_from')}}" method="post" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > توضیحات</label
                                            >
                                            <textarea name="discription" id="discription" class="form-control"  data-parsley-required="true"></textarea>
                                        </div>
                                    </div>

                                    <hr class="mt-0 mb-3">

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
@endsection
