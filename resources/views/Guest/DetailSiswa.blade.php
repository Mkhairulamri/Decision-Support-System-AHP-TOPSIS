@include('template/Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('index')}}" class="nav-link active">Home</a>
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
                <div class="container-fluid p-5">
                    <div class="card ">
                        <div class="card-body mt-5">
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
                            <H2 class="text-center">Data Siswa</H2>
                            <div class="row p-3">
                                <div class="row">
                                </div>
                                <br>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Siswa</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="nama" class="form-control"
                                                value="{{ $data['nama'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nisn" class="col-sm-4 col-form-label">NISN Siswa</label>
                                        <div class="col-sm-8">
                                            <input type="number" id="nisn" class="form-control"
                                                value="{{ $data['nisn'] }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nisn" class="col-sm-4 col-form-label">Minat</label>
                                        <div class="col-sm-8">
                                            @foreach ($pilihan as $p)
                                                @if ($p->id == $data['C01'] && $p->kriteria == 3)
                                                    <input type="text" id="nisn" class="form-control"
                                                        value="{{ $p->nilai_kriteria }}" disabled>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" style=" align-items:center; justify-content:center;">
                                    @if($data['jurusan'] != null)
                                        @if($data['jurusan'] == 'IPA')
                                            <img src="{{asset ('asset/img/IPA.jpg')}}" alt="IPA" style="width: 200px; height:200px; margin-left:100px">
                                        @elseif($data['jurusan'] == 'IPS')
                                            <img src="{{asset ('asset/img/IPS.jpg')}}" alt="IPS" style="width: 200px; height:200px; margin-left:100px">
                                        @else
                                            <p class="text-center text-warning border border-danger">Nilai Rekomendasi Berbeda dari Seharusnya, <br>Silahkan Hubungi Admin PPDB</p>
                                        @endif
                                    @else
                                            {{-- <img src="{{asset('asset/img/belum.png')}}" alt="belum" style="width:200px; height:200px; border-radius:15px; margin-right:30%;align-items:center"> --}}
                                            <br>
                                            <p class="text-center text-warning border border-danger">Belum Ada rekomendasi Sistem terhadap Nama yang Tertera, <br>Silahkan Hubungi Admin PPDB</p>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Nilai Rapor</label>
                                <div class="row col-sm-10">
                                    <div class="form-group">
                                        <label for="Bind">Bahasa Indonesia</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'BIND')
                                                    @php
                                                        $bind = json_decode($data['C02BIND']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Bahasa Indonesia Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group mt-0">
                                        <label for="Bind">Bahasa Inggris</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'BING')
                                                    @php
                                                        $bind = json_decode($data['C02BING']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Bahasa Inggris Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group mt-0">
                                        <label for="Bind">Ilmu Pengetahuan Alam</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'IPA')
                                                    @php
                                                        $bind = json_decode($data['C02IPA']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Alam Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><div class="form-group mt-0">
                                        <label for="Bind">Ilmu Pengetahuan Sosial</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'IPS')
                                                    @php
                                                        $bind = json_decode($data['C02IPS']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Sosial
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><div class="form-group mt-0">
                                        <label for="Bind">Matematika</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'MTK')
                                                    @php
                                                        $bind = json_decode($data['C02MTK']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Matematika Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Test TPA</label>
                                <div class="col-sm-10">
                                    <input type="number" id="nisn" class="form-control"
                                        value="{{ $data['C03'] }}" disabled>
                                    @if ($data['C03'] == null)
                                        <small class="form-text text-muted">Nilai Belum Diinputkan Oleh Guru BK.</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Psikologi</label>
                                <div class="col-sm-10">
                                    @if ($data['C04'] != null)
                                    @foreach ($pilihan as $p)
                                        @if ($p->id == $data['C04'])
                                            <input type="text" id="nisn" class="form-control"
                                                value="{{ ucfirst($p->nilai_kriteria) }}" disabled>
                                        @endif
                                    @endforeach
                                @elseif($data['C04'] == null)
                                    <input type="text" id="nisn" class="form-control"
                                    value="" disabled>
                                    <small class="form-text text-muted">Nilai Belum Diinputkan Oleh Guru BK.</small>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">PreTest/PostTest</label>
                                <div class="col-sm-10">
                                @if ($data['C05'] != null)
                                    <input type="number" id="nisn" class="form-control"
                                        value="{{ $data['C05'] }}" disabled>
                                @elseif($data['C05'] == null)
                                    <input type="text" id="nisn" class="form-control"
                                    value="" disabled>
                                    <small class="form-text text-muted">Nilai Belum Diinputkan Oleh Guru BK.</small>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Wawancara</label>
                                <div class="col-sm-10">
                                    @if ($data['C06'] != null)
                                    @foreach ($pilihan as $p)
                                        @if ($p->id == $data['C06'])
                                            <input type="text" id="nisn" class="form-control"
                                                value="{{ $p->nilai_kriteria }}" disabled>
                                        @endif
                                    @endforeach
                                @elseif($data['C06'] == null)
                                    <input type="text" id="nisn" class="form-control"
                                    value="" disabled>
                                    <small class="form-text text-muted">Nilai Belum Diinputkan Oleh Guru BK.</small>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Rekom Guru</label>
                                <div class="col-sm-10">
                                    @if ($data['C07'] != null)
                                        @foreach ($pilihan as $p)
                                            @if ($p->id == $data['C07'])
                                                <input type="text" id="nisn" class="form-control"
                                                    value="{{ $p->nilai_kriteria }}" disabled>
                                            @endif
                                        @endforeach
                                    @elseif($data['C07'] == null)
                                        <input type="text" id="nisn" class="form-control"
                                        value="" disabled>
                                        <small class="form-text text-muted">Nilai Belum Diinputkan Oleh Guru BK.</small>
                                    @endif
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary" data-toggle="modal"
                                    data-target="#verifikasi">Edit Data</button>
                                <button type="button" class="btn btn-secondary">Kembali Kehalaman Sebelumnya</button>
                            </div>
                            <div class="modal fade col-12" tabindex="-1" role="dialog" id="verifikasi">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Verifikasi Edit Data Siswa</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">

                                            <form class="form-horizontal needs-validation mt-3" novalidate action="{{ route('EditGuess',$data['id']) }}"method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label for="nisn" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-9">
                                                    <input name="tgl_lahir" class="form-control" type="date" max="2013-12-25" required>
                                                    {{-- <input type="date" class="form-control" placeholder="Tanggal Lahir"
                                                        name="tgl_lahir" required="" min="2000-01-01" ma> --}}
                                                        <div class="invalid-feedback">
                                                            Maaf Tanggal Lahir Tidak Boleh Kosong
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nisn" class="col-sm-3 col-form-label">NISN Siswa</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="nisn" class="form-control" placeholder="NISN Siswa"
                                                        name="nisn" required="">
                                                </div>
                                                <div class="invalid-feedback">
                                                    Maaf NISN Tidak Boleh Kosong
                                                </div>
                                            </div>
                                            {{-- <input type="hidden" value="{{ $data['id'] }}"> --}}
                                            <small class="text-danger text-center">Mohon Inputkan NISN dan Tanggal Lahir Sebagai Verifikasi Edit Data</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Edit Data</button>
                                            <button type="button" class="btn btn-secondary"
                                            d>Batal</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </form>
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

        //Validasi Tanggal
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
