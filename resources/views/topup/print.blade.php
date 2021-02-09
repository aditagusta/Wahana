<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link href="{{ asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body>
	 <div class="container text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 mt-4">

                    </div>
                    <div class="col-md-8">
                         <center>
                            <br><br>
                            <h2>Kampung Sarosah</h2>
                            <h5><b>Jorong Lubuak Limpato, Kenagarian Tarantang, Kecamatan Harau</b></h5>
                            <span><span class="fa fa-envelope"></span> Lembah Harau
                                <span class="fa fa-phone"></span> HP.
                                081360813344</span>
                        </center>
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="col-12">
                        <hr style="border-top:4px double black">
                        <br>


                        <table style="width: 100%;">
                        	<tr>
                        		<td>ID</td>
                        		<td>:</td>
			                  	<td>{{$topup->topup_id}}</td>
                        	</tr>
                        	<tr>
                        		<td>Tanggal</td>
                        		<td>:</td>
                        		<td>{{$topup->topup_date}}</td>
			                </tr>
			                <tr>
			                	<td>Pengunjung</td>
                        		<td>:</td>
			                 	<td>{{$topup->visitor->visitor_name}}</td>
			                </tr>
			                <tr>
			                	<td>Jumlah Top Up</td>
                        		<td>:</td>
			                  	<td>@currency($topup->amount)</td>
                        	</tr>
                        </table>

                        <div style="float: right;width: 300px; text-align: center;margin-top: 20px;">
                        	<b>Kasir</b>
                        	<br>
                        	<br>
                        	<br>
			                <b>{{$topup->employee->employee_name}}</b>
                        </div>
                        <div style="clear: both;"></div>

                    </div>
                </div>
			<br>
			</div>
		</div>
	</div>
</body>

</html>