@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Panitia PPDB</h1>
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
                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambah_kriteria"><i class="fas fa-plus"></i>Tambah Kriteria</button>
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
                                    <th>Kode Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Atribut</th>
                                    <th>Bobot</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$kriteria->kode_kriteria}}</td>
                                    <td>{{$kriteria->nama_kriteria}}</td>
                                    <td>{{$kriteria->atribut}}</td>
                                    <td>{{$kriteria->bobot}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit{{$kriteria->id}}">Edit</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete{{$kriteria->id}}">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    @php
                                        $jumlah = 0;

                                        foreach($kriterias as $item){
                                            $jumlah += $item->bobot;
                                        }
                                    @endphp
                                    <td>{{$jumlah}}</td>
                                    <td>Aksi</td>
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
<div class="modal fade col-12" tabindex="-1" role="dialog" id="tambah_kriteria">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kriteria Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('SaveKriteria')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="kode" style="text-transform: uppercase"/>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="nama" />
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Atribut</label>
                            <div class="row mt-2 ml-2">
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="atribut" id="flexRadioDefault1" value="Cost" />
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cost
                                    </label>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="atribut" id="flexRadioDefault2" value="Benefit" />
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Benefit
                                    </label>
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

@foreach($kriterias as $kriteria) {{-- Modal Edit --}}

<div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$kriteria->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Panitia PPDB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('UpdateKriteria',$kriteria->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="kode" value="{{$kriteria->kode_kriteria}}" style="text-transform: uppercase" />
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="nama" value="{{$kriteria->nama_kriteria}}" />
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Atribut</label>
                            <div class="row mt-2 ml-2">
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="atribut" id="flexRadioDefault1" value="Cost"
                                    @if ($kriteria->atribut == 'Cost')
                                        checked
                                    @endif
                                     />
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cost
                                    </label>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="atribut" id="flexRadioDefault2" value="Benefit"
                                    @if ($kriteria->atribut == 'Benefit')
                                     checked
                                     @endif
                                      />
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Benefit
                                    </label>
                                </div>
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
<div class="modal fade col-12" tabindex="-1" role="dialog" id="delete{{$kriteria->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>SubKriteria Dan Bobot Matriks Akan ikut terhapus juga</p>
                <p>Apakah Anda Yakin akan Menghapus User <strong>{{ucfirst($kriteria->nama_kriteria)}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <a href="{{route('DeleteKriteria',$kriteria->id)}}">
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
