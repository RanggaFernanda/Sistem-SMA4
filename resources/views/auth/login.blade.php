<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EKSTRASMAPA | Login App</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('assets/img/smapa.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.7); /* Menambahkan overlay hitam */
    }

    .login-box {
      width: 400px;
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Mengubah bayangan menjadi lebih gelap */
    }

    .card-header img {
      width: 50px;
      height: 50px;
    }

    .card-header .h1 {
      font-size: 24px; /* Memperbaiki ukuran font */
      margin: 10px 0;
      color: green; /* Mengubah warna teks EKSTRASMAPA menjadi hijau */
    }

    .login-box-msg {
      color: #333; /* Mengatur warna teks pesan login */
    }

    .form-control {
      border: 2px solid #ced4da; /* Mengatur warna border default */
    }

    .form-control:focus {
      border-color: green; /* Mengatur warna border saat fokus */
      box-shadow: none; /* Menghapus shadow default saat fokus */
    }

    .input-group-text {
      border: 2px solid #ced4da; /* Mengatur warna border ikon */
      border-left: none; /* Menghilangkan border kiri pada ikon */
    }
    .btn-primary {
      background-color: green; /* Mengubah warna latar belakang tombol Sign In menjadi hijau */
      border-color: green; /* Mengubah warna border tombol Sign In menjadi hijau */
    }

    .btn-primary:hover {
      background-color: #28a745; /* Mengubah warna latar belakang tombol Sign In saat dihover menjadi hijau tua */
      border-color: #28a745; /* Mengubah warna border tombol Sign In saat dihover menjadi hijau tua */
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="{{ asset('adminLTE') }}/dist/img/logsmapa.png" alt="User Image">
        <a href="../../index2.html" class="h1"><b>EKSTRASMAPA</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Masuk Dengan Akun yang Benar</p>

        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="form-group">
            <div class="input-group mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <div class="col-8">
              <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <div class="text-center mt-2 mb-3">
          {{-- Uncomment these lines if you want to enable social login --}}
          {{-- <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a> --}}
        </div>

        <p class="mb-1">
          <a href="forgot-password.html">Lupa Password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('registering') }}" class="text-center">Register a new membership</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
