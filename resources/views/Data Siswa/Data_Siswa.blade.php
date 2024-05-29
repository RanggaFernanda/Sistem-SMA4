@extends('Layout.App')
@section('title', 'Data Siswa')

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
                    <h3 class="card-title">Data Seluruh Siswa</h3>
                    <div class="card-tools">
                        <td>

                        </td>
                        {{-- <a href="#" class="btn btn-success btn-sm"><i class="fas fa-file-excel" title="Download Excel"></i> Export Excel</a> --}}
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" title="Tambah Data"></i> Tambah Data</a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-bordered table-striped table-sm" style="width: 100%; font-size: 0.875rem;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <!-- <th>NISN</th> -->
                                <th>Kelas</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Ekstrakulikuler</th>
                                <th>Nilai</th>
                                <th>Validasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtsiswa as $dt_siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt_siswa->author ? $dt_siswa->author->name : 'No Author' }}</td>
                                <!-- <td>{{ $dt_siswa->nisn_siswa }}</td> -->
                                <td>{{ $dt_siswa->kelas_siswa }}</td>
                                <td>{{ $dt_siswa->email_siswa }}</td>
                                <td>{{ $dt_siswa->jeniskelamin_siswa }}</td>
                                <td>{{ $dt_siswa->nama_ekskul }}</td>
                                <td>{{ $dt_siswa->nilai_siswa }}</td>
                                <td>
                                    @if($dt_siswa->status == "nonacc")
                                    <form action="{{ route('datasiswa.acc', $dt_siswa->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class='btn btn-warning btn-sm'>Belum ACC</button>
                                    </form>
                                    @else
                                    <button class="btn btn-success btn-sm" disabled>ACC</button>
                                    @endif
                                </td>
                                <td style="display: flex; justify-content: space-between">
                                    @if (Auth::user()->role == 'Pembina' || Auth::user()->role == 'Administrator')
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#_detail-{{ $dt_siswa->id }}">
                                        <i class="fas fa-eye" title="Detail"></i>
                                    </a>
                                    @if ($dt_siswa->status == "acc")
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{ $dt_siswa->id }}">
                                        <i class="fas fa-edit" title="Edit"></i>Beri Nilai
                                    </a>
                                    @endif
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_siswa->id }}">
                                        <i class="fas fa-trash" title="Delete"></i>
                                    </a>
                                    @endif
                                </td>
                                {{-- <td style="display: flex; justify-content: space-around; align-items: center">
                                    @if (Auth::user()->role == 'Administrator') 
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#_detail-{{ $dt_siswa->id }}">
                                            <i class="fas fa-eye" title="Detail"></i>
                                        </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_siswa->id }}">
                                        <i class="fas fa-trash" title="Delete"></i>
                                    </a>
                                    @endif
                                </td> --}}
                                
                            </tr>


                            <!-- Modal Detail -->
                            <div class="modal fade" id="_detail-{{ $dt_siswa->id }}">
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
                                                    {{-- <dt class="col-sm-4">Nama Siswa</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->nama_siswa }}</dd>
                                                    <dt class="col-sm-4">NISN</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->nisn_siswa }}</dd> --}}
                                                    <dt class="col-sm-4">Kelas</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->kelas_siswa }}</dd>
                                                    <dt class="col-sm-4">Email</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->email_siswa }}</dd>
                                                    <dt class="col-sm-4">Jenis Kelamin</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->jeniskelamin_siswa }}</dd>
                                                    <dt class="col-sm-4">Ekstrakulikuler</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->nama_ekskul }}</dd>
                                                    <dt class="col-sm-4">Nilai</dt>
                                                    <dd class="col-sm-8">{{ $dt_siswa->nilai_siswa }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        {{-- <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                                            <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i> Print</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="_edit-{{ $dt_siswa->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Nilai Siswa</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('datasiswa.update', $dt_siswa->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="nilaisiswa">Nilai</label>
                                                        <input type="text" class="form-control" name="nilai_siswa" value="{{ $dt_siswa->nilai_siswa }}" required>
                                                    </div>
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
                            <div class="modal fade" id="_hapus-{{ $dt_siswa->id }}">
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
                                            <form action="{{ route('datasiswa.destroy', $dt_siswa->id) }}" method="POST">
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
                <form method="POST" action="{{ route('datasiswa.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="nisnsiswa">NISN</label>
                        <input type="text" class="form-control" name="nisn_siswa" placeholder="Masukan NISN" required>
                    </div> --}}
                    @if (Auth::user()->role == 'Pembina' || Auth::user()->role == 'Administrator')
                    <div class="form-group">
                        <label for="jeniskelaminsiswa">Siswa</label>
                        <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                            @foreach ($siswa as $sw)
                            <option value="{{ $sw->id }}">{{ $sw->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    @endif

                    @if (Auth::user()->role == 'Siswa')
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    @endif

                    <div class="form-group">
                        <label for="kelassiswa">Kelas</label>
                        <input type="text" class="form-control" name="kelas_siswa" placeholder="Masukan Kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="jeniskelaminsiswa">Jenis Kelamin</label>
                        <select class="form-control" id="Jeniskelamin" name="jeniskelamin_siswa" class="@error('jeniskelamin_siswa') is-invalid @enderror">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ekstrakulikulersiswa">Ekstrakulikuler</label>
                        <select class="form-control" name="id_ekskul" required>
                            @foreach($dtekskull as $ekskul)
                            <option value="{{ $ekskul->id }}">{{ $ekskul->nama_ekskul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilaisiswa">Nilai</label>
                        <input type="text" class="form-control" name="nilai_siswa" placeholder="Masukan Nilai" required>
                    </div>
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
    $(document).ready(function() {
        $('#example1').DataTable({
            "searching": true,
            "paging": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 10 // This limits the table to show only 10 entries per page
        });
    });
</script>
@endsection
