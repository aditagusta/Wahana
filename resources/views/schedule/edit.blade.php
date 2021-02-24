@extends('layouts.main')
@section('title') Edit Schedule @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Schedule</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('updateschedule')}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="date" class="form-control" name="tanggal" id="tanggal" readonly>
                </div>
                <div class="form-group">
                    <select name="wahana" id="wahana" class="form-control" readonly>
                        <option value="">-- Pilih Wahana --</option>
                        @foreach ($wahana as $datawahana)
                        <option value="{{$datawahana->wahana_id}}">{{$datawahana->wahana_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="staff" id="staff" class="form-control">
                        <option value="">-- Pilih Staff Loket --</option>
                        @foreach ($employee as $dataemp)
                        <option value="{{$dataemp->employee_nik}}">{{$dataemp->employee_name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('tanggal').value = "<?php echo $schedule->date ?>"
        document.getElementById('wahana').value = "<?php echo $schedule->wahana_id ?>"
        document.getElementById('staff').value = "<?php echo $schedule->staff_loket_nik ?>"
    </script>
    @endsection
</div>
