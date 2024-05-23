<style>
    .event-details {
        font-family: Arial, sans-serif;
        margin: 20px;
        line-height: 1.6;
    }
    .event-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .event-details dt {
        font-weight: bold;
        width: 30%;
        float: left;
        clear: both;
    }
    .event-details dd {
        margin-left: 32%;
        margin-bottom: 10px;
    }
    .event-details img {
        max-width: 300px;
        height: auto;
        margin-top: 10px;
    }
</style>

<div class="card-body event-details">
    <div class="event-title">{{ $event->nama_kegiatan }}</div>
    <dl class="row">
        <dt>Status Event</dt>
        <dd>{{ $event->status_kegiatan }}</dd>

        <dt>Nama Event</dt>
        <dd>{{ $event->nama_kegiatan }}</dd>

        <dt>Jenis Lomba</dt>
        <dd>{{ $event->jenis_lomba }}</dd>

        <dt>Cabang Lomba</dt>
        <dd>{{ $event->cabang_lomba }}</dd>

        <dt>Penyelenggara</dt>
        <dd>{{ $event->penyelenggara_kegiatan }}</dd>

        <dt>Waktu Mulai Lomba</dt>
        <dd>{{ $event->tanggal_mulai_kegiatan }}</dd>

        <dt>Waktu Berakhir Lomba</dt>
        <dd>{{ $event->tanggal_akhir_kegiatan }}</dd>

        <dt>Nama Pembimbing</dt>
        <dd>{{ $event->nama_pembimbing }}</dd>

        <dt>Peserta Lomba</dt>
        <dd>{!! $event->nama_peserta !!}</dd>

        <dt>Alamat Kegiatan/Lomba</dt>
        <dd>{{ $event->tempat_kegiatan }}</dd>

        <dt>Foto Lomba</dt>
        <dd><img src="{{ asset('fotoevent/'.$event->foto_kegiatan) }}" class="rounded" alt="Foto Lomba"></dd>
    </dl>
</div>
<script>
    window.onload = function() {
        window.print();
    };
</script>

