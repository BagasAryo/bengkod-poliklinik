@extends('layouts.app')

@section('title', 'Admin - Edit Obat')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Pasien Settings</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item active" aria-current="page">Edit Obat</li>
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
            <h3 class="card-title">Edit Obat</h3>
          </div>
          <form action="{{ route('pages.admin.obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                  value="{{ $obat->nama_obat }}" required>
              </div>
              <div class="form-group">
                <label for="kemasan">Kemasan</label>
                <input type="text" class="form-control" id="kemasan" name="kemasan" value="{{ $obat->kemasan }}"
                  required>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga"
                  value="{{ $obat->harga }}" required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{ route('pages.admin.obat.index') }}" class="btn btn-secondary">Cancel</a>
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
                <th>Nama Obat</th>
                <th>Kemasan</th>
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
                    <a href="{{ route('pages.admin.obat.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pages.admin.obat.destroy', $obat->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus obat {{ $obat->nama_obat }} ?')">Delete</button>
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
