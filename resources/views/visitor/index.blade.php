@extends('layouts.main')
@section('title') Pengunjung @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="card shadow mb-4">
   <div class="card-header">
      <div class="">
         <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung</h6>
         <div class="text-right">
            <!-- Custom styles for this page -->
            <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
            <a href="{{url('/visitor/create')}}" class="btn btn-primary">
               <i class="fa fa-plus"></i> Tambah Data</a>
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
                  <th> ID</th>
                  <th>Nama </th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Saldo</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($visitor as $vst)
               <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  
                  <td>{{$vst->visitor_id}}</td>
                  <td>{{$vst->visitor_name}}</td>
                  <td>
                     @if($vst->gender == 1)
                     Laki-Laki
                     @else
                     Perempuan
                     @endif
                  </td>
                  <td>{{$vst->address}}</td>
                
                  <td>@currency($vst->saldo)</td>
                  <td>
                     @if($vst->status == 1)
                     Aktif
                     @else
                     Tidak Aktif
                     @endif
                  </td>

                  <form method="POST" action="{{route('visitor.destroy', $vst->visitor_id)}}">
                     @csrf
                     @method('DELETE')
                     <td>
                        <a href="{{route('visitor.show',$vst->visitor_id)}}" class="btn btn-primary btn-sm d-inline"><i
                              class="fas fa-eye"></i> </a>
                        <a href="{{route('visitor.edit',$vst->visitor_id)}}" class="btn btn-success btn-sm d-inline"><i
                              class="fas fa-edit"></i> </a>
                        <button class="btn btn-danger btn-sm" type="submit"
                           onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i
                              class="fas fa-trash-alt"></i></button>
                     </td>
                  </form>
               </tr>
               @endforeach
            </tbody>
            <!-- Bootstrap core JavaScript-->
           <!--  <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script> -->
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