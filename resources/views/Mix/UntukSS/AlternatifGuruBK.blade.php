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
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- alert --}}
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    @foreach ($kriteria as $item)
                                        {{-- Diinputkan oleh Guru `` is guru = 1 dan role = 2 --}}
                                        @if (Auth()->user()->role == 2 && $item->is_guru == 1)
                                            <th>{{ $item->nama_kriteria }}</th>
                                        @endif
                                    @endforeach
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    // dd($data[0]);
                                @endphp
                                @foreach ($data as $key => $dt)
                                    @php
                                        // dd($dt['data']['C01']);
                                    @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dt['nama'] }}</td>
                                        <td>{{ $dt['nisn'] }}</td>
                                        @foreach ($kriteria as $item)
                                            @php
                                                $rata = 0;
                                                $jumlah = count($subnilai);
                                                // dd($subnilai->where('kriteria',$item->kode_kriteria)->first());
                                            @endphp
                                            @if ($item->is_guru == 1)
                                                <td>{{$dt['data'][$item->kode_kriteria]}}</td>
                                            @endif
                                            {{-- @if ($item->value == "Angka")
                                                @if ($subnilai->where('kriteria', $item->kode_kriteria)->first())
                                                    @foreach ($subnilai as $sn)
                                                        @php
                                                            // dd($dt[$item->kode_kriteria][$sn->kode_subnilai]);
                                                            $rata += $dt['data'][$item->kode_kriteria][$sn->kode_subnilai];
                                                        @endphp
                                                    @endforeach
                                                    <td>{{ $rata / $jumlah }}</td>
                                                @else
                                                    <td>{{ $dt['data'][$item->kode_kriteria] }}</td>
                                                @endif
                                            @elseif($item->value =="Pilihan")
                                                @foreach ($nilai as $kr)
                                                    @if ($dt['data'][$item->kode_kriteria] == $kr->id)
                                                        <td>{{ ucfirst($kr->nilai_kriteria) }}</td>
                                                    @endif
                                                @endforeach
                                            @endif --}}
                                        @endforeach
                                        <td>
                                            @php
                                                // dd($dt['id'])
                                            @endphp
                                            <button type="button" class="btn btn-outline-warning btn-sm"
                                                data-toggle="modal" data-target="#edit{{$dt['id']}}">Edit</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-toggle="modal" data-target="#delete{{$dt['id']}}">Hapus</button>
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
                <p>Apakah Anda Yakin akan Menghapus Data siswa <strong>{{ucfirst($d['nama'])}}</strong> dengan NISN <strong>{{ucfirst($d['nisn'])}}</strong>?</p>
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
