@extends('layouts.main')
@section('title') Isi Top Up @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
   <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Top Up</h6>
   </div>
   <div class="card-body">
      <form method="POST" action="{{route('topup.store')}}" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="nama">ID</label>
            <input type="text" class="form-control"  id="id" name="id" value="{{$kode}}" readonly >
         </div>
         
         <div class="form-group">
            <label for="visitor">Pengunjung</label>
            <div class="row">
               <div class="col-8">
                  <input type="text" id="visitor_id" name="visitor_id" hidden class="form-control" readonly="" name="">
                  <input type="text" id="visitor_name" name="visitor_name" class="form-control"  name="">
               </div>
               <div class="col-4 p-0">
                  <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Pengunjung</b> <span class="fa fa-search"></span></button>
               </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
               <div class="modal-dialog modal-xl" role="document" >
                  <div class="modal-content" style="background: #fff;">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cari Pengunjung</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <table id="dataTable" class="table table-bordered table-hover table-striped">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Nama</th>
                                 <th>Jenis Kelamin</th>
                                 <th>Username</th>
                                 <th>Alamat</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($visitor as $dataVisitor)
                              <tr class="pilih" data-visitor_id="{{$dataVisitor->visitor_id}}" 
                                data-visitor_name="{{ $dataVisitor->visitor_name }}">
                                 <td>{{$dataVisitor->visitor_id}}</td>
                                 <td>{{$dataVisitor->visitor_name}}</td>
                                 <td>
                                  @if($dataVisitor->gender == 1)
                                       Laki-Laki
                                       @else
                                       Perempuan
                                       @endif</td>
                                 <td>{{$dataVisitor->username}}</td>
                                 <td>{{$dataVisitor->address}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            @foreach($employee as $dataE)
            @if(session()->get('id_position') == 'KS3' OR session()->get('id_position') == 'KS2') 
            <input type="text" value="{{ session()->get('employee_nik') }}" name="pegawai" hidden readonly="">            
            @endif
            @endforeach
         </div>
         <div class="form-group">
            <label for="amount">Jumlah</label>
            <input type="number" class="form-control" id="amount" placeholder="Masukkan Jumlah" name="amount"  
               value="{{ old('amount') }}"required>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
         
   </div>
   </form>
</div>

    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('/js/demo/datatables-demo.js')}}"></script>
    <script type="text/javascript">
       $(document).on('click', '.pilih', function () {
                    document.getElementById("visitor_name").value = $(this).attr('data-visitor_name');
                    document.getElementById("visitor_id").value = $(this).attr('data-visitor_id');
                    $('#myModal').modal('hide');
                }); 
    </script>
    
@endsection