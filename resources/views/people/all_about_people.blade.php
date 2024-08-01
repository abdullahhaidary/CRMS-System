@extends('layout.mian-dashbord')
@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>Complaint Details</h1>
{{--        <a href="{{route('pdf')}}" class="btn">PDF</a>--}}
            </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #c2c2c2">
                    <h5 class="card-title mb-0">Complaint Information</h5>
                </div>
                @foreach($peoples as $item)
                <div class="card-body">
                    <p><strong>#: </strong>{{$item->id}}</p>
                    <p><strong>نوم: </strong>{{$item->name . " ". $item->last_name}}</p>
                    <p><strong>پلار نوم: </strong>{{ $item->father_name}}</p>
                    <p><strong>اییمل: </strong>{{ $item->email}}</p>
                    <p><strong>تلفن: </strong>{{ $item->phone}}</p>
                    <p><strong>تذکره نمبر: </strong>{{ $item->tazkira_number}}</p>
                    <p><strong> ادرس اصلی: </strong>{{ $item->actual_address}}</p>
                    <p><strong>ادرس فعلی: </strong>{{ $item->current_address}}</p>
                    <p><strong>کیس: </strong>{{ $item->crime_case}}</p>
                    <p><strong>موضوع جرم: </strong>{{ $item->subject_crim}}</p>
                    <p><strong> تاریخ جرم: </strong>{{ $item->crim_date}}</p>
                    <p><strong>تاریخ ثبت: </strong> {{$item->created_at}}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #c2c2c2">
                    <h5 class="card-title mb-0">Evidence</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Photographs</li>
                        <li class="list-group-item">Witness Statements</li>
                        <li class="list-group-item">Video Footage</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #c2c2c2">
                    <h5 class="card-title mb-0">Suspect Information</h5>
                </div>
@foreach($suspects as $suspect)
                <div class="card-body">
                    <p><strong>نام مظنون:</strong>  {{$suspect->name}}</p>
                    <p><strong>تخلص:</strong>  {{$suspect->last_name}}</p>
                    <p><strong>نام پدر:</strong>  {{$suspect->father_name}}</p>
                    <p><strong>تلفن:</strong>  {{$suspect->phone}}</p>
                    <p><strong>نمبر تذکره:</strong>  {{$suspect->tazcira_number}}</p>
                    <p><strong>ادرس اصلی:</strong>  {{$suspect->actual_address}}</p>
                    <p><strong>ادرس فعلی:</strong>  {{$suspect->current_address}}</p>
                    <p><strong>تاریخ ثبت:</strong>  {{$suspect->created_at}}</p>
                </div>
    <hr>
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #c2c2c2">
                    <h5 class="card-title mb-0">Case Details</h5>
                </div>
                @foreach($cases as $case)
                <div class="card-body">
                    <p><strong>نمبر قضیه:</strong> {{$case->case_number}}</p>
                    <p><strong>حالت قضیه:</strong> {{$case->status}}</p>
                    <p><strong>نوع جرم:</strong> {{$case->crime_type}}</p>
                    <p><strong>جرم جای:</strong> {{$case->crime_location}}</p>
                    <p><strong>تاریخ شروع:</strong> {{$case->start_date}}</p>
                    <p><strong>تاریخ ختم:</strong> {{$case->end_date}}</p>
                    <p><strong>توضیحات:</strong> {{$case->description}}</p>
                    <p><strong>تاریخ ثبت:</strong> {{$case->created_at}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #c2c2c2">
                    <h5 class="card-title mb-0">Description</h5>
                </div>
                @foreach($info as $items)
                <div class="card-body">
                    <p>{{$items->description}}.</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
