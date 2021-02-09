@extends('layouts.main')
@section('title') Edit Pengunjung @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Edit <b>{{$visitor->visitor_name}}</b></h6>
</div>
<div class="card-body">
<form method="POST" action="{{route('visitor.update', $visitor->visitor_id)}}">
   @csrf
   @method('put')
   
   <input type="hidden" name="id" value="{{$visitor->visitor_id}}" readonly>
   
   <div class="form-group">
      <label for="name">Nama</label>
      <input type="text" class="form-control" id="nama" name="name"  
         value="{{$visitor->visitor_name}}" required>
   </div>
   <div class="form-group">
      <label for="gender">Jenis Kelamin</label>
         <select class="form-control" name="gender" required="">
            <option value=""disabled selected>-Pilih-</option>
            <option value="1">Laki-Laki</option>
            <option value="2">Perempuan</option>
         </select>
         <script>
            document.getElementsByName("gender")[0].value = "{{ $visitor->gender }}";
       </script>
   </div>
   <div class="form-group">
      <label for="address">Alamat</label>
      <input type="text" class="form-control" id="address" 
         name="address"  value="{{ $visitor->address}}" required>
   </div>
   <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control @error ('username') is-invalid @enderror" 
        id="email" name="username" value="{{ $visitor->username }}"required>
   </div>
   <div class="form-group">
      <label for="hp">Password</label>
      <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" 
         placeholder="Masukkan Password" name="password"  value="{{$visitor->password}}"required>
  </div>

   <div class="form-group">
            <label for="gender">Status</label>
            <select class="form-control" name="status" required="">
               <option value=""disabled selected>-Pilih-</option>
               <option value="1">Aktif</option>
               <option value="0">Tidak Aktif</option>
            </select>
            <script>
               document.getElementsByName("status")[0].value="{{ $visitor->status }}";
            </script>
         </div>

   <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection