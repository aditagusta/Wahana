@extends('layouts.main')
@section('title') Tambah Pegawai @endsection

@section('heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pegawai</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error ('employee_nik') is-invalid @enderror"
                        placeholder="Masukkan NIK" id="nik" name="employee_nik" value="{{old('employee_nik')}}">
                    @error('employee_nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama"
                        placeholder="Masukkan Nama" name="nama" value="{{ old('nama')}}" required>
                </div>

                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" name="gender" required="">
                        <option value="" disabled selected="">-Pilih-</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phpne">HP</label>
                    <input type="text" class="form-control @error ('phone') is-invalid @enderror" id="phone"
                        placeholder="Masukkan nomor Hp" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error ('alamat') is-invalid @enderror" id="alamat"
                        placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat') }}" required>
                </div>

                <div class="form-group">
                    <label for="jabataan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabataan" required>
                        <option value="" disabled selected>--Pilih--</option>
                        @foreach ($position as $position)
                        <option value="{{$position->position_id}}">
                            {{$position->position_id}}-{{$position->position_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username"
                        placeholder="Masukkan Username" name="username" value="{{ old('username') }}" required>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="hp">Password</label>
                    <input type="password" class="form-control @error ('password') is-invalid @enderror" id="password"
                        placeholder="Masukkan Password" name="password" value="{{ old('password') }}" required>
                    @error('password')
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
