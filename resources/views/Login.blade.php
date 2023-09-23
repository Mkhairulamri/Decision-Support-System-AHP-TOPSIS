@include('template/Header')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Log </b>In</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sistem Pemilihan Jurusan MAN 2 Kuantan Singingi</p>
      @if ($message = Session::get('gagal'))
        <p class="text-danger fs-6 justify text-center">{{$message}}</p>
      @endif
      <form action="{{route('login')}}" method="post" novalidate="" class="needs-validation">
        {{csrf_field()}}
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users" ></span>
            </div>
          </div>
          <div class="invalid-feedback">
            Maaf Form Tidak Boleh Kosong
        </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            Maaf Form Tidak Boleh Kosong
        </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- - - - - -</p>
        <div class="text-center">
            <a href="{{route('index')}}">Kembali Ke Halaman Sebelumnya</a>
        </div>
      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->

@include('template/footer')
