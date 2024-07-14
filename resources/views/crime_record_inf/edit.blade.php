@extends('layout.mian-dashbord')
@section('content')

<div class="page-heading text-center">
    <h3>فورم تغیر توضیحات یک شکایت کننده</h3>
</div>
<!-- criminal from start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                @foreach($data as $item)
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{url('crime/info/update/'.$item->id)}}" data-parsley-validate>
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="email-id-column" class="form-label"
                                        > توضیحات</label
                                        >
                                        <textarea name="description" id="discription" class="form-control"></textarea>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        ثبت تغیرات
                                    </button>
                                    <a href="{{route('people')}}"
                                       type="reset"
                                       class="btn btn-light-secondary me-1 mb-1"
                                    >
                                        بازګشت
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
