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
            <br>
            @if (session('Status'))
            <div class="alert alert-danger">
                {{ session('Status') }}
            </div>
            @endif
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
                    <select name="staff_loket_nik" id=""
                        class="form-control @error ('staff_loket_nik') is-invalid @enderror">
                        <option value="">-- Pilih Staff Loket --</option>
                        @foreach ($emp as $dataemp)
                        <option value="{{$dataemp->employee_nik}}">{{$dataemp->employee_name}}</option>
                        @endforeach
                    </select>
                    @error('staff_loket_nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endsection
</div>
