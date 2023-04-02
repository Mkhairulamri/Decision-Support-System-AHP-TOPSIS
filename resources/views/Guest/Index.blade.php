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
                            <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('CariData')}}">
                                {{-- <form action="{{route('CariData')}}" method="POST" novalidate
                                    class="needs-validation"> --}}
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="search" class="form-control form-control-lg"
                                            placeholder="Cari NISN atau Nama" name="search" class="form-control"
                                            id="search" required="">
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
