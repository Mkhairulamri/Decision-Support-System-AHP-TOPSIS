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
                                    {{-- Diinputkan oleh Guru `` is guru = 1 dan role = 2 --}}
                                        {{-- @foreach ($kriteria as $item)
                                            @if (Auth()->user()->role == 2 && $item->is_guru == 1)
                                                <th>{{ $item->nama_kriteria }}</th>
                                            @elseif(Auth()->user()->role == 1)
                                                <th>{{ $item->nama_kriteria }}</th>
                                            @endif
                                        @endforeach --}}
                                    <th>Validasi GuruBK</th>
                                    <th>Verifikasi Data</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // var_dump($data);
                                @endphp
                                @foreach ($data as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama'] }}</td>
                                    <td>{{ $dt['nisn'] }}</td>
                                    @php
                                    $result = 0;

                                    // foreach ($kriteria as $kr) {
                                    //     $test = $dt['data'][$kr->kode_kriteria];
                                    //     if ($dt['status'] == 1) {
                                    //         if ($dt['data'][$kr->kode_kriteria]) {
                                    //             $result++;
                                    //         }
                                    //     }
                                    //     // dd($test);
                                    // }
                                    // @endphp

                                    @if ($result == 0)
                                        <td><p class="badge badge-warning">Nilai Belum Diinputkan GuruBK</p></td>
                                    @elseif($result != 0 )
                                        <td><p class="badge badge-success">Nilai Sudah Diinputkan GuruBK</p></td>
                                    @endif
                                    {{-- @if ($dt->value == "Angka")
                                    <td>
                                    </td>
                                    @elseif($dt->value =="Pilihan")
                                    @endif --}}
                                    @if ($dt['status'] == 0)
                                        <td><p class="badge badge-warning">Belum Diverifikasi</p></td>
                                    @elseif($dt['status'] == 1)
                                        <td><p class="badge badge-success">Sudah Diverifikasi</p></td>
                                    @endif
                                    <td>
                                        <a href="{{route('LihatAlternatif',$dt['id'])}}">
                                            <button type="button" class="btn btn-outline-warning btn-sm">Lihat</button>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{$dt['id']}}"
                                            @if ($dt['status'] == 1)
                                                disabled
                                            @endif
                                            >Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
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
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template/Footer') {{-- modal Tambah Kategori --}}

@foreach ($data as $d)
<div class="modal fade col-12" tabindex="-1" role="dialog" id="delete{{$d['id']}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin akan Menghapus Data siswa <strong>{{ucfirst($d['nama'])}}</strong> dengan NISN
                    <strong>{{ucfirst($d['nisn'])}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <a href="{{route('HapusAlternatif',$d['id'])}}">
                    <button class="btn btn-primary">Hapus</button>
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

@endforeach

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
