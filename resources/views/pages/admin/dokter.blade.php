@extends('layouts.app')

@section('title', 'Admin - Dokter')

@section('content-header')
  <div class="row">
    <div class="col-sm-6">
      <h3 class="mb-0">Dokter Settings</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dokter</li>
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
    <a href="/pages/admin/dokter" class="nav-link active">
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
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card shadow-lg">
          <div class="card-header">
            <h3 class="card-title">Tambah Dokter</h3>
          </div>
          <form action="" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Dokter</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Doctor's name"
                  required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input the address"
                  required>
              </div>
              <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp"
                  placeholder="Input the phone number" required>
              </div>
              <div class="form-group">
                <label for="poli">Poli</label>
                <select class="form-select" id="poli" name="poli" required>
                  <option value="" disabled selected>Pilih Poli</option>
                  @forelse ($dokters as $dokter)
                    <option value="{{ $dokter->poli->id }}">{{ $dokter->poli->nama_poli }}</option>
                  @empty
                  @endforelse
                </select>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Tambah Dokter</button>
              </div>
          </form>
        </div>
      </div>
      <div class="card shadow-lg mt-10">
        <div class="card-header">
          <h3 class="card-title">Daftar Dokter</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Poli</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dokters as $dokter)
                <tr class="align-middle">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dokter->nama }}</td>
                  <td>{{ $dokter->alamat }}</td>
                  <td>{{ $dokter->no_hp }}</td>
                  <td>{{ $dokter->poli->nama_poli }}</td>
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
  </div>
@endsection
