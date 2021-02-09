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
                        <th>Staff Operator</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedule as $no =>$item)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->wahana_id}}</td>
                        <td>{{$item->staff_loket_nik}}</td>
                        <td><a href="{{url('deleteschedule'. "/" . $item->date . "/" . $item->wahana_id . "/" . $item->staff_loket_nik)}}"
                                class="btn btn-sm btn-danger">Hapus</a> |
                            <a href="{{url('editschedule'. "/" . $item->date)}}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <!-- Bootstrap core JavaScript-->
                <!--      <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script> -->
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
            </table>
        </div>
    </div>
</div>
@endsection
