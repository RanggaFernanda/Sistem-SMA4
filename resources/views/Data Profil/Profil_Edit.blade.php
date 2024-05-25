@extends('Layout.App')
@section('title', 'Profil Pengguna')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-primary card-outline p-2">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update', $user->id) }}">
                        @method("put")
                        @csrf
                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required autocomplete="name">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required autocomplete="email">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ekskul" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-control @error('ekskul') is-invalid @enderror" id="ekskul" name="ekskul">
                                        <option value="Laki-laki" {{ $user->ekskul == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ $user->ekskul == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('ekskul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat">{{ $user->alamat }}</textarea>
                                    @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_profil" class="col-sm-3 col-form-label">Photo Profil</label>
                                <div class="col-sm-9">
                                    <img class="profile-user-img img-fluid img-rounded" style="width: 200px" src="{{ asset('fotoprofil/' . $user->foto_profil) }}" alt="User profile picture">
                                    <br><br>
                                    <input type="file" class="form-control" name="foto_profil">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Update Profil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
