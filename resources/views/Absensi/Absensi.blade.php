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
                    
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-2">
                        {{ $message }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        @foreach ($ekskul as $e)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $e->nama_ekskul }}</h5>
                                        <p class="card-text">{{ $e->kategori_ekskul }}</p>
                                        <p class="card-text">{{ $e->pelatih_ekskul }}</p>
                                        <a href="{{ route('absensi.show', $e->id) }}" class="btn btn-primary">Lihat Absensi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
