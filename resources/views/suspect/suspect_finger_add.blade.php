@extends('layout.mian-dashbord')
asd
@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/font-awsome.css') }}">
<div class="container">
    <div class="card">
        <div class="card-header text-white text-center" >
            <h2>Suspect Information</h2>
        </div>
        <div class="card-body">
          <div class="row">
              @foreach($data as $item)
              <div class="col col-md-3 col-sm-12">
                  <div class="mb-3">
                      <div class="col-md-4 font-weight-bold">نوم:</div>
                      <div class="col-md-8">{{$item->name." ". $item->last_name}}</div>
                  </div>
              </div>
                  <div class="col col-md-3 col-sm-12">
                      <div class="mb-3">
                          <div class="col-md-4 font-weight-bold">یمیل:</div>
                          <div class="col-md-8">{{$item->email}}</div>
                      </div>
                  </div>
               <div class="col col-md-3 col-sm-12">
                      <div class="mb-3">
                          <div class="col-md-4 font-weight-bold">تلفن:</div>
                          <div class="col-md-8">{{$item->phone}}</div>
                      </div>
               </div>
               <div class="col col-md-3 col-sm-12">
                          <div class="mb-3">
                              <div class="col-md-4 font-weight-bold">ادرس اصلی:</div>
                              <div class="col-md-8">{{$item->actual_address}}</div>
                          </div>
              </div>
              @endforeach
          </div>
        </div>
    </div>
</div>
<div class="container mt-0">
    <form id="finger_form" method="POST" action="{{ route('store_finger_print') }}">
        @csrf
        <div class="form-group">
            <label hidden for="id">id</label>
            <input hidden type="text" class="form-control" name="id" id="id">
        </div>
        <div class="form-group">
            <label  for="LeftThumb">Left Thumb</label>
            <input  type="text" class="form-control" name="LeftThumb" id="LeftThumb">
            <textarea  type="text" class="form-control" name="Leftbmpbase64image" id="Leftbmpbase64image"></textarea>
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
                <p class="text-dark font-bold">ثبت بایو مترک یک مضنون</p>
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
                <button type="submit" onclick="document.getElementById('finger_form').submit()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </main>
</div>
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
                document.getElementById('Leftbmpbase64image').value = result.BMPBase64;
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
@endsection
