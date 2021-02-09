@extends('layouts.main')
@section('title') Detail Pegawai @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Detail <b>{{ $employee->employee_name}}</b></h6>
</div>
      <div class="card-body">
      <div class="form-group">
      <label for="id" class="col-md-2 control-label" >NIK</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="id" 
            value="{{ $employee->employee_nik }}" readonly="">
      </div>
      <div class="form-group">
      <label for="nama" class="col-md-2 control-label" >Nama</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="nama" value="{{ $employee->employee_name}}" readonly="">
      </div>
      <div class="form-group">
      <label for="jenis_kelamin" class="col-md-2 control-label" >Jenis Kelamin</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="id" 
            value="{{ $employee->gender === 1 ? 'Laki - Laki' : 'Perempuan'}}" readonly="">
      </div>
      
     
      <div class="form-group">
      <label for="no_hp" class="col-md-2 control-label" >No HP</label>
      <div class="col-md-6">
         <input type="text" class="form-control" name="hp" 
            value="{{ $employee->phone }}" readonly="">
      </div>
      <div class="form-group">
         <label for="alamat" class="col-md-2 control-label" >Alamat</label>
         <div class="col-md-6">
            <input type="text" class="form-control" name="alamat" 
               value="{{ $employee->address}}" readonly="">
         </div>
         <div class="form-group">
            <label for="jabatan" class="col-md-2 control-label" >Jabatan</label>
            <div class="col-md-6">
               <input type="text" class="form-control" name="jabatan" 
                  value="{{ $employee->position_name }}" readonly="">
            </div>
         </div>
   
</div>
@endsection