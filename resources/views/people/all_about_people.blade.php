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

        @font-face {
            font-family: 'Vazirmatn', sans-serif;
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f8f9fa;
            line-height: 1.6;
            color: #333;
            direction: rtl;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: bold;
            margin-top: 20px;
        }

        .section {
            margin-bottom: 40px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .info-row p {
            margin: 0;
            flex: 1;
            border-bottom: 1px solid #ccc;
            padding: 5px 10px;
            box-sizing: border-box;
        }

        .info-row p:first-child {
            border-right: 1px solid #ccc;
        }

        .list-group {
            padding-left: 0;
            margin-bottom: 0;
        }

        .list-group-item {
            display: block;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }
    </style>
    <script src="{{asset('dist/js/jquery .js')}}"></script>
<script src="{{asset('dist2/js/printThis.min.js')}}"></script>

</head>
<body>
<div class="mb-4">
    <button onclick="downloadDivAsPDF()" class="btn">Download PDF</button>
</div>
    <div class="container">
        <div id="content-to-download2">
        <div class="text-center">
            <div class="image">
                <img src="{{asset('images/logo.png')}}" width="200px" alt="">
            </div>
            <h1>دافغانستان اسلامی امارت</h1>
            <h2 class="mt-0">د کورنیو چارو وزارت</h2>
            <h3>د جرایمو په واړندی د مبارزی لوی ریاست</h3>
        </div>
        <div id="content-to-download2 " dir="rtl">
            <h4 class="text-center">جزئیات شکایت</h4>

            @foreach($peoples as $item)
                <div class="section">
                    <h4>معلومات شکایت کننده</h4>
                    <div class="info-row">
                        <p>#: {{$item->id}}</p>
                        <p>{{__('Name')}}: {{$item->name}}</p>
                        <p>{{__('Last_name')}}: {{$item->last_name}}</p>
                    </div>
                    <div class="info-row">
                        <p>{{__('Father_name')}}: {{$item->father_name}}</p>
                        <p>{{__('Email')}}: {{$item->email}}</p>
                        <p>{{__('Phone_number')}}: {{$item->phone}}</p>
                    </div>
                    <div class="info-row">
                        <p>{{__('Tazkira_number')}}: {{$item->tazkira_number}}</p>
                        <p>{{__('Case')}}: {{$item->crime_case}}</p>
                        <p>{{__('Crime_subject')}}: {{$item->subject_crim}}</p>
                    </div>
                    <div class="info-row">
                        <p>{{__('Create_date')}}: {{$item->created_at}}</p>
                        <p>{{__('Crime_date')}}: {{$item->crim_date}}</p>
                    </div>
                    <div class="info-row">
                        <p>{{__('Main_address')}}: {{$item->actual_address}}</p>
                        <p>{{__('Current_address')}}: {{$item->current_address}}</p>
                    </div>
                </div>
                @foreach($info as $items)
                    <div class="section">
                        <div class="info-row">
                            <p>{{__('Description')}}: {{$items->description}}</p>
                        </div>
                    </div>
                @endforeach
                <br>
            @endforeach
            <h2 class="text-center">لیست معلومات یک مظنون</h2>
            @foreach($suspects as $suspect)
                <div class="section">
                    <div class="info-row">
                        <p>{{__('Name')}}: {{$suspect->name}}</p>
                        <p>{{__('Last_name')}}: {{$suspect->last_name}}</p>
                        <p>{{__('Father_name')}}: {{$suspect->father_name}}</p>
                    </div>
                        <div class="info-row">
                            <p>{{__('Phone_number')}}: {{$suspect->phone}}</p>
                            <p>{{__('Last_name')}}: {{$suspect->tazcira_number}}</p>
                            <p>{{__('Create_date')}}: {{$suspect->created_at}}</p>
                        </div>
                        <div class="info-row">
                            <p>{{__('Main_address')}}: {{$suspect->actual_address}}</p>
                            <p>{{__('Current_address')}}: {{$suspect->actual_address}}</p>
                            <p>{{__('Status')}}: {{$suspect->isCreminal==0 ? "مظنون" : "فرد عادی"}}</p>
                        </div>
                        <div class="info-row">
                            <hr>
                        </div>
                </div>
            @endforeach
            <h2 class="text-center">لیست قضیه های </h2>
            @foreach($cases as $case)
            <div class="section">
                <div class="info-row">
                    <p>{{__('Case_number')}}: {{$case->case_number}}</p>
                    <p>{{__('Case_type')}}: {{$case->crime_type}}</p>
                    <p>{{__('Case_location')}}: {{$case->crime_location}}</p>
                </div>
                <div class="info-row">
                        <p>{{__('Case_status')}}: {{$case->status}}</p>
                        <p>{{__('Start_date')}}: {{$case->start_date}}</p>
                        <p>{{__('End_date')}}: {{$case->end_date}}</p>
                </div>
                <div class="info-row">
                        <p>{{__('Description')}}: {{$case->description}}</p>
                </div>
            </div>
                @endforeach
            <br>
            <hr>
            <br>
            <div class="section">
                <div class="info-row">
                    <p  class=""> محل امضا    .............................</p>
                </div>
            </div>
        </div>
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
