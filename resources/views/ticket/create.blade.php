@extends('layouts.main')
@section('title') Tambah Tiket @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Form Tambah Tiket</h6>
</div>
<div class="card-body">
   <form method="POST" action="{{route('wahana.store')}}" enctype="multipart/form-data" >
      @csrf
      <div class="form-group">
         <label for="nama">ID</label>
         <input type="text" class="form-control"  id="id" name="id" value="{{$kode}}" readonly="readonly">
      </div>
      <div class="form-group">
         <label for="name">Nama</label>
         <input type="text" class="form-control" id="name" 
            placeholder="Masukkan Nama" name="name" value="{{ old('name')}}" required>
      </div>
      <div class="form-group">
         <label for="price">Tarif</label>
         <input type="number" class="form-control" id="price" 
            placeholder="Masukkan Tarif" name="price" value="{{ old('price') }}" required>
      </div>
      <div class="form-group">
         <label for="image">Gambar</label>
         <input type="file" class="form-control" id="image"
            placeholder="Masukkan Gambar" name="image"  value="{{ old('image') }}" 
            accept="image/*" required>   
      </div>
      
      
      <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>
@endsection