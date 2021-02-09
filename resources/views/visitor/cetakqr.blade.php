
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="{{ asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/qrcode.min.js')}}"></script>
    <style>
        table td, table td * {
            vertical-align: top;
        }
    </style>
</head>

<body style="border: 1px solid black; padding: 10px; margin: 10px;">
     <div class="container text-dark">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <table style="width: 100%;">
                            <tr>
                                <td rowspan="5">
                                    <div id="qrcode"></div>
                                    <script type="text/javascript">
                                    new QRCode(document.getElementById("qrcode"), {
                                        text:  "{{ $visitor->visitor_id }}",
                                        width: 300,
                                        height: 300,
                                       });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <center>
                                        <br><br>
                                        <h1>Kampung Sarosah</h1>
                                        <h3><b>Lembah Harau</b></h3>
                                        <span><span class="fa fa-envelope"></span> E-mail : kampungsarosah@gmail.com,
                                            <span class="fa fa-phone"></span> phone :
                                            081122334455</span>
                                    </center>
                                </td>
                            </tr>
                             <tr>
                                <td style="text-align: left;">
                                    Nama
                                </td>
                                <td style="width: 5px; ">:</td>
                                <td style="text-align: left;">{{ $visitor->username }}</td>
                            </tr>

                            <tr>
                                <td style="text-align: left;">
                                    Email
                                </td>
                                <td style="width: 5px; ">:</td>
                                <td style="text-align: left;">{{ $visitor->address}}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; width: 100px;">
                                    Registrasi
                                </td>
                                <td style="width: 5px; ">:</td>
                                <td style="text-align: left;">{{ $visitor->register_date}}</td>
                            </tr>
                        </table>


                    </div>
                </div>
            <br>
            </div>
        </div>
    </div>
</body>

</html>