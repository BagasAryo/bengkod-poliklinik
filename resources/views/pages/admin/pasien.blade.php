@extends('layouts.app')

@section('title', 'Admin - Pasien')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Pasien Settings</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pasien</li>
      </ol>
    </div>
  </div>
@endsection

@section('sidebar')
  <li class="nav-item">
    <a href="/pages/admin/dashboard" class="nav-link">
      <i class="nav-icon fas fa-gauge-high fa-lg"></i>
      <p>Dashboard</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/dokter" class="nav-link">
      <i class="nav-icon fas fa-user-doctor fa-lg"></i>
      <p>Dokter</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/pasien" class="nav-link active">
      <i class="nav-icon fas fa-user-injured fa-lg"></i>
      <p>Pasien</p>
    </a>
  </li>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-lg">
          <div class="card-header">
            <h3 class="card-title">Tambah Pasien</h3>
          </div>
          <form action="" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama"
                  placeholder="Input Patient's name" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input the address"
                  required>
              </div>
              <div class="form-group">
                <label for="no_ktp">No. KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                  placeholder="Input the KTP number" required>
              </div>
              <div class="form-group">
                <label for="no_ktp">No. Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp"
                  placeholder="Input the phone number" required>
              </div>
              <div class="form-group  ">
                <label for="no_rm">No. RM</label>
                <input type="text" class="form-control" id="no_rm" name="no_rm"
                  placeholder="Input the RM number" required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
      <div class="card shadow-lg mt-3">
        <div class="card-header">
          <h3 class="card-title">Daftar Pasien</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No KTP</th>
                <th>No Hp</th>
                <th>No RM</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pasiens as $pasien)
                <tr class="align-middle">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pasien->nama }}</td>
                  <td>{{ $pasien->alamat }}</td>
                  <td>{{ $pasien->no_ktp }}</td>
                  <td>{{ $pasien->no_hp }}</td>
                  <td>{{ $pasien->no_rm }}</td>
                  <td>
                    <a href="" class="btn btn-warning btn-sm">Edit</a>
                    <form action="" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
@endsection
