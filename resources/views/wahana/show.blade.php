@extends('layouts.main')
@section('title') Detail Wahana @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Detail <b>{{$wahana->wahana_name}}</b></h6>
</div>
<div class="card-body">
<div class="form-group">
<div class="form-group">
   <div class="col-md-6">
      <img width="500" height="320" @if($wahana->image) 
      src="{{ asset('image/'.$wahana->image) }}" @endif />
   </div>
</div>
<div class="form-group">
<label for="id" class="col-md-2 control-label" >ID</label>
<div class="col-md-6">
   <input type="text" class="form-control" name="id" value="{{ $wahana->wahana_id }}" readonly="">
</div>
<div class="form-group">
<label for="name" class="col-md-2 control-label" >Nama Wahana</label>
<div class="col-md-6">
   <input type="text" class="form-control" name="name" value="{{ $wahana->wahana_name}}" readonly="">
</div>
<div class="form-group">
   <label for="price" class="col-md-2 control-label" >Tarif</label>
   <div class="col-md-6">
      <input type="text" class="form-control" name="price" value="{{ $wahana->price }}" readonly="">
   </div>

 <div class="form-group">
   <label for="open_time" class="col-md-2 control-label" >Jam Buka</label>
   <div class="col-md-6">
      <input type="text" class="form-control" name="open_time" value="{{ $wahana->open_time }}" readonly="">
   </div>

   <div class="form-group">
   <label for="close_time" class="col-md-2 control-label" >Jam Tutup</label>
   <div class="col-md-6">
      <input type="text" class="form-control" name="close_time" value="{{ $wahana->close_time }}" readonly="">
   </div>
  
  
  
</div>
@endsection