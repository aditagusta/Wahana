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
      <h6 class="m-0 font-weight-bold text-primary">Data Kategori Tiket</h6>
      <!-- Custom styles for this page -->
      <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
      </head>
      <div class="text-right">
         <a href="{{url('/wahana/create')}}" class="btn btn-primary btn-rounded"> 
         <i class="fa fa-plus"></i> Tambah Tiket</a>
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
         <th>Nama</th>
         <th>Tarif</th>
         <th>Gambar</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($wahana as $tkt)
      <tr>
         <th scope="row">{{$loop->iteration}}</th>
         <td>{{$tkt->wahana_id}}</td>
         <td>{{$tkt->wahana_name}}</td>
         <td>@currency($tkt->price)</td>
         <td>
            <a href="{{url('image/'.$tkt->image)}}">{{$tkt->image}}</a>
         </td>
         
         <form method="POST" action="{{route('wahana.destroy', $tkt->wahana_id)}}">
            @csrf
            @method('DELETE')
            <td> 
               <a href="{{route('wahana.show',$tkt->wahana_id)}}" class="btn  btn-primary btn-sm d-inline"><i class="fas fa-eye"></i> </a>  
               <a href="{{route('wahana.edit',$tkt->wahana_id)}}" class="btn  btn-success btn-sm d-inline"><i class="fas fa-edit"></i> </a>
               <button href=
                  "{{route('wahana.destroy',$tkt->wahana_id)}}" class="btn  btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> 
               <i class="fas fa-trash-alt"></i>
               </button>
            </td>
         </form>
      </tr>
      @endforeach
   </tbody>
</table>
   <!-- Bootstrap core JavaScript-->
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
@endsection