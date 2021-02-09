@extends('layouts.main')
@section('title') Edit Pegawai @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Edit <b>{{$employee->employee_name}}</h6>
</div>
<div class="card-body">
      <form method="POST" action="{{route('employee.update', $employee->employee_nik)}}">
         @csrf
         @method('POST')
            <input type="hidden" name="id_pengunjung" value="{{$employee->employee_nik}}" readonly>

         <div class="form-group">
            <label for="id">NIK</label>
            <input type="text" name="NIK" class="form-control" value="{{$employee->employee_nik}}" readonly="readonly">
         </div> 
         <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" 
               value="{{$employee->employee_name}}" required>
         </div>
         <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender" required="">
               <option value=""disabled selected>-Pilih-</option>
               <option value="1">Laki-Laki</option>
               <option value="2">Perempuan</option>
            </select>
            <script>
               document.getElementsByName("gender")[0].value = "{{ $employee->gender }}";
            </script>
         </div>
     
         <div class="form-group">
            <label for="hp">No HP</label>
            <input type="text" class="form-control"  name="hp"  
               value="{{$employee->phone}}" required>
         </div>
        
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" 
               name="alamat"  value="{{ $employee->address }}">   
         </div>
         <div class="form-group">
            <label for="jabataan">Jabatan</label>
            <select  class="form-control" name="jabataan" required>
            @foreach($position as $position)
            <option value="{{$position->position_id}}" {{$employee->id_position == $position->position_id ? 'selected' : ''}}>{{$position->position_id}}-{{$position->position_name}}</option>
            @endforeach
            </select>
            <script>
               document.getElementsByName("jabataan")[0].value = "{{ $employee->position->position_id }}";
            </script>
         </div>
            
        <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control @error ('username') is-invalid @enderror" 
        id="email" name="username" value="{{ $employee->username }}"required>
   </div>
   <div class="form-group">
      <label for="hp">Password</label>
      <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password" 
         placeholder="Masukkan Password" name="password"  value="{{$employee->password}}"required>
  </div>

   <div class="form-group">
            <label for="gender">Status</label>
            <select class="form-control" name="status" required="">
               <option value=""disabled selected>-Pilih-</option>
               <option value="1">Aktif</option>
               <option value="0">Tidak Aktif</option>
            </select>
            <script>
               document.getElementsByName("status")[0].value="{{ $employee->status }}";
            </script>
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>
       
      </form>
@endsection