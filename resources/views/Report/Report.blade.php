@extends('layout.mian-dashbord')
@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">{{__('Generet_report')}}</h1>

        <!-- Report Form -->
        <form action="#" method="POST">

            <!-- Select Province -->
            <div class="mb-3">
                <label for="province" class="form-label font-bold">{{__('select_province')}}</label>
                <select class="form-select" id="province" name="province" required>
                    <option selected disabled>{{__('Choose_a_province')}}</option>
                    <option value="province1">کابل</option>
                    <option value="province2">کندهاز</option>
                    <option value="province3">هرات</option>
                    <!-- Add more provinces as needed -->
                </select>
            </div>

            <!-- Date Range -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="startDate" class="form-label">{{__('Start_date')}}</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="endDate" class="form-label">{{__('End_date')}}</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-file-earmark-text"></i>{{__('Report_btn')}}
            </button>
        </form>

        <!-- Report Data Table -->
        <div class="mt-5">
            <h2 class="mb-4"> {{__('Report_table_title')}} 2024-08-31 __ 2024-08-01</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ولایت</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ ختم</th>
                        <th>مجریمن</th>
                        <th>شکایت</th>
                        <th>مظنون</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>کابل</td>
                        <td>2024-08-01</td>
                        <td>2024-08-31</td>
                        <td>78</td>
                        <td>120</td>
                        <td>210</td>
                    </tr>
                    <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
