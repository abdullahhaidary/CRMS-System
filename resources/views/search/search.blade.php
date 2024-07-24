@extends('layout.mian-dashbord')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center mb-4">{{__('Search_records')}}</h2>
                        <form id="searchForm" method="GET" action="search_results.php">
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchName">{{__('Name')}}</label>
                                    <input type="text" class="form-control" id="searchName" name="name" placeholder="{{__('Enter_the_name')}}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchFatherName">{{__('Father_name')}}</label>
                                    <input type="text" class="form-control" id="searchFatherName" name="father_name" placeholder="{{__('Enter_father_name')}}">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchLastName">{{__('Last_name')}}</label>
                                    <input type="text" class="form-control" id="searchLastName" name="last_name" placeholder="{{__('Enter_last_name')}}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchID">{{__('ID')}}</label>
                                    <input type="text" class="form-control" id="searchID" name="id" placeholder="{{__('Enter_ID')}}">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchPhone">{{__('Phone_number')}}</label>
                                    <input type="text" class="form-control" id="searchPhone" name="phone" placeholder="{{__('Enter_phone_number')}}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchEmail">{{__('Email')}}</label>
                                    <input type="email" class="form-control" id="searchEmail" name="email" placeholder="{{__('Enter_email')}}">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchAddress">{{__('Address')}}</label>
                                    <input type="text" class="form-control" id="searchAddress" name="address" placeholder="{{__('Enter_address')}}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchDOB">{{__('Date_of_birth')}}</label>
                                    <input type="date" class="form-control" id="searchDOB" name="dob">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">
                                <i class="bi bi-search"></i> {{__('Search')}}
                            </button>
{{--                            <button type="submit" class="btn btn-primary btn-block">search</button>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
