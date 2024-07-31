
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SS3 Enroll - WebAPI1toN</title>
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/site.css?v=boBscZWmSLQe9ieEeOMLzkfT5nmP5Y2ak4N9hiwfaNs" />
    <link rel="stylesheet" href="/WebAPI1toN.styles.css?v=mbcQeS2QCoSFGR9cI2BD0hJyoIppbWpaEm_R-krL6sg" />
</head>
<body>
    <header>
        <nav b-0djn6vwlji class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div b-0djn6vwlji class="container-fluid">
                <a class="navbar-brand" href="/">Demo Home</a>
                <button b-0djn6vwlji class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span b-0djn6vwlji class="navbar-toggler-icon"></span>
                </button>
                <div b-0djn6vwlji class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul b-0djn6vwlji class="navbar-nav flex-grow-1">
                        <li b-0djn6vwlji class="nav-item">
                            <a class="nav-link text-dark" href="/docs/SECUGEN_WEB_SERVICE_API_DOC.pdf" target="_blank" rel="noreferrer">WebAPI1:N Doc</a>
                        </li>
                        <li b-0djn6vwlji class="nav-item">
                            <a class="nav-link text-dark" href="/Pages/Downloads">Downloads</a>
                        </li>
                        <li b-0djn6vwlji class="nav-item">
                            <a class="nav-link text-dark" href="/Pages/SingleScan">Simple Scan</a>
                        </li>
                        <li b-0djn6vwlji class="nav-item">
                            <a class="nav-link text-dark" href="/Pages/AdvancedScan">Advanced Scan</a>
                        </li>
                        <li b-0djn6vwlji class="nav-item">
                            <a class="nav-link text-dark" href="/WebAPI1toN/Enroll">WebAPI 1:N</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div b-0djn6vwlji style="text-indent: 50px;"><h1 b-0djn6vwlji><b b-0djn6vwlji>WebAPI 1:N</b></h1></div>
    <div b-0djn6vwlji class="container">
        <main b-0djn6vwlji role="main" class="pb-3">
            <!DOCTYPE html>
<html>
    <head>
        <h4><b>Demonstration of 1:N Matching</b></h4>
    </head>

    <body>
        <div class="row">
            <div class="col-md-10">
                <p style="margin-left: 30px; text-indent:-30px">
                    This demo requires 2 steps to run:<br>
                    Step 1:  Enroll fingerprint templates to the in-memory database<br>
                    Step 2:  Search the database using 1:N matching<br>
                </p>
                <p>
                    <strong>Step 1:</strong> Place a finger on the sensor and click "Click to Scan".  Repeat with additional fingerprint to build up the database.  A session ID will be automatically assigned for this group.  After you have enrolled enough fingerprint templates in the database, proceed to step 2.
                </p>
                <p>
                    Note that if you refresh this page, the current session and all enrolled templates associated with it will be deleted from memory.  You will need to re-enroll again.
                </p>
                <br />
                <p>
                    <strong>Step 2:</strong> Click on "Search DB" to demo 1:N matching against the database for this session ID.
                </p>
                    <div class="row-md-10">
                        <tr align="left">
                            <td class="auto-style-2">
                             <p><b>Search in memory DB</b>
                             <td>&nbsp;</td><input id="SearchTemplates" type="button"  value="Step #2: Search DB" disabled=true
                                 onclick="location.href=&#x27;/WebAPI1toN/Search?sessionid=&#x27; &#x2B; document.getElementById(&#x27;sessioninfo&#x27;).value"/>
                             </p>
                             </td>
                        </tr>
                        <tr>
                            <p>
                            <td>
                                <b>Session ID</b>
                            </td>
                             <td>
                                 <textarea id="sessioninfo" valign="middle" rows="1" cols="20" readOnly="true" style="resize:none">0</textarea>
                             </td>
                             </p>
                        </tr>
                    </div>
                    <hr>
                    <div class="row-md-10">
                        <h2><b>Step #1:  Enrollment</b></h2>
                    </div>
                <div class="row">
                    <table id="Enroll" width="1012" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tbody>
                        <div>
                        <tr>
                            <td class="auto-style2" valign="top">&nbsp;</td>
                            <td><h3><b>Finger #1</b></h3></td>
                            <td class="auto-style2" valign="top">&nbsp;</td>
                            <td class="style3">
                                <input id="submit0" type="submit" value="Click to Scan" onclick="CallSGIFPGetData(SuccessFunc, ErrorFunc)">
                            </td>
                            <td>&nbsp;</td>
                            <td><textarea id="template0" rows="8" cols="50" readOnly="true" style="resize:none">Template Data</textarea></td>
                            <td>&nbsp;</td>
                            <td class="style3">
                                <img id="FPImage0" height=300 width=210 src='/Images/PlaceFinger.bmp'> <br>
                            </td>
                            <br>
                        </tr>
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script type-"text/javascript">
    var templateCount = 0;

    function SuccessFunc(result) {
        if (result.ErrorCode == 0) {
            /* 	Display BMP data in image tag
                BMP data is in base 64 format
            */

            if (result != null && result.BMPBase64.length > 0) {
                document.getElementById("FPImage" + templateCount).src = "data:image/bmp;base64," + result.BMPBase64;
            }
            //  display template data on edit control box
            document.getElementById("template" + templateCount).value = result.TemplateBase64;
            // Generate next entry to receive template/image from user
            generate_table();
            // disable the row of the submit button
            document.getElementById("submit" + templateCount).disabled = true;
            // enable the button to allow user to go to build/store templates in SS3
            document.getElementById("SearchTemplates").disabled = false;

            var templatedata = {
                 'userid': (templateCount + 1)      // We want results to be 1 based; easy for user to understand
                 , 'isotemplatebase64':result.TemplateBase64
                 , 'bmpbase64image':result.BMPBase64
                 , 'sessionid':document.getElementById("sessioninfo").value
               };

            // View data, must use JSON.stringify(...)
            // alert("Fingerprint Template:" + JSON.stringify(templatedata));

            $.ajax({
                method: 'POST',
                url: '/WebAPI1toN/Register',
                data: templatedata,
                success: function(response) {
                    document.getElementById("sessioninfo").value = response.strSessionID;
                    if (response.bRegister == "false")
                    {
                        document.getElementById("template" + templateCount).value = response.error;
                    }
                },
                failure: function (response) {
                   alert("FAILURE...." + response.error);
                },
                error: function (response) {
                   alert("ERROR...." + response.error);
                }
            });

            templateCount++;
        }
        else {
            alert("Fingerprint Capture Error Code:  " + result.ErrorCode + ".\nDescription:  " + ErrorCodeToString(result.ErrorCode) + ".");
        }
    }

    function ErrorFunc(status) {
        /*
            If you reach here, user is probabaly not running the
            service. Redirect the user to a page where he can download the
            executable and install it.
        */
        alert("Check if SGIBIOSRV is running; status = " + status + ":");
    }

    function CallSGIFPGetData(successCall, failCall) {
        var uri = "https://localhost:8443/SGIFPCapture";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                fpobject = JSON.parse(xmlhttp.responseText);
                successCall(fpobject);
            }
            else if (xmlhttp.status == 404) {
                failCall(xmlhttp.status)
            }
        }
        xmlhttp.onerror = function () {
            failCall(xmlhttp.status);
        }
        var params = "Timeout=" + "10000";
        params += "&Quality=" + "50";
        params += "&licstr=" + encodeURIComponent(secugen_lic);
        params += "&templateFormat=" + "ISO";
        xmlhttp.open("POST", uri, true);
        xmlhttp.send(params);
    }

    function generate_table() {
        // creates a <table> element and a <tbody> element

        var preprepreRowLeader = document.createElement("div");

        var prepreRowLeader = document.createElement("div");
        prepreRowLeader.setAttribute("class", "col-md-10");

        var preRowLeader = document.createElement("div");
        preRowLeader.setAttribute("align", "center");

        // padding-left: 20px;
        var tbl = document.createElement("table");
        tbl.setAttribute("id", "Enroll" + templateCount);
        tbl.setAttribute("width", "1012");
        tbl.setAttribute("border", "0");
        tbl.setAttribute("align", "center");
        tbl.setAttribute("cellpadding", "0");
        tbl.setAttribute("cellspacing", "0");
        const tblBody = document.createElement("tbody");
        var div4 = document.createElement("div");

        // creates a table row
        row = document.createElement("tr");

        var cellRowLeader = document.createElement("td");
        cellRowLeader.setAttribute("class", "auto-style2");
        cellRowLeader.setAttribute("valign", "top");
        var cellBlankText0 = document.createTextNode("\u00A0"); //&nbsp
        cellRowLeader.appendChild(cellBlankText0);
        row.appendChild(cellRowLeader);

        var cellRowCount = document.createElement("td");
        var cellRowCountH = document.createElement("h3");
        var cellRowCountB = document.createElement("b");
        var cellRowCounter = document.createTextNode("Finger #" + (templateCount + 2));
        cellRowCountB.appendChild(cellRowCounter);
        cellRowCountH.appendChild(cellRowCountB);
        cellRowCount.appendChild(cellRowCountH);
        row.appendChild(cellRowCount);

        var celltd1 = document.createElement("td");
        celltd1.setAttribute("class", "auto-style2");
        celltd1.setAttribute("valign", "top");
        var cellBlankText1 = document.createTextNode("\u00A0");  //&nbsp;
        celltd1.appendChild(cellBlankText1);
        row.appendChild(celltd1);

        var celltd2 = document.createElement("td");
        celltd2.setAttribute("class", "style3");
        var cellSubmitButton = document.createElement("input");
        cellSubmitButton.setAttribute("id", "submit" + (templateCount + 1));
        cellSubmitButton.setAttribute("type", "submit");
        cellSubmitButton.setAttribute("value", "Click to Scan");
        cellSubmitButton.setAttribute("onclick", "CallSGIFPGetData(SuccessFunc, ErrorFunc)");
        celltd2.appendChild(cellSubmitButton);
        row.appendChild(celltd2);

        var celltd3 = document.createElement("td");
        var cellBlankText3 = document.createTextNode("\u00A0");  //&nbsp;
        celltd3.appendChild(cellBlankText3);
        row.appendChild(celltd3);

        var celltd4 = document.createElement("td");
        var cellTemplate = document.createElement("textarea");
        cellTemplate.setAttribute("id", "template" + (templateCount + 1));
        cellTemplate.setAttribute("rows", "8");
        cellTemplate.setAttribute("cols", "50");
        cellTemplate.setAttribute("readOnly", "true");
        cellTemplate.setAttribute("style", "resize:none");
        var cellData = document.createTextNode("Template Data");
        cellTemplate.appendChild(cellData);
        celltd4.appendChild(cellTemplate);
        row.appendChild(celltd4);

        var celltd5 = document.createElement("td");
        var cellBlankText5 = document.createTextNode("\u00A0");  //&nbsp;
        celltd5.appendChild(cellBlankText5);
        row.appendChild(celltd5);

        var celltd6 = document.createElement("td");
        celltd6.setAttribute("class", "style3");
        var span6 = document.createElement("span");
        span6.setAttribute("class", "download_href");
        var cellImage = document.createElement("img");
        cellImage.setAttribute("id", "FPImage" + (templateCount + 1));
        cellImage.setAttribute("height", "300");
        cellImage.setAttribute("width", "210");
        cellImage.setAttribute("align", "center");
        cellImage.setAttribute("src", '/Images/PlaceFinger.bmp');
        span6.appendChild(cellImage);
        celltd6.appendChild(span6);
        row.appendChild(celltd6);

        // add the row to the end of the table body
        tblBody.appendChild(row);

        div4.appendChild(tblBody);
        tbl.appendChild(div4);

        preRowLeader.appendChild(tbl);
        prepreRowLeader.appendChild(preRowLeader);
        preprepreRowLeader.appendChild(prepreRowLeader);

        // put the <tbody> in the <table>
        document.body.appendChild(preprepreRowLeader);
        // sets the border attribute of tbl to '2'
        //tbl.setAttribute("border", "2");
    }

    </script>
</html>
        </main>
    </div>

    <footer b-0djn6vwlji class="border-top footer text-muted">
        <div b-0djn6vwlji class="container">
            @ 2024 - SecuGen Corporation - WebAPI1:N
        </div>
    </footer>
    <script src="{{asset('dist/js/jquery .js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.bundle.js')}}"></script>
    <script src="/js/site.js?v=4q1jwFhaPaZgr8WAUSrux6hAuh0XDg9kPS3xIVq36I0"></script>


    <script type="text/javascript">
    // nice global area, so that only 1 location, contains this information
    // var secugen_lic = "en/9UJMJtG3Ve1kFNPnylLoEvzqjF8x5ozFGfJbPt3lm//O4o9VhA9GPfyJsczVh";   // webapi-1-n.secugen.com
    var secugen_lic = "";

    function ErrorCodeToString(ErrorCode) {
        var Description;
        switch (ErrorCode) {
            // 0 - 999 - Comes from SgFplib.h
            // 1,000 - 9,999 - SGIBioSrv errors
            // 10,000 - 99,999 license errors
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
    </script>

</body>
</html>
