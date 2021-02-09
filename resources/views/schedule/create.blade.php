@extends('layouts.main')
@section('title') Tambah Schedule @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Schedule</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('addschedule')}}">
                @csrf
                <div class="form-group">
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                    <select name="wahana" id="" class="form-control">
                        <option value="">-- Pilih Wahana --</option>
                        @foreach ($wahana as $datawahana)
                        <option value="{{$datawahana->wahana_id}}">{{$datawahana->wahana_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="staff" id="" class="form-control">
                        <option value="">-- Pilih Staff --</option>
                        @foreach ($staff as $datastaff)
                        <option value="{{$datastaff->staff_operator_nik}}">{{$datastaff->staff_operator_nik}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
</div>