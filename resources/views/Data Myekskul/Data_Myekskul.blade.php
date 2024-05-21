@extends('Layout.App')
@section('title', 'Data Myekskul')
    
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
  @error('kode_ekskul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  @error('nama_ekskul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    <div class="card-header">
      <h3 class="card-title">Data Seluruh MyEkstrakurikuler</h3>
      <div class="card-tools">
        <a href="#" class="btn btn-success btn-sm"><i class="fas fa-file-excel" title="Download Excel"></i> Export Excel</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
              
              
                @foreach ($dtdaftarekskul as $dt_daftarekskul)
                 <td>{{ $loop->iteration }}</td>
                <td>{{ $dt_daftarekskul->nama_siswa }}</td>
                <td>{{ $dt_daftarekskul->nisn_siswa }}</td>
                <td>{{ $dt_daftarekskul->kelas_siswa }}</td>
                <td>{{ $dt_daftarekskul->email_siswa }}</td>
                <td>{{ $dt_daftarekskul->jeniskelamin_siswa }}</td>
                <td>{{ $dt_daftarekskul->ekstrakulikuler_siswa }}</td>
                
                  <td>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#_detail-{{$dt_daftarekskul->id}}"><i class="fas fa-eye"></i> </a>
                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#_edit-{{ $dt_daftarekskul->id }}"><i class="fas fa-edit" title="Edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#_hapus-{{ $dt_daftarekskul->id }}"><i class="fas fa-trash" title="Delete"></i></a>
                  </td>
                </tr>
            </div>
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
                                  <form method="POST" action="{{route('daftarekskul.show', $dt_daftarekskul->id)}}">
                                    @method("GET")
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
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                  <a href="#" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i> Print</a>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          @endforeach
        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
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