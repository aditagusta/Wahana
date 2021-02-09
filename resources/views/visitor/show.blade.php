@extends('layouts.main')
@section('title') Detail Pengunjung @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Detail <b>{{$visitor->visitor_name}}</b></h6>
   <div class="text-right">
    <a href="{{ url('visitor/cetak/qr/'.$visitor->visitor_id) }}" class="btn btn-success"  style="text-align: right;">
       <span class="fa fa-print"></span> Print
    </a>
    </div>
</div>

<div class="card-body">
    

       <div class="form-group">
         <label for="address" class="col-md-2 control-label" >QR Code</label>
         <div class="col-md-6">
            <div id="qrcode"></div>
            <script type="text/javascript">
            new QRCode(document.getElementById("qrcode"), {
                text:  "{{ $visitor->visitor_id }}",
                width: 150,
                height: 150,
               });
            </script>
         </div>
      </div>

      <div class="form-group">
      <label for="nama" class="col-md-2 control-label" >Username</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="username"
            value="{{ $visitor->username}}" readonly="">
      </div>
      <div class="form-group">
      <label for="address" class="col-md-2 control-label" >Jenis Kelamin</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="address" 
            value="{{ $visitor->gender === 'L' ? 'Laki - Laki' : 'Perempuan'}}"readonly="">
      </div>
      <div class="form-group">
      <label for="address" class="col-md-2 control-label" >Alamat</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="address" 
            value="{{ $visitor->address}}" readonly="">
      </div>

     <!--  <div class="form-group">
      <label for="address" class="col-md-2 control-label" >Email</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="email" 
            value="{{ $visitor->username}}" readonly="">
      </div>
 -->
   <!--    <div class="form-group">
         <label for="address" class="col-md-2 control-label" >Tanggal Registrasi</label>
         <div class="col-md-6">
            <input type="text" class="form-control" name="address" 
               value="{{ $visitor->register_date}}" readonly="">
         </div>
      </div> -->
      
      </div>
@endsection