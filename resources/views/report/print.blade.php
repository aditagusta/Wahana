<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print - Report TopUp</title>
    <link href="{{ asset('bootstrap.min.css')}}" rel="stylesheet">
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
                        <center>
                            <h4><b><u>
                                        Laporan Top Up
                                    </u>
                                </b></h4>
                        </center>
                    </div>
                </div>
                <br>
                <div class="row mt-2 mb-2">
                    <div class="col-md-12">
                        <b>Tanggal : {{ date('d F Y',strtotime(app('request')->input('date_start'))) }} -
                            {{ date('d F Y',strtotime(app('request')->input('date_end'))) }}</b>
                    </div>
                </div>
                <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th width="75px">
                                <center>No</center>
                            </th>
                            <th>ID</th>
                            <th>Tanggal</th><!-- 
                            <th>Pengunjung</th> -->
                            <th>Jumlah</th>
                          <!--   <th>Kasir</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalkeseluruhan = 0;
                        @endphp
                        @foreach ($topup as $top)
                        <tr>
                            <th scope="row">
                                <center>{{$loop->iteration}}</center>
                            </th>
                            <td>{{$top->topup_id}}</td>
                            <td>{{$top->topup_date}}</td>
                          <!--   <td>{{$top->visitor->visitor_name}}</td> -->
                            <td>@currency($top->amount)</td>
                         <!--    <td>{{$top->employee->employee_name}}</td> -->

                        </tr>

                         @php
                        $totalkeseluruhan=$totalkeseluruhan+$top->amount;
                        @endphp
                        @endforeach
                    </tbody>
                     <tfoot>
                        <tr>
                            <td colspan="3">Total</td>
                            <td>@currency($totalkeseluruhan)</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="row">
                    <div class="col-md-4 offset-8 mt-5">
                        Payakumbuh, @php echo date('d F Y') @endphp
                        <br><br><br><br>
                        <b><u>{{ session()->get('name') }}</u></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>