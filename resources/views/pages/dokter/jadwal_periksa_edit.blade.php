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
        <li class="breadcrumb-item"><a href="{{ route('pages.dokter.jadwal_periksa.index') }}">Jadwal Periksa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
    <a href="/pages/dokter/jadwal-periksa" class="nav-link active">
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
    <a href="/pages/admin/poli" class="nav-link">
      <i class="nav-icon fas fa-book-medical fa-lg"></i>
      <p>Riwayat Pasien</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/obat" class="nav-link">
      <i class="nav-icon fas fa-id-card fa-lg"></i>
      <p>Profil</p>
    </a>
  </li>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-lg">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="card-header">
            <h3 class="card-title">Tambah Jadwal Periksa</h3>
          </div>
          <form action="{{ route('pages.dokter.jadwal_periksa.update', $jadwalPeriksa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="id_dokter">Nama Dokter</label>
                <select class="form-select" id="id_dokter" name="id_dokter" required>
                  <option value="" disabled selected>Pilih Dokter</option>
                  @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->id }}" {{ $jadwalPeriksa->id_dokter == $dokter->id ? 'selected' : '' }}>
                      {{ $dokter->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="hari">Hari</label>
                <select class="form-select" id="hari" name="hari" required>
                  <option value="" disabled selected>Pilih Hari</option>
                  @foreach ($days as $day)
                    <option value="{{ $day }}" {{ $jadwalPeriksa->hari == $day ? 'selected' : '' }}>
                      {{ ucfirst($day) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                  value="{{ $jadwalPeriksa->jam_mulai }}" required>
              </div>
              <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                  value="{{ $jadwalPeriksa->jam_selesai }}" required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Edit Jadwal</button>
              <a href="{{ route('pages.dokter.jadwal_periksa.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
      <div class="card shadow-lg mt-4">
        <div class="card-header">
          <h3 class="card-title">Jadwal Periksa Dokter</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-stripe text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($jadwalPeriksas as $jadwal)
                <tr class="align-middle">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jadwal->dokter->nama }}</td>
                  <td>{{ $jadwal->hari }}</td>
                  <td>{{ $jadwal->jam_mulai }}</td>
                  <td>{{ $jadwal->jam_selesai }}</td>
                  <td>
                    <a href="{{ route('pages.dokter.jadwal_periksa.edit', $jadwal->id) }}"
                      class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                      Edit
                    </a>
                    <form action="{{ route('pages.dokter.jadwal_periksa.destroy', $jadwal->id) }}" method="POST"
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
