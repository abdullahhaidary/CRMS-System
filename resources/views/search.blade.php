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
                <p class="text-dark font-bold"> سرچ په اساس بایو مترک یک مضنون</p>
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


<script src="{{asset('dist/js/jquery .js')}}"></script>
<script type="text/javascript">
    var secugen_lic = "";
    let matched_response = "";
    function fetch_and_search(){
    let template_to_check = document.getElementById('LeftThumb').value;
    $.ajax({
            method: 'GET',
            url: '{{route('fetchFingerprint')}}',
            success: function(response) {
                response.fingerprint.forEach(element => {
                    $.ajax({
                    url: "https://localhost:8443/SGIMatchScore",
                    type: "POST",
                    data: {
                        Template1: template_to_check,
                        Template2: element.left_thumb,
                    },
                    success: function(response) {
                        // Handle success
                        // $("#result").html("Match Score: " + response);
                        response = JSON.parse(response);
                        console.log(response.MatchingScore)
                        if(response.MatchingScore>120){
                        $.ajax({
                            method: 'GET',
                            url: '{{ route('findPersonFromFingerprint') }}',
                            data: { id: element.suspect_id },
                            success: function(a) {
                                person = a;
                                console.log(a)
                                return false;
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr, status, error);
                            }
                        });
                    }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr,status,error);
                        // Handle error
                    }
                });
                });
            }
            });
}


    function findTheFullDetails(element) {
        console.log('full detail called');
        $.ajax({
            method: 'GET',
            url: '{{ route('findPersonFromFingerprint') }}',
            data: { id: element.id },
            success: function(response) {
                console.log(response);
                callback(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
            }
        });
    }
    function MatchFunction(first,second){
        console.log('match is called');
                $.ajax({
                    url: "https://localhost:8443/SGIMatchScore",
                    type: "POST",
                    data: {
                        Template1: first,
                        Template2: second,
                    },
                    success: function(response) {
                        // Handle success
                        // $("#result").html("Match Score: " + response);
                        console.log(response);
                        return response;
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr,status,error);
                        // Handle error
                    }
                });
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
                Description = "Cannot get serial number of the device";
                break;
            case 61:
                Description = "Unsupported device";
                break;
            case 63:
                Description = "SgiBioSrv didn't start; Try image capture again";
                break;
            default:
                Description = "Unknown error code or Update code to reflect latest result";
                break;
        }
        return Description;
    }

    function captureFP(index) {
        CallSGIFPGetData(SuccessFunc, ErrorFunc, index);
    }

    function SuccessFunc(result, index) {
        if (result.ErrorCode == 0) {
            if (index == 1) {
                console.log('added');
                document.getElementById('LeftThumb').value = result.TemplateBase64;
                document.getElementById('1').style.color = "green";
            } else if (index == 2) {
                console.log('added');
                document.getElementById('LeftIndex').value = result.TemplateBase64;
                document.getElementById('2').style.color = "green";
            } else if (index == 3) {
                console.log('added');
                document.getElementById('RightThumb').value = result.TemplateBase64;
                document.getElementById('3').style.color = "green";
            } else if (index == 4) {
                console.log('added');
                document.getElementById('RightIndex').value = result.TemplateBase64;
                document.getElementById('4').style.color = "green";
            }
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
</script>
<script src="{{asset('dist/js/jquery .js')}}"></script>

@endsection
