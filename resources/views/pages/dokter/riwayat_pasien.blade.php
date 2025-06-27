@extends('layouts.app')

@section('title', 'Dokter - Dashboard')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Riwayat</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
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
    <a href="/pages/dokter/riwayat-pasien" class="nav-link active">
      <i class="nav-icon fas fa-book-medical fa-lg"></i>
      <p>Riwayat Pasien</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/dokter/profil" class="nav-link">
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
          <h3 class="card-title">Riwayat Pasien</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No KTP</th>
                <th>No Telepon</th>
                <th>No RM</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($riwayats as $index => $pasien)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $pasien->nama }}</td>
                  <td>{{ $pasien->alamat }}</td>
                  <td>{{ $pasien->no_ktp }}</td>
                  <td>{{ $pasien->no_hp }}</td>
                  <td>{{ $pasien->no_rm }}</td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                      data-bs-target="#modalRiwayat{{ $pasien->id }}">
                      <i class="fa fa-eye"></i>
                      Detail Riwayat Periksa
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
