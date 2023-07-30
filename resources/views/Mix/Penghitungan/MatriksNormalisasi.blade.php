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
                    <li class="breadcrumb-item active">Normalisasi</li>
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
                  <h3 class="card-title p-3">Matriks Ternormalisasi</h3>
                  <ul class="nav nav-pills ml-auto p-2">
                      <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Matriks Normalisasi</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Ternormalisasi IPA</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Ternormalisasi IPS</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">NISN</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th rowspan="2" style="width: 20%; text-align:center">{{$kr->kode_kriteria}}</th>
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
                                @foreach ($data as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>{{ $dt['nisn']}}</td>
                                    <td>{{ round($dt['C01'],2)}} </td>
                                    <td>{{ round($dt['C02BIND'],2)}} </td>
                                    <td>{{ round($dt['C02BING'],2)}} </td>
                                    <td>{{ round($dt['C02IPA'],2)}} </td>
                                    <td>{{ round($dt['C02IPS'],2)}} </td>
                                    <td>{{ round($dt['C02MTK'],2)}} </td>
                                    <td>{{ round($dt['C03'],2)}} </td>
                                    <td>{{ round($dt['C04'],2)}} </td>
                                    <td>{{ round($dt['C05'],2)}} </td>
                                    <td>{{ round($dt['C06'],2)}} </td>
                                    <td>{{ round($dt['C07'],2)}} </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th style="width: 20%; text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                        {{-- @php
                            dd($cariakar)
                        @endphp --}}
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">NISN</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th rowspan="2" style="width: 20%; text-align:center">{{$kr->kode_kriteria}}</th>
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
                                @foreach ($dataipa as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>{{ $dt['nisn']}}</td>
                                    <td>{{ round($dt['C01'],3)}} </td>
                                    <td>{{ round($dt['C02BIND'],3)}} </td>
                                    <td>{{ round($dt['C02BING'],3)}} </td>
                                    <td>{{ round($dt['C02IPA'],3)}} </td>
                                    <td>{{ round($dt['C02IPS'],3)}} </td>
                                    <td>{{ round($dt['C02MTK'],3)}} </td>
                                    <td>{{ round($dt['C03'],3)}} </td>
                                    <td>{{ round($dt['C04'],3)}} </td>
                                    <td>{{ round($dt['C05'],3)}} </td>
                                    <td>{{ round($dt['C06'],3)}} </td>
                                    <td>{{ round($dt['C07'],3)}} </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th style="width: 20%; text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">NISN</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th rowspan="2" style="width: 20%; text-align:center">{{$kr->kode_kriteria}}</th>
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
                                    $no = 0;
                                @endphp
                                @foreach ($dataips as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d['nama']}}</td>
                                    <td>{{ $d['nisn']}}</td>
                                    <td>{{ round($d['C01'],3)}} </td>
                                    <td>{{ round($d['C02BIND'],3)}} </td>
                                    <td>{{ round($d['C02BING'],3)}} </td>
                                    <td>{{ round($d['C02IPA'],3)}} </td>
                                    <td>{{ round($d['C02IPS'],3)}} </td>
                                    <td>{{ round($d['C02MTK'],3)}} </td>
                                    <td>{{ round($d['C03'],3)}} </td>
                                    <td>{{ round($d['C04'],3)}} </td>
                                    <td>{{ round($d['C05'],3)}} </td>
                                    <td>{{ round($d['C06'],3)}} </td>
                                    <td>{{ round($d['C07'],3)}} </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    @foreach ($kriteria as $kr)
                                        @if ($kr->kode_kriteria == 'C02')
                                            <th colspan="5" style="text-align:center">C02</th>
                                        @else
                                            <th style="width: 20%; text-align:center">{{$kr->kode_kriteria}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@include('template/Footer')

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
