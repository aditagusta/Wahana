@extends('layouts.main')

@section('title') Tiket @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')

<div class="container">
<div class="card">
  
  <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Form Create User</h6>
  </div>

  <div class="card-body">
    <form method="POST" action="{{route('usercreateadd')}}" enctype="multipart/form-data" >
    @csrf

        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control" id="name" 
          placeholder="Masukkan Nama" name="name" value="{{ old('name')}}" required>
        </div>
        
        <div class="form-group">
          <label for="email"></label>
          <input type="text" class="form-control" id="email" 
          placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password"
           placeholder="Masukkan Password" name="password" 
           value="{{ old('password') }}" required>
        </div>
        <div class="form-group">
          <label for="password">Password Confirm</label>
          <input type="password" class="form-control" id="password"
           placeholder="Masukkan Password Confirm" name="password_confirmation"  required>
        </div>
        <div class="form-group">
          <label for="password">Level</label>
          <select class="form-control" name="level">
            <option value="1">Admin</option>
            <option value="2">Manajer</option>
            <option value="3">Kasir</option>
            <option value="4">Pengunjung</option>
          </select>
        </div>
 

       <button type="submit" class="btn btn-primary">Tambah Data</button>
       
       <a href="{{route('user')}}" class="btn btn-light pull-right">Back</a>

  </form>
    
  </div>
 
    
@endsection