@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Penghitungan TOPSIS</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Alternatif</a></li>
                    <li class="breadcrumb-item active">Preferensi</li>
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
            <div class="col-12">
              <!-- Custom Tabs -->
              <div class="card">
                <div class="card-header d-flex p-0">
                  <h3 class="card-title p-3">Preferensi</h3>
                  <ul class="nav nav-pills ml-auto p-2">
                      <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Preferensi IPA</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Preferensi IPS</a></li>
                      <li class="nav-item"><a class="nav-link active" href="#tab_3" data-toggle="tab">Preferensi AKHIR</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane" id="tab_1">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan</th>
                                    <th>Prefernsi</th>
                                    <th>Persen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                @foreach ($ipa as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>0{{ $dt['nisn']}}</td>
                                    @foreach ($jurusan as $jr)
                                        @if ($dt['jurusan'] == $jr->id)
                                            <td>{{ substr($jr->nilai_kriteria,0,3)}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ round($dt['preferensi'],3)}}</td>
                                    <td>{{ $dt['persen']}}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan</th>
                                    <th>Prefernsi</th>
                                    <th>Persen</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane" id="tab_1">
                              <table id="table2" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama</th>
                                          <th>NISN</th>
                                          <th>Pilihan Jurusan</th>
                                          <th>Prefernsi</th>
                                          <th>Persen</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                      $no = 1;
                                      // dd($data);
                                      @endphp
                                      @foreach ($ips as $key => $dt)
                                      <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dt['nama']}}</td>
                                        <td>0{{ $dt['nisn']}}</td>
                                        @foreach ($jurusan as $jr)
                                            @if ($dt['jurusan'] == $jr->id)
                                                <td>{{ substr($jr->nilai_kriteria,0,3)}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ round($dt['preferensi'],3)}}</td>
                                        <td>{{ $dt['persen']}}%</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>No</th>
                                          <th>Nama</th>
                                          <th>NISN</th>
                                          <th>Pilihan Jurusan</th>
                                          <th>Prefernsi</th>
                                          <th>Persen</th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <table id="table1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan</th>
                                    <th>Prefernsi</th>
                                    <th>Persen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                @foreach ($ips as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>0{{ $dt['nisn']}}</td>
                                    @foreach ($jurusan as $jr)
                                        @if ($dt['jurusan'] == $jr->id)
                                            <td>{{ substr($jr->nilai_kriteria,0,3)}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ round($dt['preferensi'],3)}}</td>
                                    <td>{{ $dt['persen']}}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan</th>
                                    <th>Prefernsi</th>
                                    <th>Persen</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_3">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan</th>
                                    <th>Preferensi IPA</th>
                                    <th>Preferensi IPS</th>
                                    <th>Rekomendasi Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                @foreach ($preferensiAkhir as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>0{{ $dt['nisn']}}</td>
                                    @foreach ($jurusan as $jr)
                                        @if ($dt['jurusan'] == $jr->id)
                                            <td>{{ substr($jr->nilai_kriteria,0,3)}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ round($dt['prefipa'],3)}}</td>
                                    <td>{{ round($dt['prefips'],3)}}</td>
                                    <td>{{ $dt['rekom']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan</th>
                                    <th>Preferensi IPA</th>
                                    <th>Preferensi IPS</th>
                                    <th>Rekomendasi Jurusan</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- ./card -->
            </div>
            <!-- /.col -->
          </div>
    </div>
</div>

@include('template/Footer') {{-- modal Tambah Kategori --}}


<script>
    $(function() {
        $("#table1").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
