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
                                    <th>Guru BK</th>
                                    @if (Auth()->user()->role == 1)
                                        <th>Admin PPDB</th>
                                    @endif
                                    <th>Kriteria 2</th>
                                    @if (Auth()->user()->role == 1)
                                        <th>Bobot</th>
                                    @endif
                                    <th class="d-flex justify-content-center">Aksi</th>
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
                                    <td>
                                        @if ($item->gurubk == null)
                                            0
                                        @elseif($item->gurubk != null)
                                            {{$item->gurubk}}
                                        @endif
                                    </td>
                                    @if (Auth()->user()->role == 1)
                                        <td>
                                            @if ($item->panitia == null)
                                                0
                                            @elseif($item->panitia != null)
                                                {{$item->panitia}}
                                            @endif
                                        </td>
                                    @endif
                                    <td>{{$item->kriteria2}}</td>
                                    @if (Auth()->user()->role == 1)
                                        <td>
                                            {{-- {{$item->nilai}} --}}
                                            {{($item->gurubk + $item->panitia)/2}}
                                        </td>
                                    @endif
                                    {{-- <td>{{$kriteria->bobot}}</td> --}}
                                    <td class="d-flex align-items-center justify-content-center">

                                        @php
                                        $edit = gettype((($item->gurubk+$item->panitia)/2))
                                        @endphp
                                            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit{{$item->id}}">Edit</button>
                                        @if ($edit == 'integer')
                                        @elseif($edit == 'double')
                                            {{-- <span class="badge badge-danger">Edit di Inversnya</span> --}}
                                        @endif
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
                <h5 class="modal-title">Tambah Kriteria Penilaian -
                    @if (Auth()->user()->role == 1)
                        Panitia
                    @elseif(Auth()->user()->role == 2)
                        Guru BK
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate=""
                    @if (Auth()->user()->role == 1)
                        action="{{route('SimpanBobotPanitia')}}"
                    @elseif(Auth()->user()->role == 2)
                        action="{{route('SimpanBobotGuru')}}"
                    @endif
                    method="POST">
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
                            <label class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <select class="form-control" aria-label=".form-control example" name="bobot">
                                    <option selected>Intensitas kepentingan</option>
                                    <option value="1">1 - Sama Penting dengan</option>
                                    <option value="2">2 - Berdekatan dengan</option>
                                    <option value="3">3 - Sedikit Lebih Penting Dari</option>
                                    <option value="4">4 - Berdekatan dengan</option>
                                    <option value="5">5 - Lebih Penting Dari</option>
                                    <option value="6">6 - Berdekatan dengan</option>
                                    <option value="7">7 - Jelas Lebih Mutlak Dari</option>
                                    <option value="8">8 - Berdekatan dengan</option>
                                    <option value="9">9 - Mutlak Lebih Penting Dari</option>
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
                        <input type="hidden" name="hallo" value="Hallo">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Bobot Kepentingan</button>
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
                <h5 class="modal-title">Edit Data Matriks Bobot - Panitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate=""
                    @if (Auth()->user()->role == 1)
                        action="{{route('UpdateBobotPanitia',$item->id)}}"
                    @elseif(Auth()->user()->role == 2)
                        action="{{route('UpdateBobotGuru',$item->id)}}"
                    @endif method="POST">
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
                            <label class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <select class="form-control" aria-label=".form-control example" name="bobot">
                                    <option>Intensitas kepentingan</option>
                                    <option value="1"
                                        @if ($item->panitia == 1)
                                            selected
                                        @endif
                                    >1 - Sama Penting dengan</option>
                                    <option value="2"
                                        @if ($item->panitia == 2 || $item->panitia == 2 )
                                            selected
                                        @endif
                                    >2 - Berdekatan dengan</option>
                                    <option value="3"
                                        @if ($item->panitia == 3)
                                            selected
                                        @endif
                                    >3 - Sedikit Lebih Penting Dari</option>
                                    <option value="2"
                                        @if ($item->panitia == 4)
                                            selected
                                        @endif
                                    >4 - Berdekatan dengan</option>
                                    <option value="5"
                                        @if ($item->panitia == 5)
                                            selected
                                        @endif
                                    >5 - Lebih Penting Dari</option>
                                    <option value="6"
                                        @if ($item->panitia == 6)
                                            selected
                                        @endif
                                    >6 - Berdekatan dengan</option>
                                    <option value="7"
                                        @if ($item->panitia == 7)
                                            selected
                                        @endif
                                    >7 - Jelas Lebih Mutlak Dari</option>
                                    <option value="8"
                                        @if ($item->panitia == 8)
                                            selected
                                        @endif
                                    >8 - Berdekatan dengan</option>

                                    <option value="9"
                                        @if ($item->panitia == 9)
                                            selected
                                        @endif
                                    >9 - Mutlak Lebih Penting Dari</option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Bobot Kepentingan</button>
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
