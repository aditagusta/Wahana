@extends('layouts.main')
@section('title') Schedule @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="">
            <h6 class="m-0 font-weight-bold text-primary">Data Schedule</h6>
            <!-- Custom styles for this page -->
            <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
            </head>
            <div class="text-right">
                <a href="{{route('create_schedule')}}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-plus"></i> Tambah Schedule</a>
                @if (session('Status'))
                <div class="alert alert-success">
                    {{ session('Status') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Wahana</th>
                        <th>Staff Loket</th>
                        <th>Staff Operator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedule as $no =>$item)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->wahana_name}}</td>
                        <td>{{$item->employee_name}}</td>
                        <td>
                            @php
                            $data_operator = DB::table('staff_operators')->leftJoin('employees',
                            'staff_operators.staff_operator_nik', 'employees.employee_nik')->where('date',
                            $item->date)->where('wahana_id', $item->wahana_id)->get();
                            @endphp
                            @foreach ($data_operator as $dt)
                            <li>{{$dt->employee_name}}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{url('deleteschedule'. "/" . $item->date . "/" . $item->wahana_id)}}"
                                class="btn btn-sm btn-danger">Hapus</a> |
                            <a href="{{url('editschedule'. "/" . $item->date."/" . $item->wahana_id)}}"
                                class="btn btn-sm btn-warning">Edit</a>

                            <button type="button" class="btn btn-sm btn-success"
                                onclick="tekan('{{$item->date}}','{{$item->wahana_id}}')">Tambah Operator</button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="opr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('addoperator')}}" method="POST">
                                        @csrf
                                        <input type="date" id="date" name="date_">
                                        <input type="text" id="id" name="wahana_">
                                        <div class="row">

                                            @foreach ($operator as $opr)
                                            <div class="col-sm-2">
                                                <input type="checkbox" name="nama[]"
                                                    value="{{$opr->employee_nik}}">&nbsp&nbsp&nbsp{{$opr->employee_name}}
                                            </div>
                                            @endforeach
                                        </div>

                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>

                <!-- Bootstrap core JavaScript-->
                <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
                <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                <!-- Core plugin JavaScript-->
                <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
                <!-- Custom scripts for all pages-->
                <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
                <!-- Page level plugins -->
                <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
                <!-- Page level custom scripts -->
                <script src="{{asset('/js/demo/datatables-demo.js')}}"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
                    integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
                    crossorigin="anonymous"></script>
                <script>
                    function tekan(date,id)
                    {
                        $('#date').val(date)
                        $('#id').val(id)
                        axios.post("{{url('/api/operator')}}",{
                            'date':date,
                            'wahana_id':id
                        }).then(function(res){
                            var cek = res.data;
                            if(cek != ''){
                                var list_opr = document.getElementsByName("nama[]");
                                console.log(cek[0].staff_operator_nik);
                                // console.log(list_opr.length);
                                // reset centang opr
                                for (var x = 0; x < list_opr.length; x++) {
                                    list_opr[x].checked = false;
                                }
                                for (var x = 0; x < list_opr.length; x++) {
                                    for (var i = 0; i < cek.length; i++) {
                                        console.log(cek[i].staff_operator_nik);
                                        if (list_opr[x].value == cek[i].staff_operator_nik) {
                                            list_opr[x].checked = true;
                                        }
                                    }
                                }
                            }else{
                                var list_opr = document.getElementsByName("nama[]");
                                // reset centang opr
                                for (var x = 0; x < list_opr.length; x++) {
                                    list_opr[x].checked = false;
                                }
                            }
                            $('#opr').modal()
                        })
                    }
                </script>
            </table>
        </div>
    </div>
</div>
@endsection
