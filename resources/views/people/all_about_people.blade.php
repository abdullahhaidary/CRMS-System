@extends('layout.mian-dashbord')
@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>Complaint Details</h1>
    </div>
@foreach($data as $item)
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #c2c2c2">
                    <h5 class="card-title mb-0">Complaint Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Complaint ID:</strong>{{$item->id}}</p>
                    <p><strong>نوم:</strong>{{$item->name . " ". $item->last_name}}</p>
                    <p><strong>پلار نوم:</strong>{{ $item->father_name}}</p>
                    <p><strong>اییمل:</strong>{{ $item->email}}</p>
                    <p><strong>تلفن:</strong>{{ $item->phone}}</p>
                    <p><strong>تذکره نمبر:</strong>{{ $item->tazkira_number}}</p>
                    <p><strong>ادرس اصلی:</strong>{{ $item->actual_address}}</p>
                    <p><strong>ادرس فعلی:</strong>{{ $item->current_address}}</p>
                    <p><strong>کیس:</strong>{{ $item->crime_case}}</p>
                    <p><strong>موضوع جرم:</strong>{{ $item->subject_crim}}</p>
                    <p><strong> تاریخ جرم:</strong>{{ $item->crim_date}}</p>
                    <p><strong>تاریخ ثبت:</strong> {{$item->created_at}}</p>
                </div>
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
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0">Suspect Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong>{{$item->name}}</p>
                    <p><strong>Age:</strong> 34</p>
                    <p><strong>Address:</strong> 123 Main St, Anytown, USA</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title mb-0">Case Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Case Number:</strong> 456789</p>
                    <p><strong>Status:</strong> Under Investigation</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
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
    @endforeach
</div>
@endsection
