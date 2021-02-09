@extends('layouts.main')
@section('title') Edit Riayat Perbaikan @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="card">
<div class="card-header">
  <!--  <h6 class="m-0 font-weight-bold text-primary">Edit Riwayat Perbaikan<b>{{$repair->repair_id}}</h6> -->
   <h6 class="m-0 font-weight-bold text-primary">Edit Riwayat Perbaikan<b></h6>

</div>
<div class="card-body">
      <form method="POST" action="{{route('repair.update', $repair->repair_id)}}">
         @csrf
         @method('POST')

         <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" class="form-control" value="{{$repair->repair_id}}" readonly="readonly">
         </div> 

     

           <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal</label>
            <input type="date" class="form-control"  name="tanggal_awal"  
               value="{{$repair->date_start}}" required>
           </div>

            <div class="form-group">
            <label for="tanggal_akhir">Tanggal Awal</label>
            <input type="date" class="form-control"  name="tanggal_akhir"  
               value="{{$repair->date_end}}" required>
             </div>

            <div class="form-group">
            <label for="tanggal_akhir">Keterangan</label>
            <input type="text" class="form-control"  name="ket"  
               value="{{$repair->ket}}" >
            </div>
        
         <button type="submit" class="btn btn-primary">Submit</button>
       
      </form>
@endsection