@extends('layouts.main')
@section('title') Tambah Peralatan Wahana @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
   <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peralatan Wahana</h6>
   </div>
   <div class="card-body">
      <form method="POST" action="{{route('tools.store')}}" enctype="multipart/form-data">
         @csrf
         
       <div class="form-group">
         <label for="nama">ID</label>
         <input type="text" class="form-control"  id="id" name="id" value="{{$kode}}" readonly="readonly">
      </div>

       <div class="form-group">
            <label for="wahana">Wahana</label>
            <select  class="form-control" id="wahana" name="wahana"  required>
               <option value=""disabled selected>--Pilih--</option>
               @foreach ($wahana as $wahana)
               <option value="{{$wahana->wahana_id}}">{{$wahana->wahana_id}}-{{$wahana->wahana_name}}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error ('nama') is-invalid @enderror"
               id="nama" placeholder="Masukkan Nama Alat" name="nama" value="{{ old('nama')}}"required >
         </div>
         
         <div class="form-group">
            <label for="good">Jumlat alat dengan kondisi baik</label>
            <input type="number" class="form-control @error ('good') is-invalid @enderror" id="good" 
               placeholder="Jumlah alat" name="good"  value="{{ old('good') }}"required>
               @error('good')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
         </div>

          <div class="form-group">
            <label for="broken">Jumlat alat dengan kondisi rusak</label>
            <input type="number" class="form-control @error ('broken') is-invalid @enderror" id="broken" 
               placeholder="Jumlah alat" name="broken"  value="{{ old('broken') }}"required>
               @error('good')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
         </div>

          <div class="form-group">
            <label for="repaired">Jumlat alat yang sedang diperbaiki</label>
            <input type="number" class="form-control @error ('repaired') is-invalid @enderror" id="repaired" 
               placeholder="Jumlah alat" name="repaired"  value="{{ old('repaired') }}"required>
               @error('good')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
         </div>
         
         <button type="submit" class="btn btn-primary">Submit</button>
      
   </div>
   </form>
</div>
@endsection