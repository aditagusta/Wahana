@extends('layouts.main')
@section('title') Tambah Riwayat Perbaikan @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
   <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Riwayat Perbaikan</h6>
   </div>
   <div class="card-body">
      <form method="POST" action="{{route('repair.store')}}" enctype="multipart/form-data">
         @csrf
         
       <div class="form-group">
         <label for="nama">ID</label>
         <input type="text" class="form-control"  id="id" name="id" value="{{$kode}}" readonly="readonly">
      </div>

       <div class="form-group">
            <label for="tool">Alat</label>
            <select  class="form-control" id="tool" name="tool"  required>
               <option value=""disabled selected>--Pilih--</option>
               @foreach ($tool as $tool)
               <option value="{{$tool->tool_id}}">{{$tool->tool_id}}-{{$tool->tool_name}}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal Kerusakan</label>
            <input type="date" class="form-control @error ('tanggal_awal') is-invalid @enderror"
               id="nama" placeholder="Tanggal awal Kerusakan" name="tanggal_awal" value="{{ old('tanggal_awal')}}"required >
         </div>
         
          <div class="form-group">
            <label for="ket">Keterangan</label>
            <input type="text" class="form-control @error ('ket') is-invalid @enderror"
               id="nama" placeholder="Masukkan Keterangan" name="ket" value="{{ old('ket')}}">
         </div>
        
         <button type="submit" class="btn btn-primary">Submit</button>
      
   </div>
   </form>
</div>
@endsection