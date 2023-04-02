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
                        @if(Auth()->user()->role == 1)
                            {{-- <a href="{{route('TambahAlternatif')}}"></a> --}}
                            <a href="{{route('TambahAlternatif')}}" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Tambah Data Siswa</a>
                        @endif
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
                        <table
                        @if (Auth()->user()->role == 1)
                            id="example1"
                        @elseif(Auth()->user()->role ==2)
                            id="example2"
                        @endif
                        class="table table-bordered table-striped">
                            <thead>
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
                            </thead>
                            <tbody>
                            <tr>
                              <td>1</td>
                              <td>Nama1</td>
                              <td>123123</td>
                              <td>MIPA</td>
                              @if (Auth()->user()->role == 2)
                                <td class="d-flex justify-content-center align-items-center">
                                    <p class="badge bg-warning text-white fw-bolder" disabled>Belum Diinputkan</p>
                                </td>
                              @elseif(Auth()->user()->role == 1)
                                <td>Nilai Rapor</td>
                                <td>Test TPA</td>
                                <td>Psikotes</td>
                                <td>Prites</td>
                                <td>Wawancara</td>
                                <td>Rekomendasi</td>
                              @endif
                                <td>
                                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Nama1</td>
                                <td>123123</td>
                                <td>MIPA</td>
                                @if (Auth()->user()->role == 2)
                                  <td class="d-flex justify-content-center align-items-center">
                                      <p class="badge bg-primary text-white fw-bolder" disabled>Selesai</p>
                                  </td>
                                @elseif(Auth()->user()->role == 1)
                                  <td>Nilai Rapor</td>
                                  <td>Test TPA</td>
                                  <td>Psikotes</td>
                                  <td>Prites</td>
                                  <td>Wawancara</td>
                                  <td>Rekomendasi</td>
                                @endif
                                  <td>
                                      <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
                                      <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete">Hapus</button>
                                  </td>
                              </tr>
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
<div class="modal fade col-12" tabindex="-1" role="dialog" id="TambahSiswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Data siswa yang Ditambahkan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('TambahAlternatif')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Data</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" required="" name="jumlah" placeholder="Jumlah Data"/>
                                <div class="invalid-feedback" >
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
   $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy","excel","pdf","colvis"]
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
