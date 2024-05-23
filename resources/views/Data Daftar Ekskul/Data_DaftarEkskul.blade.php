@extends('Layout.App')
@section('title', 'Daftar Ekskul')

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
                    <h3 class="card-title">Data Daftar Ekskul</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-success btn-sm"><i class="fas fa-file-excel" title="Download Excel"></i> Export Excel</a>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Kelas</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Ekstrakulikuler</th>
                                <th>status</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtdaftarekskul as $dt_daftarekskul)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt_daftarekskul->nama_siswa }}</td>
                                    <td>{{ $dt_daftarekskul->nisn_siswa }}</td>
                                    <td>{{ $dt_daftarekskul->kelas_siswa }}</td>
                                    <td>{{ $dt_daftarekskul->email_siswa }}</td>
                                    <td>{{ $dt_daftarekskul->jeniskelamin_siswa }}</td>
                                    <td>{{ $dt_daftarekskul->ekstrakulikuler_siswa }}</td>
                                   <td>{{ $dt_daftarekskul->validasi }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#_detail-{{ $dt_daftarekskul->id }}"><i class="fas fa-eye" title="Detail"></i></a>
                                        {{-- <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{ $dt_daftarekskul->id }}"><i class="fas fa-edit" title="Edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_daftarekskul->id }}"><i class="fas fa-trash" title="Delete"></i></a> --}}
                                    </td>
                                </tr>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="_detail-{{ $dt_daftarekskul->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail Data Siswa</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <dl class="row">
                                                        <dt class="col-sm-4">Nama Siswa</dt>
                                                        <dd class="col-sm-8">{{ $dt_daftarekskul->nama_siswa }}</dd>
                                                        <dt class="col-sm-4">NISN</dt>
                                                        <dd class="col-sm-8">{{ $dt_daftarekskul->nisn_siswa }}</dd>
                                                        <dt class="col-sm-4">Kelas</dt>
                                                        <dd class="col-sm-8">{{ $dt_daftarekskul->kelas_siswa }}</dd>
                                                        <dt class="col-sm-4">Email</dt>
                                                        <dd class="col-sm-8">{{ $dt_daftarekskul->email_siswa }}</dd>
                                                        <dt class="col-sm-4">Jenis Kelamin</dt>
                                                        <dd class="col-sm-8">{{ $dt_daftarekskul->jeniskelamin_siswa}}</dd>
                                                        <dt class="col-sm-4">Ekstrakulikuler</dt>
                                                        <dd class="col-sm-8">{{ $dt_daftarekskul->ekstrakulikuler_siswa}}</dd>

                                                    </dl>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                                <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<!-- Modal Edit -->
<div class="modal fade" id="_edit-{{ $dt_daftarekskul->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('daftarekskul.update', $dt_daftarekskul->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namasiswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" value="{{ $dt_daftarekskul->nama_siswa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nisnsiswa">NISN</label>
                            <input type="text" class="form-control" name="nisn_siswa" value="{{ $dt_daftarekskul->nisn_siswa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kelassiswa">Kelas</label>
                            <input type="text" class="form-control" name="kelas_siswa" value="{{ $dt_daftarekskul->kelas_siswa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="emailsiswa">Email</label>
                            <input type="email" class="form-control" name="email_siswa" value="{{ $dt_daftarekskul->email_siswa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelaminsiswa">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jeniskelamin_siswa" value="{{ $dt_daftarekskul->jeniskelamin_siswa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ekstrakulikulersiswa">Ekstrakulikuler</label>
                            <input type="text" class="form-control" name="ekstrakulikuler_siswa" value="{{ $dt_daftarekskul->ekstrakulikuler_siswa }}" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="nilaisiswa">Nilai</label>
                            <input type="text" class="form-control" name="nilai_siswa" value="{{ $dt_daftarekskul->nilai_siswa }}" required>
                        </div> --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                                <!-- Modal Hapus -->
                                <div class="modal fade" id="_hapus-{{ $dt_daftarekskul->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Data Siswa</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <form action="{{ route('daftarekskul.destroy', $dt_daftarekskul->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{-- <form method ="POST" enctype="multipart/form-data" action="{{action ('App\Http\Controllers\Daftarekskul\DaftarekskulController@store')}}"> --}}
                <form method="POST" action="{{ route('daftarekskul.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namasiswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" placeholder="Masukan Nama Siswa" required>
                        </div>
                        <div class="form-group">
                            <label for="nisnsiswa">NISN</label>
                            <input type="text" class="form-control" name="nisn_siswa" placeholder="Masukan NISN" required>
                        </div>
                        <div class="form-group">
                            <label for="kelassiswa">Kelas</label>
                            <input type="text" class="form-control" name="kelas_siswa" placeholder="Masukan Kelas" required>
                        </div>
                        <input type="hidden" value="not" name="validasi">
                        <div class="form-group">
                            <label for="emailsiswa">Email</label>
                            <input type="email" class="form-control" name="email_siswa" placeholder="Masukan Email Siswa" required>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelaminsiswa">Jenis Kelamin</label>
                            <select class="form-control" id="Jeniskelamin" name="jeniskelamin_siswa" class="@error('jeniskelamin_siswa') is-invalid @enderror">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="form-group">
                            <label for="Ekstrakulikulersiswa">Ekstrakulikuler</label>
                            <select name="ekstrakulikuler_siswa"  class="form-control @error('ekstrakulikuler_siswa') is-invalid @enderror">
                                <option value="">-- Pilih Ekstrakulikuler --</option>
                                @foreach ($dtekskul as $item)
                                <option value="{{ $item->id_ekskul }}">{{ $item->nama_ekskul }}</option>
                                @endforeach
                            </select>
                            @error('Ekstrakulikuler_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="nilaisiswa">Nilai</label>
                            <input type="text" class="form-control" name="nilai_siswa" placeholder="Masukan Nilai" required>
                        </div> --}}
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection

@section('javascript')
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection
