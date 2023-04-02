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
                        <form class="form-horizontal needs-validation" novalidate
                            action="{{ route('SimpanSiswa') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nama" class="form-control"
                                            placeholder="Nama Siswa" name="nama" id="validationCustom01">
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="nisn" class="form-control"
                                            placeholder="NISN Siswa" name="nisn">
                                    </div>
                                </div>
                                @foreach ($kriteria as $k)
                                    @php
                                        $jumlah[$k->kode_kriteria] = 0;
                                    @endphp
                                    @if ($k->is_guru == 0)
                                        @if ($k->value == 'Angka')
                                            @foreach ($subnilai as $sn)
                                                @if ($k->kode_kriteria == $sn->kriteria)
                                                    @php
                                                        $jumlah[$k->kode_kriteria] += 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($jumlah[$k->kode_kriteria] == 0)
                                                <div class="form-group row">
                                                    <label for="nisn"
                                                        class="col-sm-2 col-form-label">{{ $k->nama_kriteria }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" required=""
                                                            placeholder="Isi Nilai {{ $k->nama_kriteria }}"
                                                            name="{{ $k->kode_kriteria }}" />
                                                        <div class="invalid-feedback">
                                                            Maaf {{ $k->nama_kriteria }} Tidak Boleh Kosong
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($jumlah[$k->kode_kriteria] != 1)
                                                <div class="form-group row">
                                                    <label for="nisn"
                                                        class="col-sm-2 col-form-label">{{ $k->nama_kriteria }}</label>
                                                    <div class="col-sm-10 row">
                                                        @foreach ($subnilai as $sn)
                                                            <div class="col-sm-4 mt-1">
                                                                <input type="number" class="form-control"
                                                                    required=""
                                                                    placeholder="Isi Nilai {{ $sn->nama_sub_nilai }}"
                                                                    name="{{ $k->kode_kriteria }}[{{ $sn->kode_subnilai }}]" />
                                                                <div class="invalid-feedback">
                                                                    Maaf {{ $sn->nama_sub_nilai }} Tidak Boleh Kosong
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($k->value == 'Pilihan')
                                            <div class="form-group row">
                                                <label for="{{ $k->kode_kriteria }}"
                                                    class="col-sm-2 col-form-label">{{ $k->nama_kriteria }}</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" aria-label=".form-control example"
                                                        name="{{ $k->kode_kriteria }}">
                                                        <option selected>Pilih {{ $k->nama_kriteria }}</option>
                                                        @foreach ($pilihan as $p)
                                                            @if ($p->kriteria == $k->id)
                                                                <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @elseif($k->value == 1)
                                        <input type="hidden" class="form-control"
                                            placeholder="Isi Nilai {{ $k->nama_kriteria }}"
                                            name="{{ $k->kode_kriteria }}" />
                                    @endif
                                @endforeach
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

    var name = $('#name').val();
    var nisn = $('#nisn').val();

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
