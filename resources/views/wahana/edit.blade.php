@extends('layouts.main')
@section('title') Edit Tiket @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
<div class="card-header"> <h6 class="m-0 font-weight-bold text-primary">Edit <b>{{$wahana->wahana_name}}</b></h6>
</div>
<div class="card-body">
<form method="POST" action="{{route('wahana.update',$wahana->wahana_id)}}" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
      <label for="id">ID</label>
      <input type="text" class="form-control"  id="id" name="id" 
         value="{{$wahana->wahana_id}}"readonly>
   </div>
   <div class="form-group">
      <label for="name">Nama Wahana</label>
      <input type="text" class="form-control" id="name" 
         placeholder="Masukkan Nama" name="name"  value="{{$wahana->wahana_name}}" 
         required>
   </div>
   <div class="form-group">
      <label for="price">Tarif</label>
      <input type="number" class="form-control " id="price" name="price" 
         value="{{$wahana->price}}" required>
   </div>

   <div class="form-group">
         <label for="open_time">Jam Buka</label>
         <input type="time" class="form-control" id="open_time" 
            name="open_time" value="{{$wahana->open_time}}" required>
      </div>

     <div class="form-group">
         <label for="close_time">Jam Tutup</label>
         <input type="time" class="form-control" id="close_time" 
            name="close_time" value="{{$wahana->close_time}}" required>
      </div>

   <div class="form-group">
      <label for="image">Gambar</label>
      <input type="file" class="form-control" id="image"
         placeholder="Masukkan Gambar" name="image"  value="{{ old('image') }}" accept="image/*" required>
   </div>

  <div class="form-group">
      <label for="status">Status</label>
         <select class="form-control" name="status" required="">
            <option value=""disabled selected>-Pilih-</option>
            <option value="1">Buka</option>
            <option value="0">Tutup</option>
         </select>
         <script>
            document.getElementsByName("status")[0].value = "{{ $wahana->status}}";
       </script>
    </div>
   
   <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
@endsection