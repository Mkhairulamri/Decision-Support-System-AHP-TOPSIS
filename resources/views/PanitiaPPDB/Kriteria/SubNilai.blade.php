@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Kriteria Penilaian</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Data Kriteria</li>
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
                        <h3 class="card-title">Data Kriteria</h3>
                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambah_kriteria"><i class="fas fa-plus"></i>Tambah Keterangan Bobot</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- alert --}} @if ($message = Session::get('exist'))
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
                        @endif {{-- Tabel data panitia --}}
                        <table class="table table-bordered" id="tabel-1">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Kode Sub Nilai</th>
                                    <th>Nama Sub Nilai Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1;
                                // dd($subnilai);
                                @endphp

                                @foreach ($subnilai as $sn)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$sn->kode_subnilai}}</td>
                                    <td class="text-capitalize">{{$sn->nama_sub_nilai}}</td>
                                    <td>{{$sn->kriteria}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit{{$sn->id}}">Edit</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{$sn->id}}">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template/Footer') {{-- modal Tambah Kategori --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="tambah_kriteria">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sub Nilai Kriteria Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('SimpanSubNilai')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Sub Nilai</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-uppercase" required="" name="kode"/>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Sub Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-capitalize" required="" name="nama"/>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="kriteria">
                                    <option selected>Open this select menu</option>
                                    @foreach ($kriteria as $item)
                                        <option value="{{$item->kode_kriteria}}" name="kriteria">{{$item->kode_kriteria}} -- {{$item->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Kriteria</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($subnilai as $sn) {{-- Modal Edit --}}

<div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$sn->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Panitia PPDB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('UpdateSubNilai',$sn->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Sub Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-uppercase" required="" name="kode" value="{{$sn->kode_subnilai}}"/>
                                <div class="invalid-feedback" >
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Sub Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-capitalize" required="" name="nama" value="{{$sn->nama_sub_nilai}}"/>
                                <div class="invalid-feedback" >
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="kriteria">
                                    <option selected>Open this select menu</option>
                                    @foreach ($kriteria as $item)
                                        <option value="{{$item->kode_kriteria}}" name="kriteria"
                                            @if ($item->kode_kriteria == $sn->kriteria)
                                                selected
                                            @endif
                                        >{{$item->kode_kriteria}} -- {{$item->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Kriteria</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal Hapus --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="delete{{$sn->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Sub Nilai Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Sub Nilai Kriteria akan Hapus </p>
                <p>Apakah Anda Yakin akan Sub Nilai Krieria <strong class="text-capitalize">{{ucfirst($sn->nama_sub_nilai)}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <a href="{{route('HapusSubNilai',$sn->id)}}">
                    <button class="btn btn-primary">Hapus</button>
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
@endforeach


<script>
    $(function () {
      $("#tabel-1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false
        // "buttons": ["copy","excel", "pdf", "print", "colvis"]
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
