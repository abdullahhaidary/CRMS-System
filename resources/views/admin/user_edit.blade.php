@extends('layout.mian-dashbord')
@section('content')
    <div class="page-heading text-center">
        <h3>فورم ایجاد یوزر جدید</h3>
    </div>
    <!-- criminal from start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    @foreach($data as $item)
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{url('admin/update/'.$item->id)}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label"
                                            >نوم</label
                                            >
                                            <input
                                                type="text"
                                                id="first-name-column"
                                                class="form-control"
                                                placeholder="نوم"
                                                name="name"
                                                value="{{$item->name}}"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label"
                                            >ایمیل آدرس</label
                                            >
                                            <input
                                                type="email"
                                                id="company-column"
                                                class="form-control"
                                                name="email"
                                                value="{{$item->email}}"
                                                placeholder="ایمیل ادرس"
                                                data-parsley-required="true"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mandatory">
                                            <label for="email-id-column" class="form-label"
                                            >تصویر</label
                                            >
                                            <input type="file" name="picture" class="form-control"  id="inputGroupFile01">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email-id-column mandatory" class="form-label"
                                        >Position</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="type" id="disabledSelect">
                                                @if($item->type==1)
                                                    <option selected value="1">super Admin</option>
                                                    <option value="2">admin</option>
                                                    <option value="3">moder</option>
                                                    @elseif($item->type==2)
                                                <option value="1">super Admin</option>
                                                    <option selected value="2">admin</option>
                                                    <option value="3">moder</option>
                                                @elseif($item->type==3)
                                                <option value="3">Super Admin</option>
                                                    <option value="2">admin</option>
                                                    <option selected value="3">moder</option>
                                                @endif

{{--                                                    <option value="1">super admin</option>--}}
{{--                                                    <option value="2">admin</option>--}}
{{--                                                    <option value="3">moder</option>--}}
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button
                                            type="reset"
                                            class="btn btn-light-secondary me-1 mb-1"
                                        >
                                            Reset
                                        </button>
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
    <!-- criminal from end -->
@endsection
