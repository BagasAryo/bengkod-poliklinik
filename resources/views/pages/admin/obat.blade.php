@extends('layouts.app')

@section('title', 'Admin - Obat')

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
    <a href="/pages/admin/pasien" class="nav-link">
      <i class="nav-icon fas fa-user-injured fa-lg"></i>
      <p>Pasien</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/poli" class="nav-link">
      <i class="nav-icon fas fa-house-chimney-medical fa-lg"></i>
      <p>Poli</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/obat" class="nav-link active">
      <i class="nav-icon fas fa-capsules fa-lg"></i>
      <p>Obat</p>
    </a>
  </li>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-lg">
          <div class="card-header">
            <h3 class="card-title">Tambah Obat</h3>
          </div>
          <form action="" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Obat</label>
                <input type="text" class="form-control" id="nama" name="nama"
                  placeholder="Input Patient's name" required>
              </div>
              <div class="form-group">
                <label for="alamat">Kemasan</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input the address"
                  required>
              </div>
              <div class="form-group">
                <label for="no_ktp">Harga</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                  placeholder="Input the KTP number" required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
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
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($obats as $obat)
                <tr class="align-middle">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $obat->nama_obat }}</td>
                  <td>{{ $obat->kemasan }}</td>
                  <td>{{ $obat->harga }}</td>
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
