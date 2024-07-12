@extends('layout.mian-dashbord')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/font-awsome.css') }}">

<div class="page-heading text-center">
    <h3>فورم ثبت شکایت جدید</h3>
</div>
<div class="container">
    <form id="finger_form" method="POST" action="{{ route('search_fingerprint') }}">
        @csrf
        <div class="form-group">
            <label  for="LeftThumb">Left Thumb</label>
            <input  type="text" class="form-control" name="LeftThumb" id="LeftThumb">
        </div>
        <div class="form-group">
            <label  for="RightThumb">Right Thumb</label>
            <input  type="text" class="form-control" name="RightThumb" id="RightThumb">
        </div>
        <div class="form-group">
            <label  for="LeftIndex">Left Index</label>
            <input  type="text" class="form-control" name="LeftIndex" id="LeftIndex">
        </div>
        <div class="form-group">
            <label  for="RightIndex">Right Index</label>
            <input  type="text" class="form-control" name="RightIndex" id="RightIndex">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
<i onclick="captureFP(1)" id="1" class="fas fa-fingerprint" style="font-size:40pt;cursor:pointer"></i>

<script type="text/javascript">
    var secugen_lic = "";

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
<div>
</div>
@endsection
