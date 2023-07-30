@include('template/Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('index')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('InsertSiswa') }}" class="nav-link active">Input Data Siswa</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Login Menu -->
                <li class="nav-item dropdown">
                    <a class="btn btn-primary" href="{{ route('LoginIndex') }}" role="button">Login</a>
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
                    <div class="card-body">
                        {{-- Alert --}}
                        @if ($message = Session::get('exist'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif
                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif
                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif
                        {{-- Alert --}}
                        <form class="form-horizontal needs-validation" novalidate action="{{ route('SimpanSiswa') }}"
                            method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nama" class="form-control" placeholder="Nama Siswa"
                                            name="nama" id="validationCustom01" required="">
                                        <div class="invalid-feedback">
                                            Maaf Nama Tidak Boleh Kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input name="tgl_lahir" class="form-control" type="date" max="2013-12-25" required>
                                        {{-- <input type="date" class="form-control" placeholder="Tanggal Lahir"
                                            name="tgl_lahir" required="" min="2000-01-01" ma> --}}
                                            <div class="invalid-feedback">
                                                Maaf Tanggal Lahir Tidak Boleh Kosong
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="nisn" class="form-control" placeholder="NISN Siswa"
                                            name="nisn" required="">
                                    </div>
                                    <div class="invalid-feedback">
                                        Maaf NISN Tidak Boleh Kosong
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="minat" class="col-sm-2 col-form-label">Minat</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" aria-label=".form-control example" name="minat" required="">
                                            <option selected>Pilih Minat ... </option>
                                            @foreach ($pilihan->where('kriteria','3') as $p)
                                            <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">Nilai Rapor</label>
                                    <div class="row col-sm-10">
                                        <div class="form-group">
                                            <label for="Bind">Bahasa Indonesia</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="BIND{{$i}}" placeholder="B. Indonesia Semester {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf B.Indonesia Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                            <small class="form-text text-muted">Bahasa Indonesia Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Bahasa Inggris</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="BING{{$i}}" placeholder="B. Inggriss Semester {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf B.Inggris Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Bahasa Inggris Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Ilmu Pengetahuan Alam</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="IPA{{$i}}" placeholder="IPA Semester {{$i}}"required="">
                                                            <div class="invalid-feedback">
                                                                Maaf IPA Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Alam Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Ilmu Pengetahuan Sosial</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="IPS{{$i}}" placeholder="IPS Semester {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf IPS Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Sosial Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Matematika</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="MTK{{$i}}" placeholder="Matematika Semster {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf MTK Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Matematika Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                        </form>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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

    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("tgl_lahir")[0].setAttribute('max', today);



    console.log(name + "  " + nisn);

    var message_start = '<div class="alert alert-danger fade in"><span class="glyphicon glyphicon-triangle-top"></span><a href="#" class="close" data-dismiss="alert">×</a>';
    var message_end = '</div>';
    </script>

    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{asset('admin-lte/dist/js/demo.js')}}"></script> --}}
    <!-- jquery-validation -->
    <script src="{{ asset('admin-lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
</body>

</html>
