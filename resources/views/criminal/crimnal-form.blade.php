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
                            <form method="post" action="{{route('criminal-from')}}" enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf()
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label"
                                            >{{__('Name')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="{{__('Enter_your_name')}}"
                                                name="name"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
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
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="city-column" class="form-label">{{__('Father_name')}}</label>
                                            <input
                                                type="text"
                                                id="city-column"
                                                class="form-control"
                                                placeholder="{{__('Enter_father_name')}}"
                                                name="father_name"
                                                data-parsley-restricted-city="Jakarta"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
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
                                        <div class="form-group mandatory">
                                            <label for="company-column" class="form-label"
                                            >{{__('Email')}}</label
                                            >
                                            <input
                                                type="email"
                                                id="company-column"
                                                class="form-control"
                                                name="email"
                                                placeholder="{{__('Enter_email')}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Main_address')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="address"
                                                placeholder="{{__('Enter_address')}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="current-address" class="form-label"
                                            >{{__('Current_address')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="current_address"
                                                placeholder="{{__('Enter_current_address')}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Letter')}}</label
                                            >
                                            <input type="file" class="form-control" required id="inputGroupFile01" name="photo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >{{__('Gender')}}</label>
                                        <fieldset class="form-group mandatory">
                                            <select class="form-select" name="gender" id="disabledSelect">
                                                <option>{{__('Select_gender')}}</option>
                                                <option value="1">{{__('Male')}}</option>
                                                <option value="0">{{__('Female')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Date_of_birth')}}</label
                                            >
                                            <input
                                                type="date"
                                                id="email-id-column"
                                                class="form-control"
                                                name="dateofbirth"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >{{__('Date_crime')}}</label
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
                                            >{{__('Family_member')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="familymember"
                                                placeholder=" {{__('Family_member')}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > {{__('Job')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="job"
                                                placeholder="{{__('Enter_job')}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >{{__('Suspect_list')}}</label>
                                        <fieldset class="form-group">
                                            <select class="form-select"  name="suspect" id="disabledSelect">
                                                <option>{{__('Select_suspect')}}</option>
                                            @foreach($data as $item)
                                                    <option value="{{$item->id}}">{{ "name: ".$item->name."- last_name: ". $item->last_name."- number tazkera: ".$item->tazcira_number}}</option>{{--                                                        @endif--}}

                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >{{__('Case')}}</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="case"  id="disabledSelect">
                                                <option>{{__('Select_case')}}</option>
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
                                            >{{__('Description')}}</label
                                            >
                                            <textarea name="discription" required id="discription" class="form-control"  data-parsley-required="true"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                          {{__('Save')}}
                                        </button>
                                        <button
                                            type="reset"
                                            class="btn btn-light-secondary me-1 mb-1"
                                        >
                                           {{__('Reset')}}
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
