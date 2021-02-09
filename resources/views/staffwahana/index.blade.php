@extends('layouts.main')
@section('title') Top Up @endsection
@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--    <h1 class="h3 mb-0 text-gray-800">Top Up</h1> -->
</div>
@endsection
@section('content')
<div class="card shadow mb-4">
   <div class="card-header">
      <h3>Jadwal Staff Wahana</h3>
   </div>
   <div class="card-body">
      <form method="POST">
         @csrf
         <div class="row">
            <div class="col-sm-6 col-xs-12">
               <div class="form-group">
                  <label for="">Pilih Jadwal</label>
                  <input type="date" name="date" class="form-control" value="{{ $date }}" />
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
               <div class="form-group">
                  <label for="">Pilih Wahana</label>
                  <select class="form-control" name="wahana_id">
                     <option value="0">Semua Wahana</option>
                     @foreach($wahana as $wh)
                        <option value="{{ $wh->wahana_id }}">{{ $wh->wahana_name }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
         </div>
         
         
         @if($wahana_id != "0")
            <div class="form-group">
               <label>Pilih Employee</label>
               <select class="form-control" name="employee_nik">
                  <option value="0">Pilih Employee</option>
                  @foreach($employee as $em)
                     <option value="{{ $em->employee_nik }}">{{ $em->employee_name }}</option>
                  @endforeach
               </select>
               <br>
               <button type="submit" class="btn btn-sm btn-primary">Tambah Staff Wahana</button>
            </div>
         @endif
      </form>
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Employee NIK</th>
                  <th>Employee Name</th>
                  <th>Wahana ID</th>
                  <th>Wahana Name</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($jadwal as $jadwalstaff)
               <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$jadwalstaff->employee->employee_nik}}</td>
                  <td>{{$jadwalstaff->employee->employee_name}}</td>
                  <td>{{$jadwalstaff->wahana->wahana_id}}</td>
                  <td>{{$jadwalstaff->wahana->wahana_name}}</td>
                  <td>
                     <a href="{{ route('staffwahana.delete', ["employee_nik" => $jadwalstaff->employee_nik]) }}?date={{ $jadwalstaff->date }}&wahana_id={{ $jadwalstaff->wahana_id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
               </tr>
               @endforeach
            </tbody>
            <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <!-- Core plugin JavaScript-->
            <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
            <!-- Custom scripts for all pages-->
            <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
            <!-- Page level plugins -->
            <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <!-- Page level custom scripts -->
            <script src="{{asset('/js/demo/datatables-demo.js')}}"></script>

         </table>
      </div>
   </div>
</div>
<script>
   document.getElementsByName("wahana_id")[0].value = "{{ $wahana_id }}";

   var date = document.getElementsByName("date")[0].value;
   var wahana_id = document.getElementsByName("wahana_id")[0].value;
   document.getElementsByName("date")[0].addEventListener("change", function(){
      window.location.href = "{{ route('staffwahana.index') }}?date=" + this.value + "&wahana_id=" + wahana_id
   })
   document.getElementsByName("wahana_id")[0].addEventListener("change", function(){
      window.location.href = "{{ route('staffwahana.index') }}?date=" + date + "&wahana_id=" + this.value
   })

</script>
@endsection