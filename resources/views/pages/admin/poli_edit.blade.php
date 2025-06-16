@extends('layouts.app')

@section('title', 'Admin - Edit Poli')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Poli Settings</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Poli</li>
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
    <a href="/pages/admin/poli" class="nav-link active">
      <i class="nav-icon fas fa-house-chimney-medical fa-lg"></i>
      <p>Poli</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/obat" class="nav-link">
      <i class="nav-icon fas fa-capsules fa-lg"></i>
      <p>Obat</p>
    </a>
  @endsection

  @section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card shadow-lg">
            <div class="card-header">
              <h3 class="card-title">Edit Poli</h3>
            </div>
            <form action="{{ route('pages.admin.poli.update', $poli->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_poli">Nama Poli</label>
                  <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="{{ $poli->nama_poli }}" placeholder="Input Poli's name"
                    required>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Input Poli's description" rows="3"
                    required>{{ $poli->keterangan }}</textarea>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a href="{{ route('pages.admin.poli.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
          </div>
        </div>
        <div class="card shadow-lg mt-10">
          <div class="card-header">
            <h3 class="card-title">Daftar Poli</h3>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Poli</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($polis as $poli)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $poli->nama_poli }}</td>
                    <td>{{ $poli->keterangan }}</td>
                    <td>
                      <a href="/pages/admin/poli/{{ $poli->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('pages.admin.poli.destroy', $poli->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $poli->nama_poli }} ?')">Delete</button>
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
