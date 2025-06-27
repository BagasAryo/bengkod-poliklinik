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
        <li class="breadcrumb-item"><a href="{{ route('pages.dokter.periksa_pasien.index') }}">Periksa Pasien</a></li>
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
      <div class="col-12">
        <div class="card shadow-lg mt-4">
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
            <h3 class="card-title">Jadwal Periksa</h3>
          </div>
          <form action="{{ route('pages.dokter.periksa_pasien.update', $periksa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Pasien</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $periksa->daftarPoli->pasien->nama }}" readonly>
              </div>
              <div class="form-group">
                <label for="tgl_periksa">Tanggal Periksa</label>
                <input type="date" name="tgl_periksa" id="tgl_periksa" class="form-control" value="{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('Y-m-d') }}" required>
              </div>
              <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ old('catatan', $periksa->catatan) }}</textarea>
              </div>
              <div class="form-group">
                <label for="obat">Obat</label>
                <select name="id_obat[]" class="form-control select2" multiple>
                  @foreach ($obats as $obat)
                    <option value="{{ $obat->id }}" {{ in_array($obat->id, $periksa->detailPeriksa->pluck('id_obat')->toArray()) ? 'selected' : '' }}>
                      {{ $obat->nama_obat }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="biaya_periksa">Biaya Periksa</label>
                <input type="number" name="biaya_periksa" id="biaya_periksa" class="form-control" value="{{ old('biaya_periksa', $periksa->biaya_periksa) }}" readonly>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Edit</button>
              <a href="{{ route('pages.dokter.periksa_pasien.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
