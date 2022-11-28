@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Matriks </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Data Matriks</li>
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
                        <h3 class="card-title">
                            <a href="{{route('Matriks')}}" class="btn btn-outline-primary float-right">Pemobobtan Kriteria AHP</a>
                        </h3>
                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambah_kriteria"><i class="fas fa-plus"></i>Tambah Keterangan Bobot</button>
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
                                {{$massage}}
                            </div>
                        </div>
                        @endif @if ($message = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif {{-- Tabel data panitia --}}
                        <table class="table table-bordered"  id="bobotKriteria">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Kriteria 1</th>
                                    <th>Kriteria 2</th>
                                    <th>Nilai</th>
                                    {{-- <th>Bobot</th> --}}
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($matriks as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->kriteria1}}</td>
                                    <td>{{$item->kriteria2}}</td>
                                    <td>{{$item->nilai}}</td>
                                    {{-- <td>{{$kriteria->bobot}}</td> --}}
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit{{$item->id}}">Edit</button>
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
                <h5 class="modal-title">Tambah Kriteria Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('SimpanBobot')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria 1</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="kriteria1">
                                    <option selected>Open this select menu</option>
                                    @foreach ($kriteria as $item)
                                        <option value="{{$item->kode_kriteria}}" name="kriteria1">{{$item->kode_kriteria}} -- {{$item->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria 2</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="kriteria2">
                                    <option selected>Open this select menu</option>
                                    @foreach ($kriteria as $item)
                                        <option value="{{$item->kode_kriteria}}" name="kriteria2">{{$item->kode_kriteria}} -- {{$item->nama_kriteria}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bobot Rata-Rata</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" style="width: 100%;" aria-label="Default select example" name="bobot">
                            </div>
                        </div>
                        <input type="hidden" name="hallo" value="Hallo">

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


@foreach($matriks as $item)
{{-- Modal Edit --}}

<div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Panitia PPDB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('UpdateBobot',$item->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria 1</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="kriteria1">
                                    {{-- <option>Open this select menu</option> --}}
                                    @foreach ($kriteria as $kr1)
                                        @if($item->kriteria1 == $kr1->kode_kriteria)
                                            <option value="{{$kr1->kode_kriteria}}" name="kriteria1" selected>{{$kr1->kode_kriteria}} -- {{$kr1->nama_kriteria}}</option>
                                        @endif
                                        <option value="{{$kr1->kode_kriteria}}" name="kriteria1">{{$kr1->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kriteria 2</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" style="width: 100%;" aria-label="Default select example" name="kriteria2">
                                    {{-- <option selected>Open this select menu</option> --}}
                                    @foreach ($kriteria as $kr2)
                                        @if($item->kriteria2 == $kr2->kode_kriteria)
                                            <option value="{{$kr2->kode_kriteria}}" name="kriteria2" selected>{{$kr2->kode_kriteria}} --{{$kr2->nama_kriteria}}</option>
                                        @endif
                                        <option value="{{$kr2->kode_kriteria}}" name="kriteria2">{{$kr2->nama_kriteria}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bobot Rata-Rata</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" style="width: 100%;" aria-label="Default select example" name="bobot" value="{{$item->nilai}}">
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
{{-- Modal Hapus --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="delete{{$item->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data Matriks {{$item->nama1}} dan {{$item->nama2}} serta Kebalikannya akan dihapus</p>
                <p>Apakah Anda Yakin akan Menghapus Data Matriks??</p>
            </div>
            <div class="modal-footer">
                <a href="{{route('DeleteMatriks',$item->id)}}">
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
      $("#bobotKriteria").DataTable({
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
