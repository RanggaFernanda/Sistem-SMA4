<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EKSTRASMAPA | Register</title>
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
    }

    .register-box {
      width: 400px;
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header img {
      width: 50px;
      height: 50px;
    }

    .card-header .h1 {
      font-size: 24px;
      margin: 10px 0;
      color: green;
    }

    label {
      color: green;
    }

    .form-control {
      border: 2px solid green;
    }

    .form-control:focus {
      border-color: green;
      box-shadow: none;
    }

    .btn-primary {
      background-color: green;
      border-color: green;
    }

    .btn-primary:hover {
      background-color: #28a745;
      border-color: #28a745;
    }
  </style>
</head>

<body>
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="{{ asset('adminLTE') }}/dist/img/logsmapa.png" alt="User Image">
        <a href="../../index2.html" class="h1"><b>EKSTRASMAPA</b></a>
      </div>
      <div class="card-body">
        <p class="register-box-msg">Buat akun Anda</p>
        <form method="POST" action="{{ route('register.store') }}">
          @csrf
          <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>

          <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary btn-block">
              {{ __('Register') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
