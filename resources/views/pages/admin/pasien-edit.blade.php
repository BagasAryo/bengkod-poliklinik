@extends('layouts.app')

@section('title', 'Admin - Edit Pasien')

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
  <li class="nav-item">
    <a href="/pages/admin/poli" class="nav-link">
      <i class="nav-icon fas fa-house-chimney-medical fa-lg"></i>
      <p>Poli</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/pages/admin/obat" class="nav-link">
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
            <h3 class="card-title">Edit Pasien</h3>
          </div>
          <form action="{{ route('pages.admin.pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama"
                  value="{{ $pasien->nama }}" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pasien->alamat }}"
                  required>
              </div>
              <div class="form-group">
                <label for="no_ktp">No. KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                  value="{{ $pasien->no_ktp }}" required>
              </div>
              <div class="form-group">
                <label for="no_hp">No. Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp"
                  value="{{ $pasien->no_hp }}" required>
              </div>
              <div class="form-group  ">
                <label for="no_rm">No. RM</label>
                <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ $pasien->no_rm }}"
                  required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Submit</button>
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
                    <a href="{{ route('pages.admin.pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pages.admin.pasien.destroy', $pasien->id) }}" method="POST"
                      style="display: inline;">
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
