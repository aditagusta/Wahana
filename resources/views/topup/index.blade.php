@extends('layouts.main')
@section('title') Top Up @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--    <h1 class="h3 mb-0 text-gray-800">Top Up</h1> -->
</div>
@endsection
@section('content')
<div class="card shadow mb-4">
   <div class="card-header">
      <div class="">
         <h6 class="m-0 font-weight-bold text-primary">Data Top Up</h6>
         <!-- Custom styles for this page -->
         <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
         <div class="text-right">
            <a href="{{url('/topup/create')}}" class="btn btn-primary">Isi Topup</a>
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
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>Pengunjung</th>
                  <th>Jumlah</th>
                  <th>Kasir</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($topup as $top)
               <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$top->topup_id}}</td>
                  <td>{{$top->topup_date}}</td>
                  <td>{{$top->visitor->visitor_name}}</td>
                  <td>@currency($top->amount)</td>
                  <td>{{$top->employee->employee_name}}</td>
                  <td>
                     <a href="{{ route('topup.print', ['id'=>$top->topup_id]) }}"
                        class="btn btn-primary btn-sm d-inline" target="_blank"><i class="fas fa-eye"></i> </a>
                     <form class="d-inline" action="{{ route('topup.destroy',$top->topup_id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit"
                           onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                           <i class="fas fa-trash-alt"></i>
                        </button>
                     </form>
                  </td>
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