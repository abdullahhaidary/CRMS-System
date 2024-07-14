@extends('layout.mian-dashbord')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Search Records</h2>
                        <form id="searchForm" method="GET" action="search_results.php">
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchName">نوم</label>
                                    <input type="text" class="form-control" id="searchName" name="name" placeholder="نوم داخل کړی ">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchFatherName">پلار نوم</label>
                                    <input type="text" class="form-control" id="searchFatherName" name="father_name" placeholder="پلار نوم داخل کږی">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchLastName">Last Name</label>
                                    <input type="text" class="form-control" id="searchLastName" name="last_name" placeholder="Enter last name">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchID">ID</label>
                                    <input type="text" class="form-control" id="searchID" name="id" placeholder="Enter ID">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchPhone">Phone Number</label>
                                    <input type="text" class="form-control" id="searchPhone" name="phone" placeholder="Enter phone number">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchEmail">Email</label>
                                    <input type="email" class="form-control" id="searchEmail" name="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-5">
                                    <label for="searchAddress">Address</label>
                                    <input type="text" class="form-control" id="searchAddress" name="address" placeholder="Enter address">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="searchDOB">Date of Birth</label>
                                    <input type="date" class="form-control" id="searchDOB" name="dob">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">
                                <i class="bi bi-search"></i> Search
                            </button>
{{--                            <button type="submit" class="btn btn-primary btn-block">Search</button>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
