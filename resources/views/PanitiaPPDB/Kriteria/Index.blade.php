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
                        {{-- @if (auth()->user()->role == 1)
                            <h3 class="card-title">Data Kriteria</h3>
                            <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambah_kriteria"><i class="fas fa-plus"></i>Tambah Kriteria</button>
                        @endif --}}
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th style="text-align:center">Kode Kriteria</th>
                                    <th style="text-align:center">Nama Kriteria</th>
                                    <th style="text-align:center">Atribut</th>
                                    <th style="text-align:center">Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    // dd($kriterias);
                                @endphp
                                @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$kriteria->kode_kriteria}}</td>
                                    <td>{{$kriteria->nama_kriteria}}</td>
                                    <td>{{$kriteria->atribut}}</td>
                                    <td>{{$kriteria->bobot}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Jumlah</td>
                                    @php
                                        $jumlah = 0;

                                        foreach($kriterias as $item){
                                            $jumlah += $item->bobot;
                                        }
                                    @endphp
                                    <td>{{$jumlah}}</td>
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
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Value</label>
                            <div class="row mt-2 ml-2">
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="value" id="flexRadioDefault1" value="Cost"/>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Angka
                                    </label>
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="value" id="flexRadioDefault2" value="Pilihan" />
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Pilihan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-10">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="guru">
                                <label class="form-check-label" for="exampleCheck2">Diinputkan Oleh Guru</label>
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
