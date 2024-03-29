@include('template/Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link active">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('InsertSiswa')}}" class="nav-link">Input Data Siswa</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Login Menu -->
                <li class="nav-item dropdown">
                    <a class="btn btn-primary" href="{{route('LoginIndex')}}" role="button">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4">Cari Data</h2>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form class="row g-3 needs-validation" novalidate method="POST"
                                action="{{route('CariData')}}">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg"
                                        placeholder="Cari NISN atau Nama" name="search" class="form-control" id="search"
                                        required="" value="{{$cari}}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback">
                                        Maaf Form Tidak Boleh Kosong
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 offset-md-2">
                            @php
                                $jumlah = count($data);
                                $no = 1;
                            @endphp
                            @if ($jumlah != 0)
                                <h3 class="m-2  text-center">
                                    Hasil yang didapatkan adalah {{$jumlah}}
                                </h3>
                                <p class="font-monospace text-center">{{$jumlah}} Hasil untuk Kata Kunci <span class="text-danger">{{$cari}} ... </span></p>
                                @if ($hasil == 'failed')
                                <div class="alert alert-danger alert-dismissible show fade" role="alert">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{$message}}
                                    </div>
                                </div>
                                @endif
                                <table class="table table-bordered mt-3"  id="bobotKriteria">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">#</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">NISN</th>
                                            <th class="text-center">Inputan</th>
                                            <th class="text-center">Hasil</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $dt)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$dt->nama}}</td>
                                            <td>{{$dt->nisn}}</td>
                                            <td>Nilai Psikotes dan Wawancara Belum Diinputkan</td>
                                            @if ($dt->ranking == null)
                                            <td>
                                                <p class="badge badge-warning">Hasil Belum Didapatkan</p>
                                            </td>
                                            @else
                                            <td>
                                                <p class="badge badge-primary">Hasil Sudah Didapatkan</p>
                                            </td>
                                            @endif
                                            <td>
                                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#verifikasi">Lihat Data</button>
                                                {{-- <a href="{{route('DetailGuess',$dt->id)}}">
                                                </a> --}}
                                                <div class="modal fade col-12" tabindex="-1" role="dialog" id="verifikasi">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Verifikasi Data Siswa</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Silahkan input Tanggal Lahir dan NISN Anda</p>
                                                            <form class="needs-validation" novalidate="" action="{{route('DetailGuess',$dt->id)}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">NISN</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" class="form-control" required="" name="nisn"/>
                                                                        <div class="invalid-feedback">
                                                                            Maaf Form Tidak Boleh Kosong
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" class="form-control" required="" name="tgl_lahir" max="2013-12-25"/>
                                                                        <div class="invalid-feedback">
                                                                            Maaf Form Tidak Boleh Kosong
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden"value="{{$cari}}" name="cari">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="m-2 text-center">
                                    Kata Kunci Yang anda Masukkan Tidak Ditemukan
                                </h3>
                                <h4 class="font-monospace text-center">0 Hasil untuk Kata Kunci <span class="text-danger">{{$cari}} ... </span></h4>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="#">MAN 2 Kuantan Singingi</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>

    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("tgl_lahir")[0].setAttribute('max', today);

        $("#bobotKriteria").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false
            // "buttons": ["copy","excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#hasil').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>

    <!-- jQuery -->
    <script src="{{asset('admin-lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-lte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('admin-lte/dist/js/demo.js')}}"></script> --}}
    <!-- jquery-validation -->
    <script src="{{asset('admin-lte/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin-lte/plugins/jquery-validation/additional-methods.min.js')}}"></script>
</body>

</html>
