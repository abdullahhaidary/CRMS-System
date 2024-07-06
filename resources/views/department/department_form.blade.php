@extends('layout.mian-dashbord')
@section('content')


<div class="container mt-5">


    <!-- Add New Department Form Section -->
    <h2 class="mb-4">Add New Department</h2>
    <form id="departmentForm" method="post" action="{{route('department_form')}}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="departmentName"> اسم دیپارتمنت  <span style="color: red">*</span></label>
                <input type="text" name="d_name" class="form-control" id="departmentName" placeholder="اسم دیپارتمنت اینجا داخل کنید" required>
            </div>
            <div class="form-group col-md-8">
                <label for="headOfDepartment">  اعنوان دیپارتمنت <span style="color: red">*</span></label>
                <input type="text" name="d_title" class="form-control" id="headOfDepartment" placeholder=" اعنوان دیپارتمنت" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="location">توضیحات </label>
                <textarea name="d_description" id="discription" class="form-control"  data-parsley-required="true"></textarea>

            </div>
            <div class="form-group col-md-4 d-flex align-items-end mt-5">
                <button type="submit" class="btn btn-primary btn-block ">ثبت</button>
                <a class="btn btn-info btn-block mx-3" href="{{}}">بازګشت به صفحه</a>
            </div>
        </div>
    </form>
</div>
@endsection
