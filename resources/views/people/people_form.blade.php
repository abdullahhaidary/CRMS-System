@extends('layout.mian-dashbord')
@section('content')
<div class="page-heading text-center">

<!-- فورم ثبت شکایت جدید -->
    <h3>{{__('New_complaint_registration_form')}}</h3>
</div>
<!-- criminal from start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('people-store')}}" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group  ">
                                        <label for="first-name-column" class="form-label"
                                        >{{__('Complainants_name')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="first-name-column"
                                            class="form-control"
                                            placeholder="{{__('Enter_the_name')}} "
                                            name="name"
                                            data-parsley-required="true"
                                        />
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column" class="form-label"
                                        >{{__('Last_name')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="last-name-column"
                                            class="form-control"
                                            placeholder="{{__('Enter_last_name')}}"
                                            name="lname"
                                            data-parsley-required="true"

                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="fname" class="form-label"
                                        > {{__('Father_name')}} </label
                                        >
                                        <input
                                            type="text"
                                            id="last-name-column"
                                            class="form-control"
                                            placeholder="{{__('Enter_father_name')}}"
                                            name="fname"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column" class="form-label"> {{__('ID_number')}}</label>
                                        <input
                                            type="text"
                                            id="city-column"
                                            class="form-control"
                                            placeholder="{{__('Enter_id_number')}}"
                                            name="tazcira_number"
                                            data-parsley-restricted-city="Jakarta"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating" class="form-label"
                                        >{{__('Phone_number')}}</label
                                        >
                                        <input
                                            type="number"
                                            id="country-floating"
                                            class="form-control"
                                            name="phone"
                                            placeholder="{{__('Enter_phone_number')}}"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating" class="form-label"
                                        >{{__('Email')}}</label
                                        >
                                        <input
                                            type="email"
                                            id="country-floating"
                                            class="form-control"
                                            name="email"
                                            placeholder="{{__('Enter_email')}}"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column" class="form-label"
                                        > {{__('Main_address')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="company-column"
                                            class="form-control"
                                            name="address"
                                            placeholder="{{__('Enter_address')}}"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group  ">
                                        <label for="email-id-column" class="form-label"
                                        >{{__('Current_address')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="curent_address"
                                            placeholder="  {{__('Enter_address')}}"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column" class="form-label"
                                        >{{__('Complaint_subject')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="creime_subject"
                                            placeholder=" {{__('Complaint_subject')}}"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column" class="form-label"
                                        >{{__('Case_type')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="crime_case"
                                            placeholder="{{__('Case_type')}}"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column" class="form-label"
                                        >{{__('Complaint_date')}}</label
                                        >
                                        <input
                                            type="date"
                                            id="email-id-column"
                                            class="form-control"
                                            name="crime_date"
                                            placeholder=" تاریخ شکایت"
                                            data-parsley-required="true"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column" class="form-label"
                                        >{{__('Petition')}}</label
                                        >
                                        <input type="file" name="ariza_file" required class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>

                                <hr class="mt-0 mb-3">

                                <div class="col-md-12 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label"
                                        > {{__('Description')}}</label
                                        >
                                        <textarea name="description" id="discription" class="form-control"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="mb-2">{{__('Suspect_registration_form')}}</h3>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label"
                                        > {{__('Suspect_name')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="suspect_name"
                                            placeholder="{{__('Enter_Suspect_nume')}}"
                                            data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="suspect_last_name" class="form-label"
                                        > {{__('Last_name')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="last_name"
                                            placeholder="{{__('Enter_last_name')}}"
                                            data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="suspect_last_name" class="form-label"
                                        > {{__('Father_name')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="father_name"
                                            placeholder="{{__('Enter_father_name')}}"
                                            data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label"
                                        >  {{__('Main_address')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="email-id-column"
                                            class="form-control"
                                            name="main_address"
                                            placeholder=" {{__('Enter_address')}}"
                                            data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column" class="form-label">{{__('ID_number')}} </label>
                                        <input
                                            type="number"
                                            id="city-column"
                                            class="form-control"
                                            placeholder=" {{__('Enter_id_number')}}"
                                            name="tazkera_number"
                                            data-parsley-restricted-city="Jakarta"
                                            data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating" class="form-label"
                                        >{{__('Phone_number')}}</label
                                        >
                                        <input
                                            type="number"
                                            id="country-floating"
                                            class="form-control"
                                            name="phone_number"
                                            placeholder="{{__('Enter_phone_number')}}"
                                            data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column" class="form-label"
                                        > {{__('Current_address')}}</label
                                        >
                                        <input
                                            type="text"
                                            id="company-column"
                                            class="form-control"
                                            name="current_address"
                                            placeholder="{{__('Enter_current_address')}}"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        {{__('save_compelint')}}
                                    </button>
                                    <a href="{{route('people')}}"
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
