@extends('layouts.main')
@section('title') Edit Jabatan @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Form Edit Jabatan</h6>
</div>
<div class="card-body">
<form method="POST" action="{{route('position.update', $position->position_id)}}">
   @csrf
   <div class="form-group">
      <label for="nama">ID</label>
      <input type="text" class="form-control"  id="id" 
         name="nama" value="{{$position->position_id}}" readonly>
      <div class="form-group">
         <label for="nama">Nama</label>
         <input type="text" class="form-control" id="nama" 
            placeholder="Masukkan Nama" name="nama"  value="{{$position->position_name}}"required>
      </div>
   </div>
   <button type="submit" class="btn btn-primary">Simpan Data</button>
</form>
@endsection