@extends('layout.mian-dashbord')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Department List</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Head of Department</th>
                    <th scope="col">Number of Employees</th>
                    <th scope="col">Location</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Human Resources</td>
                    <td>Jane Doe</td>
                    <td>15</td>
                    <td>Building A</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Engineering</td>
                    <td>John Smith</td>
                    <td>40</td>
                    <td>Building B</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Marketing</td>
                    <td>Emily Johnson</td>
                    <td>10</td>
                    <td>Building C</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Sales</td>
                    <td>Robert Brown</td>
                    <td>25</td>
                    <td>Building D</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
