@extends('Layout.App')
@section('title', 'Absensi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="card-header">
                    <h1 class="card-title">Data Absensi</h1>
                    <div class="card-tools">
                        <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-2">
                        {{ $message }}
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Siswa</th>
                                <th>Ekstrakurikuler</th>
                                <th>Tanggal</th>
                                <th>Kehadiran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $absen)
                                <tr>
                                    <td>{{ $absen->id }}</td>
                                    <td>{{ $absen->siswa->nama }}</td>
                                    <td>{{ $absen->ekstrakurikuler->nama }}</td>
                                    <td>{{ $absen->tanggal }}</td>
                                    <td>{{ $absen->kehadiran ? 'Hadir' : 'Tidak Hadir' }}</td>
                                    <td>
                                        <a href="{{ route('absensi.edit', $absen->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('absensi.destroy', $absen->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
</div>

{{-- create --}}



@section('title', 'Tambah Absensi')

@section('content')
<div class="container mt-4">
    <h1>Tambah Absensi</h1>
    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_siswa">Siswa</label>
            <select name="nama_siswa" class="form-control" required>
                @foreach($dtsiswa as $dt_siswa)
                    <option value="{{ $dt_siswa->id }}">{{ $dt_siswa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ekskul">Ekstrakurikuler</label>
            <select name="ekskul" class="form-control" required>
                @foreach($dtekskul as $dt_eks)
                    <option value="{{ $dt_eks->id }}">{{ $dt_eks->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kehadiran">Kehadiran</label>
            <select name="kehadiran" class="form-control" required>
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@section('title', 'Edit Absensi')

@section('content')
<div class="container mt-4">
    <h1>Edit Absensi</h1>
    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_siswa">Siswa</label>
            <select name="nama_siswa" class="form-control" required>
                @foreach($dtsiswa as $dt_siswa)
                    <option value="{{ $dt_siswa->id }}" {{ $dt_siswa->id == $absensi->nama_siswa ? 'selected' : '' }}>
                        {{ $dt_siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ekskul">Ekstrakurikuler</label>
            <select name="ekskul" class="form-control" required>
                @foreach($dtekskul as $dt_eks)
                    <option value="{{ $dt_eks->id }}" {{ $dt_eks->id == $absensi->ekskul ? 'selected' : '' }}>
                        {{ $dt_eks->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="kehadiran">Kehadiran</label>
            <select name="kehadiran" class="form-control" required>
                <option value="1" {{ $absensi->kehadiran ? 'selected' : '' }}>Hadir</option>
                <option value="0" {{ !$absensi->kehadiran ? 'selected' : '' }}>Tidak Hadir</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
