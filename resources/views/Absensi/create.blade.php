@extends('Layout.App')
@section('title', 'Isi Absensi')

@section('content')
<div class="container mt-4">
    <h1>Isi Absensi untuk Semua Siswa</h1>

    <form action="{{ route('submit-absensi') }}" method="POST">
        @csrf
        <input type="hidden" name="id_ekskul" value="{{ $idEkskul }}">

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pertemuan">Pertemuan Ke-:</label>
            <input type="number" id="pertemuan" name="pertemuan" class="form-control" required>
        </div>

        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semuaSiswa as $siswa)
                    <tr>
                        <td>{{ $siswa->nama_siswa }}</td>
                        <td><input type="radio" name="absensi[{{ $siswa->id }}]" value="hadir" required></td>
                        <td><input type="radio" name="absensi[{{ $siswa->id }}]" value="izin"></td>
                        <td><input type="radio" name="absensi[{{ $siswa->id }}]" value="sakit"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
