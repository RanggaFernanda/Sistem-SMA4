@extends('Front End.Appfront')

@section('content')
      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Selamat Datang<br><span>Di Sistem Informasi<br></span> Ektrakurikuler</h1>
      <p class="mb-4 pb-0">SMA Negeri 4 Kota Bengkulu</p>
      {{-- <a href="https://youtu.be/7nOOV_MrpxI" class="glightbox play-btn mb-4"></a> --}}
      <a href="#about" class="about-btn scrollto">Tentang EkstraSmapa</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <h2>Tentang EkstraSmapa App</h2>
            <p>EkstraSmapa App adalah Aplikasi Manajemen Ekstrakurikuler berbasis Website yang digunakan untuk pencatata kegiatan Ekstrakurikuler, Data Siswa yang mengikuti Ekstrakulikuler
              , Data Even dan Lainnya. Aplikasi ini dikembangkan oleh SMA Negeri 4 Kota Bengkulu</p>
          </div>
          <div class="col-lg-3">
            <h3>Lokasi</h3>
            <p>SMA Negeri 4 Kota Bengkulu</p>
          </div>
          <div class="col-lg-3">
            <h3>Alamat</h3>
            <p>Jln. Zainul Arifin, Kel. Timur Indah Kec. Singaran Pati, Kota Bengkulu Prov. Bengkulu</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Daftar Prestasi</h2>
          <p>List Daftar Prestasi Dan Ekskul</p>
        </div>
        <div class="row">
          @foreach ($dtfrontend as $prestasi)
            <div class="col-lg-4 col-md-6">
              <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('fotoevent/'.$prestasi->foto_kegiatan) }}" alt="Speaker 1" class="img-fluid">
                <div class="details">
                  <h3>
                    <a href="/show/{{$prestasi->id}}">{{ $prestasi->cabang_lomba }}</a>
                  </h3>
                  <p>{{ $prestasi->status_kegiatan }}</p>
                  <div class="btn">
                    <a href="/show/{{$prestasi->id}}" class="btn-primary btn-sm"><i class="fas fa-plus" title="Lihat Detail"></i> Lihat Detail</a>
                  </div>
                  
                  {{-- <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div> --}}
                </div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Speakers Section -->
    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Galeri Ekstrakurikuler</h2>
          <p>Galeri Kegiatan Ekskul SMA Negeri 4 Kota Bengkulu</p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15923.832151338087!2d102.306547055542!3d-3.8191371816023714!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b0841b7d3215%3A0x884bd8d4eefa2386!2sSMA%20Negeri%204%20Kota%20Bengkulu!5e0!3m2!1sid!2sid!4v1715244270259!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8 position-relative">
                <h3>SMA Negeri 4 Kota Bengkulu</h3>
                <p>
                  SMA Negeri 4 Kota Bengkulu.<br>
                  Jln. Zainul Arifin, Kel. Timur Indah Kec. Singaran Pati, <br>
                  Kota Bengkulu Prov. Bengkulu</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid venue-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">

          {{-- <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/1.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/2.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/3.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/4.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/5.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/6.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/7.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="{{ asset('Frontend') }}/assets/img/venue-gallery/8.jpg" class="glightbox" data-gall="venue-gallery">
                <img src="{{ asset('Frontend') }}/assets/img/venue-gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div> --}}

        </div>
      </div>
    </section>
    <!-- End Venue Section -->
  </main>
  <!-- End #main -->

@endsection