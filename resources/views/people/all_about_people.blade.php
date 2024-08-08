<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All About Case PDF</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Vazirmatn', sans-serif;
            direction:rtl;
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 0.25rem;
            background-color: transparent;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #007bff;
            color: #fff;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-12,
        .col-md-6 {
            padding-right: 15px;
            padding-left: 15px;
            box-sizing: border-box;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            background-color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: #c2c2c2;
            color: #fff;
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid #ccc;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .card-title {
            margin-bottom: 0;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .list-group {
            padding-left: 0;
            margin-bottom: 0;
        }

        .list-group-item {
            display: block;
            padding: 0.75rem 1.25rem;
            background-color: #fff;
            border: 1px solid #ccc;
        }
    </style>
    <script src="{{asset('dist/js/jquery .js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>{{__('Complaint_details')}}</h1>
        </div>
        <div class="mb-4">
            <button onclick="downloadDivAsPDF()" class="btn">Download PDF</button>

        </div>
        <div id="content-to-download">
            @foreach($peoples as $item)
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Complaint Information</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>#: </strong>{{$item->id}}</p>
                                <p><strong>{{__('Name')}}: </strong>{{$item->name . " ". $item->last_name}}</p>
                                <p><strong>{{__('Father_name')}}: </strong>{{ $item->father_name}}</p>
                                <p><strong>{{__('Email')}}: </strong>{{ $item->email}}</p>
                                <p><strong>{{__('Phone_number')}}: </strong>{{ $item->phone}}</p>
                                <p><strong>{{__('Tazkera_number')}}: </strong>{{ $item->tazkira_number}}</p>
                                <p><strong>{{__('Main_address')}}: </strong>{{ $item->actual_address}}</p>
                                <p><strong>{{__('Current_address')}}: </strong>{{ $item->current_address}}</p>
                                <p><strong>{{__('Case')}}: </strong>{{ $item->crime_case}}</p>
                                <p><strong>{{__('Crime_subject')}}: </strong>{{ $item->subject_crim}}</p>
                                <p><strong>{{__('Crime_date')}}: </strong>{{ $item->crim_date}}</p>
                                <p><strong>{{__('Create_date')}}: </strong> {{$item->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Evidence</h5>
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
            @endforeach
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Suspect Information</h5>
                        </div>
                        @foreach($suspects as $suspect)
                            <div class="card-body">
                                <p><strong>{{__('Suspect_name')}}:</strong>  {{$suspect->name}}</p>
                                <p><strong>{{__('Last_name')}}:</strong>  {{$suspect->last_name}}</p>
                                <p><strong>{{__('Father_name')}}:</strong>  {{$suspect->father_name}}</p>
                                <p><strong>{{__('Phone_number')}}:</strong>  {{$suspect->phone}}</p>
                                <p><strong>{{__('Tazkera_number')}}:</strong>  {{$suspect->tazcira_number}}</p>
                                <p><strong>{{__('Main_address')}}:</strong>  {{$suspect->actual_address}}</p>
                                <p><strong>{{__('Current_address')}}:</strong>  {{$suspect->current_address}}</p>
                                <p><strong>{{__('Create_date')}}:</strong>  {{$suspect->created_at}}</p>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Case Details</h5>
                        </div>
                        @foreach($cases as $case)
                            <div class="card-body">
                                <p><strong>{{__('Case_number')}}:</strong> {{$case->case_number}}</p>
                                <p><strong>{{__('Case_status')}}:</strong> {{$case->status}}</p>
                                <p><strong>{{__('Case_type')}}:</strong> {{$case->crime_location}}</p>
                                <p><strong>{{__('Start_date')}}:</strong> {{$case->start_date}}</p>
                                <p><strong>{{__('End_date')}}:</strong> {{$case->end_date}}</p>
                                <p><strong>{{__('Description')}}:</strong> {{$case->description}}</p>
                                <p><strong>{{__('Create-date')}}:</strong> {{$case->created_at}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Description</h5>
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
        <div id="content-to-download2" dir="rtl">
            @foreach($peoples as $item)
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">معلومات شکایت کننده</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>#: </strong>{{$item->id}}</p>
                                <p><strong>{{__('Name')}}: </strong>{{$item->name . " ". $item->last_name}}</p>
                                <p><strong>{{__('Father_name')}}: </strong>{{ $item->father_name}}</p>
                                <p><strong>{{__('Email')}}: </strong>{{ $item->email}}</p>
                                <p><strong>{{__('Phone_number')}}: </strong>{{ $item->phone}}</p>
                                <p><strong>{{__('Tazkera_number')}}: </strong>{{ $item->tazkira_number}}</p>
                                <p><strong>{{__('Main_address')}}: </strong>{{ $item->actual_address}}</p>
                                <p><strong>{{__('Current_address')}}: </strong>{{ $item->current_address}}</p>
                                <p><strong>{{__('Case')}}: </strong>{{ $item->crime_case}}</p>
                                <p><strong>{{__('Crime_subject')}}: </strong>{{ $item->subject_crim}}</p>
                                <p><strong>{{__('Crime_date')}}: </strong>{{ $item->crim_date}}</p>
                                <p><strong>{{__('Create_date')}}: </strong> {{$item->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">شواهد</h5>
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
            @endforeach
        </div>
    </div>
    <script>
function downloadDivAsPDF() {
    $('#content-to-download2').printThis({
        importCSS: true,            // import parent page css
        importStyle: true,          // import style tags
        loadCSS: "path/to/your/custom.css", // path to additional css file - use an array [] for multiple
        pageTitle: "Complaint Details", // add title to print page
        header: null,               // prefix to html
        footer: null,               // postfix to html
        base: false,                // preserve the BASE tag or accept a string for the URL
        formValues: true,           // preserve input/form values
        canvas: true,               // copy canvas content
        doctypeString: '<!DOCTYPE html>', // html doctype
    });
}


    </script>
</body>
</html>
