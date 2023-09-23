@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Alternatif</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Alternatif</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (Auth()->user()->role == 1)
                        {{-- <a href="{{route('TambahAlternatif')}}"></a> --}}
                        <a href="{{ route('TambahAlternatif') }}" class="btn btn-outline-primary float-right"><i
                                class="fas fa-plus"></i> Tambah Data Siswa
                        </a>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body">
                        {{-- Alert --}}
                        @if ($message = Session::get('exist'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
                        {{-- Tabel data panitia --}}
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Validasi GuruBK</th>
                                    <th>Verifikasi Data</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                @foreach ($data as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>{{ $dt['nisn'] }}</td>
                                    @if ($dt['C06'] == null && $dt['C07'] == null)
                                        <td><p class="badge badge-warning">Nilai Belum Diinputkan</p></td>
                                    @else
                                        <td><p class="badge badge-success">Nilai Sudah Diinputkan</p></td>
                                    @endif

                                    @if ($dt['status'] == 0)
                                        <td><p class="badge badge-warning">Belum Diverifikasi</p></td>
                                    @elseif($dt['status'] == 1)
                                        <td><p class="badge badge-success">Sudah Diverifikasi</p></td>
                                    @endif
                                    <td>
                                        @if ($dt['C06'] == null || $dt['C07'] == null)
                                        <a href="{{route('UpdateAlternatif',$dt['id'])}}">
                                            <button type="button" class="btn btn-outline-primary btn-sm">Input Nilai</button>
                                        </a>
                                        @else
                                        <a href="{{route('UpdateAlternatif',$dt['id'])}}">
                                            <button type="button" class="btn btn-outline-success btn-sm">Lihat Data</button>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Minat</th>
                                @if (Auth()->user()->role == 2)
                                    <th>Status</th>
                                @elseif(Auth()->user()->role == 1)
                                    <th>Nilai Rapor</th>
                                    <th>Test TPA</th>
                                    <th>Psikotes</th>
                                    <th>Prites</th>
                                    <th>Wawancara</th>
                                    <th>Rekomendasi</th>
                                    @endif
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template/Footer') {{-- modal Tambah Kategori --}}

<script>
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
