@extends('layouts.main')
@section('title') Edit Riwayat Perbaikan @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Edit <b>{{$tool->tool_name}}</h6>
</div>
<div class="card-body">
      <form method="POST" action="{{route('tools.update', $tool->tool_id)}}">
         @csrf
         @method('POST')
           
         <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control" value="{{$tool->tool_id}}" readonly="readonly">
         </div> 

         <div class="form-group">
            <label for="wahana">Wahana</label>
            <select  class="form-control" name="wahana" required>
            @foreach($wahana as $wahana)
            <option value="{{$tool->wahana_id}}" {{$tool->wahana_id == $wahana->wahana_id ? 'selected' : ''}}>{{$wahana->wahana_id}}-{{$wahana->wahana_name}}</option>
            @endforeach
            </select>
            <script>
               document.getElementsByName("wahana")[0].value = "{{ $tool->wahana->wahana_id }}";
            </script>
         </div>

         <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" 
               value="{{$tool->tool_name}}" required>
         </div>
     
         <div class="form-group">
            <label for="good">Jumlah alat dengan Kondisi baik</label>
            <input type="number" class="form-control"  name="good"  
               value="{{$tool->good}}" required>
         </div>
        
         <div class="form-group">
            <label for="broken">Jumlah alat dengan Kondisi Rusak</label>
            <input type="number" class="form-control"  name="broken"  
               value="{{$tool->broken}}" required>
         </div>
        
         <div class="form-group">
            <label for="good">Jumlah alat yang sedang diperbaiki</label>
            <input type="number" class="form-control"  name="repaired"  
               value="{{$tool->repaired}}" required>
         </div>
        

         <button type="submit" class="btn btn-primary">Submit</button>
       
      </form>
@endsection