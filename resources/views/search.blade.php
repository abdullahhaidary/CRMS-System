@extends('layout.mian-dashbord')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/font-awsome.css') }}">
<div class="container mt-0">
    <form id="finger_form" method="POST" action="{{ route('store_finger_print') }}">
        @csrf
        <div class="form-group">
            <label hidden for="id">id</label>
            <input hidden type="text" class="form-control" name="id" id="id">
        </div>
        <div class="form-group">
            <label hidden for="LeftThumb">Left Thumb</label>
            <input hidden type="text" class="form-control" name="LeftThumb" id="LeftThumb">
        </div>
        <div class="form-group">
            <label hidden for="RightThumb">Right Thumb</label>
            <input hidden type="text" class="form-control" name="RightThumb" id="RightThumb">
        </div>
        <div class="form-group">
            <label hidden for="LeftIndex">Left Index</label>
            <input hidden type="text" class="form-control" name="LeftIndex" id="LeftIndex">
        </div>
        <div class="form-group">
            <label hidden for="RightIndex">Right Index</label>
            <input hidden type="text" class="form-control" name="RightIndex" id="RightIndex">
        </div>
    </form>
</div>
<div class="container">
    <main role="main" class="pb-3">
        <div class="row">
            <div class="col-md-10">
                <p class="text-dark font-bold">سرچ په اساس بایو مترک یک مضنون</p>
                <div class="row">
                    <div class="col-12 justify-content-between d-flex flex-row">
                        <div class="p-5 d-flex flex-column">
                            <div>
                                <i onclick="captureFP(1)" id="1" class="fas fa-fingerprint" style="font-size:40pt;cursor:pointer"></i>
                            </div>
                            <div>
                                <p>Left Thumb</p>
                            </div>
                        </div>
                        <div class="p-5 d-flex flex-column">
                            <div>
                                <i onclick="captureFP(2)" id="2" class="fas fa-fingerprint" style="font-size:40pt;cursor:pointer"></i>
                            </div>
                            <div>
                                <p>Left Index</p>
                            </div>
                        </div>
                        <div class="p-5 d-flex flex-column">
                            <div>
                                <i onclick="captureFP(3)" id="3" class="fas fa-fingerprint" style="font-size:40pt;cursor:pointer"></i>
                            </div>
                            <div>
                                <p>Right Thumb</p>
                            </div>
                        </div>
                        <div class="p-5 d-flex flex-column">
                            <div>
                                <i onclick="captureFP(4)" id="4" class="fas fa-fingerprint" style="font-size:40pt;cursor:pointer"></i>
                            </div>
                            <div>
                                <p>Right Index</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="fetch_and_search()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </main>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>آیدی</th>
                <th>اسم</th>
                <th>تخلص</th>
                <th>اسم پدر</th>
                <th>نمبر مبایل</th>
                <th>آدرس اصلی</th>
                <th>آدرس فعلی</th>
            </tr>
        </thead>
        <tbody id="criminal">
        </tbody>
    </table>
</div>

<script src="{{asset('dist/js/jquery .js')}}"></script>
<script type="text/javascript">
    var secugen_lic = "";
    let selectedFinger = null;

    function captureFP(index) {
        if (selectedFinger !== null && selectedFinger !== index) {
            document.getElementById(selectedFinger).style.color = "black";
            document.getElementById(getFingerId(selectedFinger)).value = "";
        }
        CallSGIFPGetData(SuccessFunc, ErrorFunc, index);
        selectedFinger = index;
    }

    function getFingerId(index) {
        switch (index) {
            case 1:
                return 'LeftThumb';
            case 2:
                return 'LeftIndex';
            case 3:
                return 'RightThumb';
            case 4:
                return 'RightIndex';
            default:
                return null;
        }
    }
    function getFingerDb(index) {
        switch (index) {
            case 1:
                return 'left_thumb';
            case 2:
                return 'left_index';
            case 3:
                return 'right_thumb';
            case 4:
                return 'right_index';
            default:
                return null;
        }
    }
    function fetch_and_search() {
        let selectedTemplate = document.getElementById(getFingerId(selectedFinger)).value;

        if (selectedTemplate === "") {
            alert("Please select a fingerprint to match.");
            return;
        }

        $.ajax({
            method: 'GET',
            url: '{{route('fetchFingerprint')}}',
            success: function(response) {
                response.fingerprint.forEach(element => {
                    $.ajax({
                        url: "https://localhost:8443/SGIMatchScore",
                        type: "POST",
                        data: {
                            Template1: selectedTemplate,
                            Template2: element[getFingerDb(selectedFinger).toLowerCase()],
                        },
                        success: function(response) {
                            response = JSON.parse(response);
                            if(response.MatchingScore > 120){
                                $('#criminal').empty();
                                $.ajax({
                                    method: 'GET',
                                    url: '{{ route('findPersonFromFingerprint') }}',
                                    data: { suspect_id: element.suspect_id, criminal_id:element.criminal_id },
                                    success: function(a) {
                                        if (a.person.type === 'criminal') {
                                            $('#criminal').append(`
                                                <tr>
                                                    <td>${a.person.id}</td>
                                                    <td>${a.person.criminal_name}</td>
                                                    <td>${a.person.last_name}</td>
                                                    <td>${a.person.father_name}</td>
                                                    <td>${a.person.phone}</td>
                                                    <td>${a.person.actual_address}</td>
                                                    <td>${a.person.current_address}</td>
                                                    <td><a href='criminal/all/${a.person.id}'>معلومات مکمل</a></td>
                                                </tr>
                                            `);
                                        } else if (a.person.type === 'people') {
                                            $('#criminal').append(`
                                                <tr>
                                                    <td>${a.person.id}</td>
                                                    <td>${a.person.name}</td>
                                                    <td>${a.person.last_name}</td>
                                                    <td>${a.person.father_name}</td>
                                                    <td>${a.person.phone}</td>
                                                    <td>${a.person.actual_address}</td>
                                                    <td>${a.person.current_address}</td>
                                                    <td>${a.person.tazcira_number}</td>
                                                </tr>
                                            `);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr, status, error);
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr, status, error);
                        }
                    });
                });
            }
        });
    }

    function SuccessFunc(result, index) {
        if (result.ErrorCode == 0) {
            let fingerId = getFingerId(index);
            document.getElementById(fingerId).value = result.TemplateBase64;
            document.getElementById(index).style.color = "green";
        } else {
            alert("Fingerprint Capture Error Code:  " + result.ErrorCode + ".\nDescription:  " + ErrorCodeToString(result.ErrorCode) + ".");
        }
    }

    function ErrorFunc(status) {
        alert("Check if SGIBIOSRV is running; Status = " + status + ":");
    }

    function CallSGIFPGetData(successCall, failCall, index) {
        var uri = "https://localhost:8443/SGIFPCapture";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var fpobject = JSON.parse(xmlhttp.responseText);
                successCall(fpobject, index);
            } else if (xmlhttp.status == 404) {
                failCall(xmlhttp.status)
            }
        }
        var params = "Timeout=" + "10000";
        params += "&Quality=" + "50";
        params += "&licstr=" + encodeURIComponent(secugen_lic);
        params += "&templateFormat=" + "ISO";
        params += "&imageWSQRate=" + "0.75";
        xmlhttp.open("POST", uri, true);
        xmlhttp.send(params);

        xmlhttp.onerror = function () {
            failCall(xmlhttp.statusText);
        }
    }

    function ErrorCodeToString(ErrorCode) {
        var Description;
        switch (ErrorCode) {
            case 51:
                Description = "System file load failure";
                break;
            case 52:
                Description = "Sensor chip initialization failed";
                break;
            case 53:
                Description = "Device not found";
                break;
            case 54:
                Description = "Fingerprint image capture timeout";
                break;
            case 55:
                Description = "No device available";
                break;
            case 56:
                Description = "Driver load failed";
                break;
            case 57:
                Description = "Wrong Image";
                break;
            case 58:
                Description = "Lack of bandwidth";
                break;
            case 59:
                Description = "Device Busy";
                break;
            case 60:
                Description = "Capture Already Started";
                break;
            case 61:
                Description = "Invalid Parameter";
                break;
            case 63:
                Description = "Finger is not detected";
                break;
            case 64:
                Description = "Finger is not centered on the sensor";
                break;
            case 65:
                Description = "Unknown error";
                break;
            case 66:
                Description = "Finger is not placed correctly";
                break;
            case 67:
                Description = "Finger scan failed";
                break;
            default:
                Description = "Unknown error";
                break;
        }
        return Description;
    }
</script>
@endsection
