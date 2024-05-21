@extends('Layout.App')
@section('title', 'Data Pembina')

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
                    <h3 class="card-title">Data Seluruh Pembina</h3>
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
                                <th>Nama Pembina</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Penugasan</th>
                                <th>Jenis Kelamin</th>
                                <th>Ekstrakulikuler</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtpembina as $dt_pembina)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt_pembina->nama_pembina }}</td>
                                    <td>{{ $dt_pembina->nip_pembina }}</td>
                                    <td>{{ $dt_pembina->email_pembina }}</td>
                                    <td>{{ $dt_pembina->tugas_pembina }}</td>
                                    <td>{{ $dt_pembina->jeniskelamin_pembina }}</td>
                                    <td>{{ $dt_pembina->ekstrakulikuler_pembina }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#_detail-{{ $dt_pembina->id }}"><i class="fas fa-eye" title="Detail"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{ $dt_pembina->id }}"><i class="fas fa-edit" title="Edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_pembina->id }}"><i class="fas fa-trash" title="Delete"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="_detail-{{ $dt_pembina->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail Data Pembina</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <dl class="row">
                                                        <dt class="col-sm-4">Nama Pembina</dt>
                                                        <dd class="col-sm-8">{{ $dt_pembina->nama_pembina }}</dd>
                                                        <dt class="col-sm-4">NIP</dt>
                                                        <dd class="col-sm-8">{{ $dt_pembina->nip_pembina }}</dd>
                                                        <dt class="col-sm-4">Email</dt>
                                                        <dd class="col-sm-8">{{ $dt_pembina->email_pembina }}</dd>
                                                        <dt class="col-sm-4">Penugasan</dt>
                                                        <dd class="col-sm-8">{{ $dt_pembina->tugas_pembina }}</dd>
                                                        <dt class="col-sm-4">Jenis Kelamin</dt>
                                                        <dd class="col-sm-8">{{ $dt_pembina->jeniskelamin_pembina }}</dd>
                                                        <dt class="col-sm-4">Ekstrakulikuler</dt>
                                                        <dd class="col-sm-8">{{ $dt_pembina->ekstrakulikuler_pembina }}</dd>
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
                                <div class="modal fade" id="_edit-{{ $dt_pembina->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Data Pembina</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('datapembina.update', $dt_pembina->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="namaPembina">Nama Pembina</label>
                                                            <input type="text" class="form-control" name="nama_pembina" value="{{ $dt_pembina->nama_pembina }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="namaPembina">NIP</label>
                                                            <input type="text" class="form-control" name="nip_pembina" value="{{ $dt_pembina->nip_pembina }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="emailPembina">Email</label>
                                                            <input type="email" class="form-control" name="email_pembina" value="{{ $dt_pembina->email_pembina }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tugasPembina">Penugasan</label>
                                                            <input type="text" class="form-control" name="tugas_pembina" value="{{ $dt_pembina->tugas_pembina }}" required>
                                                        </div>
                                                        <label for="jeniskelaminpembina">Jenis Kelamin</label>
                                                        <select class="form-control" id="jeniskelaminpembina" name="jeniskelamin_pembina" class="@error('jeniskelamin_pembina') is-invalid @enderror">
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="ekstrakulikulerPembina">Ekstrakulikuler</label>
                                                            <input type="text" class="form-control" name="ekstrakulikuler_pembina" value="{{ $dt_pembina->ekstrakulikuler_pembina }}" required>
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
                                <div class="modal fade" id="_hapus-{{ $dt_pembina->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Data Pembina</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <form action="{{ route('datapembina.destroy', $dt_pembina->id) }}" method="POST">
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
                <h4 class="modal-title">Tambah Data Pembina</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('datapembina.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaPembina">Nama Pembina</label>
                            <input type="text" class="form-control" name="nama_pembina" placeholder="Masukan Nama Pembina" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="namaPembina">NIP</label>
                            <input type="text" class="form-control" name="nip_pembina" placeholder="Masukan NIP" required>
                        </div>
                        <div class="form-group">
                            <label for="emailPembina">Email</label>
                            <input type="email" class="form-control" name="email_pembina" placeholder="Masukan Email Pembina" required>
                        </div>
                        <div class="form-group">
                            <label for="tugasPembina">Tugas Pembina</label>
                            <input type="text" class="form-control" name="tugas_pembina" placeholder="Masukan Tugas Pembina" required>
                        </div>
                        
                        <label for="jeniskelaminpembina">Jenis Kelamin</label>
                        <select class="form-control" id="jeniskelaminpembina" name="jeniskelamin_pembina" class="@error('jeniskelamin_pembina') is-invalid @enderror">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <label for="ekstrakulikulerPembina">Ekstrakulikuler</label>
                            <select name="ekstrakulikuler_pembina"  class="form-control @error('ekstrakulikuler_pembina') is-invalid @enderror">
                                <option value="">-- Pilih Ekstrakulikuler --</option>
                                @foreach ($dtekskul as $item)
                                <option value="{{ $item->nama_ekskul }}">{{ $item->nama_ekskul }}</option>
                                @endforeach
                            </select>
                            @error('ekstrakulikuler_pembina')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
