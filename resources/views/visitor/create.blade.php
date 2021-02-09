@extends('layouts.main')
@section('title') Tambah Pengunjung @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
   <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengunjung</h6>
   </div>
   <div class="card-body">
      <form method="POST" action="{{route('visitor.store')}}" enctype="multipart/form-data">
         @csrf

        <div class="form-group">
         <label for="nama">ID</label>
         <input type="text" class="form-control"  id="id" name="id" value="{{$kode}}" readonly="readonly">
      </div>

         <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" 
               placeholder="Masukkan Nama" name="name"  value="{{ old('name')}}" required >
         </div>
         <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender" required="">
               <option value="" disabled selected="">-Pilih-</option>
               <option value="1">Laki-Laki</option>
               <option value="2">Perempuan</option>
            </select>
            
         </div>
         <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" id="address" 
               placeholder="Masukkan Alamat" name="address"  value="{{ old('address') }}"required>
         </div>

         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error ('username') is-invalid @enderror" 
               id="username" placeholder="Masukkan Username" name="username" value="{{ old('username') }}"required>
               @error('username')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

         </div>
         <div class="form-group">
            <label for="hp">Password</label>
            <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" 
               placeholder="Masukkan Password" name="password"  value="{{ old('password') }}"required>
               @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
         </div>
         
   <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>
@endsection