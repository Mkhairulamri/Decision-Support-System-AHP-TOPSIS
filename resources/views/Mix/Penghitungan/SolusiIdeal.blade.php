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
                    <li class="breadcrumb-item">Alternatif</li>
                    <li class="breadcrumb-item active">Solusi Ideal</li>
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
                  <h3 class="card-title p-3">Solusi Ideal</h3>
                  <ul class="nav nav-pills ml-auto p-2">
                      <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Matriks Solusi Ideal Positif Negatif</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Matriks Solusi Ideal IPA</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Matriks Solusi Ideal IPS</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <h5 class="mt-4 mb-2">Solusi Ideal Positif dan Negatif IPA</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">Keterangan</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th rowspan="2" style=" text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>B. Indonesia</th>
                                    <th>B. Inggris</th>
                                    <th>IPA</th>
                                    <th>IPS</th>
                                    <th>Matematika</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                <tr>
                                    <td>Nilai Maximum</td>
                                    <td>{{ round($dataipa['max']['C01'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C02BIND'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C02BING'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C02IPA'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C02IPS'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C02MTK'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C03'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C04'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C05'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C06'],3) }}</td>
                                    <td>{{ round($dataipa['max']['C07'],3) }}</td>
                                </tr>
                                <tr>
                                    <td>Nilai Minimum</td>
                                    <td>{{ round($dataipa['min']['C01'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C02BIND'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C02BING'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C02IPA'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C02IPS'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C02MTK'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C03'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C04'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C05'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C06'],3) }}</td>
                                    <td>{{ round($dataipa['min']['C07'],3) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Keterangan</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th style="text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                        <h5 class="mt-4 mb-2">Solusi Ideal Positif dan Negatif IPS</h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">Keterangan</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th rowspan="2" style="text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>B. Indonesia</th>
                                    <th>B. Inggris</th>
                                    <th>IPA</th>
                                    <th>IPS</th>
                                    <th>Matematika</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                <tr>
                                    <td>Nilai Maximum</td>
                                    <td>{{ round($dataips['max']['C01'],3) }}</td>
                                    <td>{{ round($dataips['max']['C02BIND'],3) }}</td>
                                    <td>{{ round($dataips['max']['C02BING'],3) }}</td>
                                    <td>{{ round($dataips['max']['C02IPA'],3) }}</td>
                                    <td>{{ round($dataips['max']['C02IPS'],3) }}</td>
                                    <td>{{ round($dataips['max']['C02MTK'],3) }}</td>
                                    <td>{{ round($dataips['max']['C03'],3) }}</td>
                                    <td>{{ round($dataips['max']['C04'],3) }}</td>
                                    <td>{{ round($dataips['max']['C05'],3) }}</td>
                                    <td>{{ round($dataips['max']['C06'],3) }}</td>
                                    <td>{{ round($dataips['max']['C07'],3) }}</td>
                                </tr>
                                <tr>
                                    <td>Nilai Minimum</td>
                                    <td>{{ round($dataips['min']['C01'],3) }}</td>
                                    <td>{{ round($dataips['min']['C02BIND'],3) }}</td>
                                    <td>{{ round($dataips['min']['C02BING'],3) }}</td>
                                    <td>{{ round($dataips['min']['C02IPA'],3) }}</td>
                                    <td>{{ round($dataips['min']['C02IPS'],3) }}</td>
                                    <td>{{ round($dataips['min']['C02MTK'],3) }}</td>
                                    <td>{{ round($dataips['min']['C03'],3) }}</td>
                                    <td>{{ round($dataips['min']['C04'],3) }}</td>
                                    <td>{{ round($dataips['min']['C05'],3) }}</td>
                                    <td>{{ round($dataips['min']['C06'],3) }}</td>
                                    <td>{{ round($dataips['min']['C07'],3) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Keterangan</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th style="text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>S+</th>
                                    <th>S-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                @foreach ($jarakIPA as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>0{{ $dt['nisn']}}</td>
                                    <td>{{ round($dt['plus'],4)}} </td>
                                    <td>{{ round($dt['min'],4)}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>S+</th>
                                    <th>S-</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>S+</th>
                                    <th>S-</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                // dd($data);
                                @endphp
                                @foreach ($jarakIPS as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>0{{ $dt['nisn']}}</td>
                                    <td>{{ round($dt['plus'],4)}} </td>
                                    <td>{{ round($dt['min'],4)}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>S+</th>
                                    <th>S-</th>
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
