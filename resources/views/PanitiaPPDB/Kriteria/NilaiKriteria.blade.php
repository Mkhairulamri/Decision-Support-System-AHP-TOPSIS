@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Nilai Kriteria Penilaian</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Kriteria</a></li>
                    <li class="breadcrumb-item active">Nilai Kriteria</li>
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
                        <h3 class="card-title">Data Nilai Kriteria</h3>
                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#TambahNilai"><i class="fas fa-plus"></i>Tambah Nilai Kriteria</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- alert --}}
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
                        @endif {{-- Tabel data panitia --}}
                        <table class="table table-bordered" id="tabel-1">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Nama Kriteria</th>
                                    <th>Deskripsi</th>
                                    <th>Nilai Kriteria</th>
                                    <th>Bobot</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt->nama_kriteria}}</td>
                                    <td>
                                        @if ($dt->deskripsi == null)
                                            -
                                        @else
                                            {{$dt->deskripsi}}
                                        @endif
                                    </td>
                                    <td>{{$dt->nilai_kriteria}}</td>
                                    <td>{{$dt->bobot}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit{{$dt->id}}">Edit</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{$dt->id}}">Hapus</button>
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
<div class="modal fade col-12" tabindex="-1" role="dialog" id="TambahNilai">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nilai Kriteria Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('SimpanNilai')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="kriteria" required>
                                    <option selected>Pilih Kriteria</option>
                                    @foreach ($kriteria as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kriteria }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Maaf Atribut Tidak boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm">
                                <input type="number" class="form-control" name="nilai1" placeholder="Nilai2"/>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="nilai2" placeholder="Nilai2"/>
                            </div>
                            <div class="error">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="nilai" style="text-transform: capitalize;" placeholder="Nilai Kriteria"/>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bobot Kriteria</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" required="" name="bobot"/>
                                <div class="invalid-feedback" placeholder="Bobot Kriteria">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
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

@foreach($data as $d)
{{-- Modal Edit --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$d->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Nilai Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('UpdateNilai',$d->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="kriteria" required>
                                    {{-- <option selected>Pilih Kriteria</option> --}}
                                    @foreach ($kriteria as $krt)
                                        <option value="{{ $krt->id }}"
                                            {{ $d->kriteria == $krt->id ? 'selected' : '' }}>
                                            {{ $krt->nama_kriteria }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Maaf Atribut Tidak boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="deskripsi" style="text-transform:uppercase" value="{{$d->deskripsi}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="nilai" value="{{$d->nilai_kriteria}}"/>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bobot</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" required="" name="bobot" value="{{$d->bobot}}"/>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update nilai Kriteria</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal Hapus --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="delete{{$d->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Nilai Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nilai Kriteria Yang digunakan untuk Penilaian Siswa Akan Dihapus</p>
                <p>Apakah Anda Yakin akan Menghapus nilai <strong>{{ucfirst($d->nama_kriteria)}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <a href="
                {{-- {{route('HapusNilai',$d->id)}} --}}
                ">
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
 