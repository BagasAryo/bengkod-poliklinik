@extends('layouts.app')

@section('title', 'Dokter - Dashboard')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Profil Dokter</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>
  </div>
@endsection

@section('sidebar')
  <li class="nav-item">
    <a href="/pages/dokter/dashboard" class="nav-link">
      <i class="nav-icon fas fa-gauge-high fa-lg"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/dokter/jadwal-periksa" class="nav-link">
      <i class="nav-icon fas fa-rectangle-list fa-lg"></i>
      <p>Jadwal Periksa</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/dokter/periksa-pasien" class="nav-link">
      <i class="nav-icon fas fa-clipboard-user fa-lg"></i>
      <p>Memeriksa Pasien</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/dokter/riwayat-pasien" class="nav-link">
      <i class="nav-icon fas fa-book-medical fa-lg"></i>
      <p>Riwayat Pasien</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/dokter/profil" class="nav-link active">
      <i class="nav-icon fas fa-id-card fa-lg"></i>
      <p>Profil</p>
    </a>
  </li>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="card shadow-lg">
        <div class="card-header">
          <h3 class="card-title">Profil Dokter</h3>
        </div>
        <form action="" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama Dokter</label>
              <input type="text" class="form-control" id="nama" name="nama" value="">
            </div>
            <div class="form-group mb-3">
              <label for="alamat" class="form-label">Alamat Dokter</label>
              <input type="alamat" class="form-control" id="alamat" name="alamat" value="">
            </div>
            <div class="form-group mb-3">
              <label for="no_hp" class="form-label">No Telepon Dokter</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" value="">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
