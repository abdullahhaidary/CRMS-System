@extends('layout.mian-dashbord')
@section('content')

    <div class="page-heading text-center">
        <h3>{{__('New_case_registration_form')}}</h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card" >
                    <div class="card-content">
                        @foreach($case as $item)
                        <div class="card-body">
                            <form class="form" method="post" action="{{url('case/update/'.$item->id)}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="row" >
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label"
                                            >{{__('Case_number')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="last-name-column"
                                                class="form-control"
                                                placeholder="{{__('Case_number')}}"
                                                name="case_number"
                                                value="{{$item->case_number}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Crime_location')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="crime_location"
                                                placeholder="{{__('Crime_location')}}"
                                                data-parsley-required="true"
                                                value="{{$item->crime_location}}"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            >{{__('Start_date')}}</label
                                            >
                                            <input
                                                type="date"
                                                id="company-column"
                                                class="form-control"
                                                name="start_date"
                                                placeholder="{{__('Start_date')}}"
                                                data-parsley-required="true"
                                                required
                                                value="{{$item->start_date}}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('End_date')}}</label
                                            >
                                            <input
                                                type="date"
                                                id="email-id-column"
                                                class="form-control"
                                                name="end_date"
                                                placeholder="{{__('End_date')}}"
                                                data-parsley-required="true"
                                                value="{{$item->end_date}}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Case_status')}}</label
                                            >
                                            <select name="case_status" class="form-control" id="">
                                                @if($item->crime_type==1)
                                                <option selected value="{{1}}">در حال برسی</option>
                                                @else
                                                <option value="{{0}}">محکمه شده</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Crime_type')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="crime_type"
                                                placeholder="{{__('Crime_type')}}"
                                                value="{{$item->crime_type}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <input
                                            type="hidden"
                                            value="{{$item->id}}"
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
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label"
                                        >{{__('Description')}}</label
                                        >
                                        <textarea name="description" id="discription" class="form-control"></textarea>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    {{__('Save')}}
                                </button>
                                <a href=""
                                   type="reset"
                                   class="btn btn-light-secondary me-1 mb-1"
                                >
                                    {{__('Coming_back')}}
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
