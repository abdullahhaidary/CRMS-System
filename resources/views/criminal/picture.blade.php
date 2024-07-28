@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>{{__('New_criminal_creation_form')}}</h3>
    </div>
    <!-- criminalcontroller from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{url('criminal/picture/'.$id)}}" enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf()
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Picture')}} 1</label
                                            >
                                            <input type="file" class="form-control"  id="inputGroupFile01" name="photo1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Picture')}} 2</label
                                            >
                                            <input type="file" class="form-control"  id="inputGroupFile01" name="photo2">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Picture')}} 3</label
                                            >
                                            <input type="file" class="form-control"  id="inputGroupFile01" name="photo3">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Picture')}} 4</label
                                            >
                                            <input type="file" class="form-control"  id="inputGroupFile01" name="photo4">
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
