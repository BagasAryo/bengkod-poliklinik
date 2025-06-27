@extends('layouts.app')

@section('title', 'Dokter - Dashboard')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Dashboard</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Periksa Pasien</li>
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
    <a href="/pages/dokter/periksa-pasien" class="nav-link active">
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
    <a href="/pages/dokter/profil" class="nav-link">
      <i class="nav-icon fas fa-id-card fa-lg"></i>
      <p>Profil</p>
    </a>
  </li>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="card shadow-lg mt-4">
        <div class="card-header">
          <h3 class="card-title">Jadwal Periksa</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-stripe text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Catatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($periksas as $periksa)
                <tr class="align-middle">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $periksa->daftarPoli->pasien->nama }}</td>
                  <td>{{ $periksa->catatan }}</td>
                  <td>
                    <a href="{{ route('pages.dokter.periksa_pasien.edit', $periksa->id) }}" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                      Edit
                    </a>
                    <form action="{{ route('pages.dokter.jadwal_periksa.destroy', $periksa->id) }}" method="POST"
                      style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm text-black">
                        <i class="fas fa-trash"></i>
                        Hapus
                      </button>
                    </form>
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
