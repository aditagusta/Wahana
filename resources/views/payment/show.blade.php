@extends('layouts.main')
@section('title') Detail Pembayaran @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection
@section('content')
<div class="container">
<div class="card">
<div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran <b>{{$transaction->transaction_id}}</b></h6>
</div>
      <div class="card-body">
      <div class="form-group">
      <label for="id" class="col-md-2 control-label" >ID Pembayaran</label>
         <div class="col-md-6">
         <input type="text" class="form-control" name="id" 
               value="{{ $transaction->transaction_id}}" readonly="">
         </div>
      
      <div class="form-group">
         <label for="address" class="col-md-2 control-label" >Tanggal Pembayaran</label>
         <div class="col-md-6">
            <input type="text" class="form-control"  
               value="{{ $transaction->transaction_date}}" readonly="">
         </div>

      <div class="form-group">
      <label for="nama" class="col-md-2 control-label" >Pengunjung</label>
      <div class="col-md-6">
         <input type="text" class="form-control" 
            value="{{ $transaction->visitor_id}} - {{ $transaction->visitor_name}}" readonly="">
      </div>

       <div class="form-group">
      <label for="nama" class="col-md-2 control-label" >Tiket</label>
      <div class="col-md-6">
         <input type="text" class="form-control"
            value="{{ $transaction->wahana_name}}" readonly="">
      </div>

     <div class="form-group">
      <label for="nama" class="col-md-2 control-label" >Jumlah Tiket</label>
      <div class="col-md-6">
         <input type="text" class="form-control" 
            value="{{ $transaction->qty}}" readonly="">
      </div>

      <div class="form-group">
      <label for="nama" class="col-md-2 control-label" >Total</label>
      <div class="col-md-6">
         <input type="text" class="form-control" 
            value="{{ $transaction->total}}" readonly="">
      </div>

     
        
      </div>
@endsection