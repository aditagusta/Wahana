@extends('layouts.main')
@section('title') Jabatan @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header">
      <div class="">
         <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
         <div class="text-right">
            <!-- Custom styles for this page -->
            <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
            <a href="{{url('/position/create')}}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Jabatan</a>
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
                  <th scope="col">ID</th>
                  <th>Jabatan</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($position as $pst)
               <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$pst->position_id}}</td>
                  <td>{{$pst->position_name}}</td>
                  <td>
                     <a href="{{route('position.edit',$pst->position_id)}}" class="btn btn-success btn-sm">
                     <i class="fas fa-edit"></i> </a>
                     <form class="d-inline" action="{{ route('position.destroy',$pst->position_id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">  <i class="fas fa-trash-alt"></i>
                        </button>
                     </form>
                  </td>
                  </form>
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
      </div>
   </div>
</div>
@endsection