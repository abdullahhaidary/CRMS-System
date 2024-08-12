@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>{{ __('Criminal_changes_form') }}</h3>
    </div>
    <!-- criminalcontroller from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form method="post" action="{{ url('criminal/edit/' . $criminal->id) }}"
                                enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf()
                                @if ($criminal->suspect_id == null)
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group ">
                                                <label for="first-name-column"
                                                    class="form-label">{{ __('Name') }}</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    name="name" value="{{ $criminal->name }}"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 ">
                                            <div class="form-group">
                                                <label for="last-name-column" class="form-label">{{ __('Last_name') }}
                                                </label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    name="lname" value="{{ $criminal->last_name }}"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 ">
                                            <div class="form-group">
                                                <label for="city-column" class="form-label">{{ __('Father_name') }}</label>
                                                <input type="text" id="city-column" class="form-control"
                                                    name="father_name" value="{{ $criminal->father_name }}"
                                                    data-parsley-restricted-city="Jakarta" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating"
                                                    class="form-label">{{ __('Phone_number') }}</label>
                                                <input type="number" id="country-floating" class="form-control"
                                                    name="phone" value="{{ $criminal->phone }}"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 ">
                                            <div class="form-group">
                                                <label for="company-column" class="form-label">{{ __('Email') }}</label>
                                                <input type="email" id="company-column" class="form-control"
                                                    name="email" value="{{ $criminal->email }}"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group ">
                                                <label for="email-id-column" class="form-label">
                                                    {{ __('Main_address') }}</label>
                                                <input type="text" id="email-id-column" class="form-control"
                                                    name="address" value="{{ $criminal->name }}" placeholder="آدرس اصلی"
                                                    data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group ">
                                                <label for="curent-address" class="form-label">
                                                    {{ __('Current_address') }}</label>
                                                <input type="text" id="email-id-column" class="form-control"
                                                    name="current_address" value="{{ $criminal->current_address }}"
                                                    placeholder="آدرس فعلی" data-parsley-required="true" />
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group ">
                                                    <label for="first-name-column"
                                                        class="form-label">{{ __('Name') }}</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        name="name" value="{{ $criminal->suspect->name }}"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 ">
                                                <div class="form-group">
                                                    <label for="last-name-column" class="form-label">{{ __('Last_name') }}
                                                    </label>
                                                    <input type="text" id="last-name-column" class="form-control"
                                                        name="lname" value="{{ $criminal->suspect->last_name }}"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 ">
                                                <div class="form-group">
                                                    <label for="city-column"
                                                        class="form-label">{{ __('Father_name') }}</label>
                                                    <input type="text" id="city-column" class="form-control"
                                                        name="father_name" value="{{ $criminal->suspect->father_name }}"
                                                        data-parsley-restricted-city="Jakarta"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating"
                                                        class="form-label">{{ __('Phone_number') }}</label>
                                                    <input type="number" id="country-floating" class="form-control"
                                                        name="phone" value="{{ $criminal->suspect->phone }}"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 ">
                                                <div class="form-group">
                                                    <label for="company-column"
                                                        class="form-label">{{ __('Email') }}</label>
                                                    <input type="email" id="company-column" class="form-control"
                                                        name="email" value="{{ $criminal->suspect->email }}"
                                                        data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group ">
                                                    <label for="email-id-column" class="form-label">
                                                        {{ __('Main_address') }}</label>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                        name="address" value="{{ $criminal->suspect->actual_address }}"
                                                        placeholder="آدرس اصلی" data-parsley-required="true" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group ">
                                                    <label for="curent-address" class="form-label">
                                                        {{ __('Current_address') }}</label>
                                                    <input type="text" id="email-id-column" class="form-control"
                                                        name="current_address" value="{{ $criminal->current_address }}"
                                                        placeholder="آدرس فعلی" data-parsley-required="true" />
                                                </div>
                                            </div>
                                @endif
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label">{{ __('Letter') }}</label>
                                        <input type="file" class="form-control" id="inputGroupFile01" name="photo">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email-id-column mandatory" class="form-label">{{ __('Gender') }}
                                    </label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="gender" id="disabledSelect">
                                            @if ($criminal->gender == 1)
                                                <option selected value="1">{{ __('Male') }}</option>
                                                <option value="0">{{ __('Female') }}</option
                                                @elseif($criminal->gender == 0) <option value="1">
                                                {{ __('Male') }}</option>
                                                <option selected value="0">{{ __('Female') }}</option>
                                            @else
                                                <option value="1">{{ __('Male') }}</option>
                                                <option selected value="0">{{ __('Female') }}</option>
                                            @endif
                                            >
                                        </select>
                                    </fieldset>
                                </div>

                                @if ($criminal->suspect_id == null)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column"
                                                class="form-label">{{ __('Date_of_birth') }}</label>
                                            <input type="date" id="email-id-column" class="form-control"
                                                name="dateofbirth" value="{{ $criminal->date_of_birth }}"
                                                placeholder=" تاریخ تولد" data-parsley-required="true" />
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6 col-12">
                                        <div class="form-group ">
                                            <label for="email-id-column"
                                                class="form-label">{{ __('Date_of_birth') }}</label>
                                            <input type="date" id="email-id-column" class="form-control"
                                                name="dateofbirth" value="{{ $criminal->suspect->date_of_birth }}"
                                                placeholder=" تاریخ تولد" data-parsley-required="true" />
                                        </div>
                                    </div>
                                @endif


                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label">{{ __('Date_crime') }}</label>
                                        <input type="date" id="email-id-column" class="form-control"
                                            name="arrest_date" value="{{ $criminal->arrest_date }}"
                                            placeholder=" تاریخ جرم" data-parsley-required="true" />
                                    </div>
                                </div>


                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column"
                                            class="form-label">{{ __('Family_members') }}</label>
                                        <input type="text" id="email-id-column" class="form-control"
                                            name="familymember" value="{{ $criminal->family_members }}"
                                            placeholder=" عضو فامیل" data-parsley-required="true" />
                                    </div>
                                </div>


                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label">
                                            {{ __('Job') }}</label>
                                        <input type="text" id="email-id-column" class="form-control" name="job"
                                            value="{{ $criminal->job }}" placeholder=" وظیفه"
                                            data-parsley-required="true" />
                                    </div>
                                </div>



                                <div class="col-md-6 mb-4">
                                    <label for="email-id-column " class="form-label">مظنون</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="suspect" id="disabledSelect">
                                            @foreach ($suspects as $suspect)
                                                @isset($criminal->suspect)
                                                    @if ($criminal->suspect->id == $suspect->suspect_id)
                                                        <option selected value="{{ $suspect->id }}">
                                                            {{ $suspect->name }}</option>
                                                    @endif
                                                @endisset
                                                <option value="{{ $suspect->id }}">{{ $suspect->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email-id-column " class="form-label">{{ __('Case') }} </label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="case" id="disabledSelect">
                                            @php
                                                $criminalFound = false;
                                            @endphp

                                            @foreach ($cases as $items)
                                                @if ($items->id == $criminal->case_id)
                                                    @php
                                                        $criminalFound = true;
                                                    @endphp
                                                    <option selected value="{{ $items->id }}">
                                                        {{ $items->case_number }}
                                                    </option>
                                                @else
                                                    <option value="{{ $items->id }}">{{ $items->case_number }}
                                                    </option>
                                                @endif
                                            @endforeach

                                            @if (!$criminalFound)
                                                <option value="0" selected>{{__('please_select_a_suspect')}}</option>
                                            @endif

                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group ">
                                        <label for="email-id-column" class="form-label">
                                            {{ __('Description') }}</label>
                                        <textarea name="discription" id="discription" class="form-control" data-parsley-required="true">

                                            </textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ url('/criminal/all/' . $criminal->id) }}"
                                    class="btn btn-light-secondary me-1 mb-1">
                                    {{ __('Reset') }}
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
    <!-- criminalcontroller from end -->
@endsection
