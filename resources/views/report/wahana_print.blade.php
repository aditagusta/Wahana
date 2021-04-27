<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print - Laporan Wahana</title>
    <link href="{{ asset('bootstrap.min.css')}}" rel="stylesheet">
</head>

<body onLoad='javascript:window:print()'>
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
                                        Laporan Wahana
                                    </u>
                                </b></h4>
                        </center>
                    </div>
                </div>
                <br>
                <div class="row mt-2 mb-2">
                    <div class="col-md-12">
                        <b>Tanggal : {{ date('d F Y',strtotime(app('request')->input('date_start'))) }}</b>
                    </div>
                </div>
                <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th width="75px">
                                <center>No</center>
                            </th>
                            <th>Nama Wahana</th>
                            <th>Nama Staff Loket</th>
                            <th>Nama Staff Operator</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td>{{$item['wahana_name']}}</td>
                            <td>
                                <?php
                                        $sch = DB::table('schedule')
                                                ->join('employees', 'schedule.staff_loket_nik', 'employees.employee_nik')
                                                ->where('schedule.date', [$_GET['date_start']])
                                                ->where('wahana_id', $item['wahana_id'])
                                                ->get();
                                ?>

                                <ul>
                                    @foreach ($sch as $sc)
                                    <li>{{$sc->employee_name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <?php
                                    $opr = DB::table('staff_operators')
                                    ->join('employees', 'staff_operators.staff_operator_nik', 'employees.employee_nik')
                                    ->where('staff_operators.date', [$_GET['date_start']])
                                    ->where('wahana_id', $item['wahana_id'])
                                    ->get();
                            ?>
                                <ul>
                                    @foreach ($opr as $sc)
                                    <li>{{$sc->employee_name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-4 offset-8 mt-5">
                        Payakumbuh, @php echo date('d F Y') @endphp
                        <br><br><br><br>
                        <b><u>{{ session()->get('employee_name') }}</u></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
