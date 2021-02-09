
@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("visitor_name").value = $(this).attr('data-visitor_name');
                document.getElementById("visitor_id").value = $(this).attr('data-visitor_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_pegawai', function (e) {
                document.getElementById("employee_nik").value = $(this).attr('data-employee_nik');
                document.getElementById("employee_name").value = $(this).attr('data-employee_name');
                $('#myModal2').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop


@extends('layouts.main')

@section('title') Top Up @endsection

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
          <input type="text" class="form-control"  id="id" name="id" value="{{$kode}}" readonly="readonly">
        </div>


        <div class="form-group">
          <label for="nama">Waktu</label>
          <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="waktu" value="{{ old('waktu')}}"required >
        </div>

         <div class="form-group">
          <label for="nama">Pengunjung</label>
          <div class="col-md-10">

          <div class="input-group">
          <input id="visitor_name" type="text" class="form-control" readonly="" required>
                   <input id="visitor_id" type="hidden" name="visitor" value="{{ old('visitor_id') }}" required readonly="">
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Buku</b> <span class="fa fa-search"></span></button>
                   </span>
              </div>
            </div>
          </div>


         <div class="form-group">
          <label for="nama">Jumlah</label>
          <input type="number" class="form-control"
          id="nama" placeholder="Rp." name="jumlah" value="{{ old('jumlah')}}"required >
        </div>

         <div class="form-group">
          <label for="nama">Pegawai</label>
          <input type="text" class="form-control"
          id="nama" placeholder="Masukkan Nama" name="pegawai" value="{{ old('pegawai')}}"required >
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>

        <a href="{{route('topup.index')}}" class="btn btn-light pull-right">Kembali</a>
                
  </div>

  </form>




  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
      
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Alamat</th>    
                                </tr>
                            </thead>
                              <tbody>
                                @foreach($visitor as $data)
                                <tr>
                                  <tr class="pilih" data-visitor_id="<?php echo $data->id; ?>" data-visitor_id="<?php echo $data->visitor_id; ?>" >
                              
                                    <td>{{$data->visitor_id}}</td>
                                    <td>{{$data->visitor_name}}</td>
                                    <td>{{$data->username}}</td>
                                    <td>{{$data->address}}</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

    
  </div>
 
    
@endsection


