@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@extends('layouts.main')
@section('title') Tiket @endsection
@section('content')
<div class="card shadow mb-4">
<div class="card-header">
   <div class="">
      <h6 class="m-0 font-weight-bold text-primary">User</h6>
      <!-- Custom styles for this page -->
      <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
      </head>
      <div class="text-right">
         <a href="{{ route('usercreate')}}" class="btn btn-primary btn-rounded"> 
         <i class="fa fa-plus"></i> Tambah User</a>
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
         <th>Nama</th>
         <th>Email</th>
         <th>Level</th>
      </tr>
   </thead>
   <tbody>
      @php $no=1; @endphp
      @foreach ($user as $dataUser)
      <tr>
         <td>{{$no++}}</td>
         <td>{{$dataUser->name}}</td>
         <td>{{$dataUser->email}}</td>
         <td>
            @if($dataUser->level == 1)
            Admin
            @elseif($dataUser->level == 2)
            Manajer
            @elseif($dataUser->level == 3)
            Kasir
            @else
            Pengunjung
            @endif
         </td>
      </tr>
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
</table>
@endsection