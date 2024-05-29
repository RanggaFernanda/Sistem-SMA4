@extends('Layout.App')
@section('title', 'Data Ekstrakurikuler')
@section('dataekskul', 'active')
@section('main', 'show')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <!-- Error Messages -->
                @foreach (['nama_ekskul', 'kategori_ekskul', 'pelatih_ekskul'] as $error)
                    @error($error)
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                @endforeach

                <div class="card-header">
                    <h3 class="card-title">Data Seluruh Ekstrakurikuler</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-plus" title="Tambah Data"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ekskul</th>
                            <th>Kategori</th>
                            <th>Pelatih</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dtekskul as $dt_eks)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt_eks->nama_ekskul }}</td>
                            <td>{{ $dt_eks->kategori_ekskul }}</td>
                            <td>{{ $dt_eks->pelatih_ekskul }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{ $dt_eks->id }}"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{ $dt_eks->id }}"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_eks->id }}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="_hapus-{{ $dt_eks->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Data Ekstrakurikuler</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('dataekskul.destroy', $dt_eks->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="card-body">
                                                <h5>Apakah Anda Yakin Akan Menghapus Data <strong>{{ $dt_eks->nama_ekskul }}</strong>?</h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->

                        <!-- Modal Edit -->
                        <div class="modal fade" id="_edit-{{ $dt_eks->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Data Ekstrakurikuler</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('dataekskul.update', $dt_eks->id) }}">
                                            @method("PUT")
                                            @csrf
                                            <label for="namaEkskul">Nama Ekstrakurikuler</label>
                                            <input class="form-control" type="text" name="nama_ekskul" placeholder="Masukan Nama Ekskul" value="{{ old('nama_ekskul', $dt_eks->nama_ekskul) }}">
                                            <br>
                                            <label for="KategoriEkskul">Kategori</label>
                                            <select class="form-control" name="kategori_ekskul">
                                                <option value="akademik" {{ $dt_eks->kategori_ekskul == 'akademik' ? 'selected' : '' }}>Akademik</option>
                                                <option value="non-akademik" {{ $dt_eks->kategori_ekskul == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                                            </select>
                                            <br>
                                            <label for="pelatihEkskul">Nama Pelatih</label>
                                            <input class="form-control" type="text" name="pelatih_ekskul" placeholder="Masukan Nama Pelatih" value="{{ old('pelatih_ekskul', $dt_eks->pelatih_ekskul) }}">
                                            <div class="modal-footer justify-content-between">
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->

                        <!-- Modal Detail -->
                        <div class="modal fade" id="_detail-{{ $dt_eks->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Detail Data Ekstrakurikuler</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <dl class="row">
                                            <dt class="col-sm-4">Nama Ekskul</dt>
                                            <dd class="col-sm-8">{{ $dt_eks->nama_ekskul }}</dd>
                                            <dt class="col-sm-4">Kategori</dt>
                                            <dd class="col-sm-8">{{ $dt_eks->kategori_ekskul }}</dd>
                                            <dt class="col-sm-4">Pelatih</dt>
                                            <dd class="col-sm-8">{{ $dt_eks->pelatih_ekskul }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->

<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Ekstrakurikuler</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('ekskul-simpan')}}">
                    @csrf
                    <div class="card-body">
                        <label for="namaEkskul">Nama Ekstrakurikuler</label>
                        <input class="form-control" type="text" id="id" name="nama_ekskul" class="@error('nama_ekskul') is-invalid @enderror" placeholder="Masukan Nama Ekskul">
                        <br>
                        <label for="KategoriEkskul">Kategori</label>
                        <select class="form-control" id="KategoriEkskul" name="kategori_ekskul" class="@error('kategori_ekskul') is-invalid @enderror">
                            <option value="akademik">Akademik</option>
                            <option value="non-akademik">Non-Akademik</option>
                        </select>
                        <br>
                        @if (Auth::user()->role=='Administrator')
                        <label for="user_id">Pembina</label>
                        <select class="form-control" id="user_id" name="user_id" class="@error('user_id') is-invalid @enderror">
                            @foreach ($dtpembina as $pembina)
                            <option value="{{$pembina->id}}">{{$pembina->name}}</option>   
                            @endforeach
                            
                            
                        </select>
                        @else
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        @endif
                        <label for="pelatihEkskul">Nama Pelatih</label>
                        <input class="form-control" type="text" id="id" name="pelatih_ekskul" class="@error('nama_ekskul') is-invalid @enderror" placeholder="Masukan Nama Pelatih">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
    });
</script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection


