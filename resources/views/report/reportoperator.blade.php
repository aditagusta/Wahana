@extends('layouts.main')
@section('title') Operator @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Operator</h1>
</div>
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Operator</h6>
            <!-- Custom styles for this page -->
            <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
            <div class="text-left mt-3">
                <form action="{{ route('report.operator')}}" method="GET">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="date" name="date_start" value="{{ app('request')->input('date_start') }}"
                                class="form-control date_start" required>
                        </div>
                        <div class="col-md-1 text-center mt-2">
                            sampai
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="date_end" value="{{ app('request')->input('date_end') }}"
                                class="form-control date_end" required>
                        </div>
                        <div class="col-md-4 text-left">
                            <button type="submit" id="Search" value="search" class="btn btn-info" name="type">
                                <span class="fa fa-search"></span> Search
                            </button>
                            <button type="submit" id="Search" value="print" class="btn btn-success" name="type">
                                <span class="fa fa-print"></span> Print
                            </button>

                        </div>
                    </div>
                </form>
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
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Wahana</th>
                        <th>Operator</th>
                    </tr>
                </thead>
                <tbody class="hasil">
                    @foreach ($data as $no => $op)
                    <tr>
                        <td>{{$no +1}}</td>
                        <td>{{$op->date}}</td>
                        <td>{{$op->wahana_id}}</td>
                        <td>{{$op->staff_operator_nik}}</td>
                    </tr>
                    @endforeach
                </tbody>
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
