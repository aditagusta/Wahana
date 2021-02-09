@extends('layouts.main')
@section('title') Riwayat Perbaikan @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
   <div class="card-header">
      <div class="">
         <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Perbaikan</h6>
         <!-- Custom styles for this page -->
         <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
         </head>
         <div class="text-right">
            <a href="{{url('/repair/create')}}" class="btn btn-primary btn-rounded"> 
            <i class="fa fa-plus"></i> Tambah Riwayat Perbaikan</a>
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
                  <th scope="col">#</th>
                  <th>ID</th>
                  <th>Nama Alat</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal Akhir</th>
                  <th>Ket</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($repair as $repaired)
               <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$repaired->repair_id}}</td>
                  <td>{{$repaired->tools->tool_name}}</td>
                  <td>{{$repaired->date_start}}</td>
                  <td>{{$repaired->date_end}}</td>
                  <td>{{$repaired->ket}}</td>

                  </td>
                  <td>
                     <!-- <a href="{{route('repair.show',$repaired->repair_id)}}"
                        class="btn btn-primary btn-sm d-inline"><i class="fas fa-eye"></i> </a>   -->
                     <a href="{{route('repair.edit',$repaired->repair_id)}}" 
                        class="btn btn-success btn-sm d-inline"><i class="fas fa-edit"></i> </a>
                     <form class="d-inline" action="{{ route('repair.destroy',$repaired->repair_id)}}" 
                        method="post">
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