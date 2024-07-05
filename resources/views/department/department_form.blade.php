@extends('layout.mian-dashbord')
@section('content')


<div class="container mt-5">


    <!-- Add New Department Form Section -->
    <h2 class="mb-4">Add New Department</h2>
    <form id="departmentForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="departmentName">Department Name</label>
                <input type="text" class="form-control" id="departmentName" placeholder="Enter department name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="headOfDepartment">Head of Department</label>
                <input type="text" class="form-control" id="headOfDepartment" placeholder="Enter head of department" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="numberOfEmployees">Number of Employees</label>
                <input type="number" class="form-control" id="numberOfEmployees" placeholder="Enter number of employees" required>
            </div>
            <div class="form-group col-md-4">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" placeholder="Enter location" required>
            </div>
            <div class="form-group col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary btn-block">Add Department</button>
            </div>
        </div>
    </form>
</div>
@endsection
