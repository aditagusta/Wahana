@extends('layouts.main')
@section('title') Tambah Jabatan @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
   <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Form Tambah Jabatan</h6>
</div>
<div class="card-body">
   <form method="POST" action="{{route('position.store')}}" enctype="multipart/form-data" >
      @csrf
      <div class="form-group">
         <label for="nama">ID</label>
         <input type="text" class="form-control"  id="id" name="id" value="@if($max->count()==0) KS1 @else KS{{$max->count()+1}} @endif " readonly="readonly">
         
         <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" 
               placeholder="Masukkan Nama" name="nama"  value="{{ old('nama')}}" required>
         </div>
      </div>
      <button type="submit" class="btn btn-primary">Tambah Data</button>
   </form>
</div>
@endsection