@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>{{__('Suspect_info_chnge_form')}}</h3>
    </div>
    @foreach($data as $item)
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{url('/suspect/update/'.$id)}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <h3 class="mb-2">فورم ثبت مضنون</h3>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > {{__('Name')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="suspect_name"
                                                value="{{$item->name}}"

                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="suspect_last_name" class="form-label"
                                            > {{__('Last_name')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="last_name"
                                                value="{{$item->last_name}}"

                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="suspect_last_name" class="form-label"
                                            > {{__('Father_name')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="email-id-column"
                                                class="form-control"
                                                name="father_name"
                                                value="{{$item->father_name}}"

                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">{{__('ID_number')}}</label>
                                            <input
                                                type="text"
                                                id="city-column"
                                                class="form-control"
                                                name="tazcira_number"
                                                value="{{$item->tazcira_number}}"
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
                                                value="{{$item->phone}}"
                                                placeholder="شماره تماس"
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            > {{__('Main_address')}}</label
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
                                            > {{__('Current_address')}}</label
                                            >
                                            <input
                                                type="text"
                                                id="company-column"
                                                class="form-control"
                                                name="current_address"
                                                value="{{$item->current_address}}"
                                                placeholder=""
                                                data-parsley-required="true"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            > {{__('Status')}}</label
                                            >
                                            <fieldset class="form-group">
                                                <select class="form-select" name="Is_crime" id="disabledSelect">
                                                    @if($item->isCriminal==0)
                                                        <option selected value="0">{{__('Suspect')}}</option>
                                                        <option value="1">{{__('People')}}</option>
                                                        <option value="2">{{__('Criminal')}}</option>
                                                    @elseif($item->isCriminal==1)
                                                        <option value="0">{{__('Suspect')}}</option>
                                                        <option selected value="1">{{__('People')}}</option>
                                                        <option  value="2">{{__('Criminal')}}</option>
                                                    @elseif($item->isCriminal==2)
                                                        <option value="0">{{__('Suspect')}}</option>
                                                        <option  value="1">{{__('People')}}</option>
                                                        <option selected value="2">{{__('Criminal')}}</option>
                                                    @endif
                                                    >
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                        {{__('Edit')}}
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
                @endforeach
            </div>
        </div>
    </section>


@endsection
