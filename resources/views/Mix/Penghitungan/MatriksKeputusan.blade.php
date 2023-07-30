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
                    <li class="breadcrumb-item active">Matriks Keputusan</li>
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
                  <h3 class="card-title p-3">Matriks Keputusan</h3>
                  <ul class="nav nav-pills ml-auto p-2">
                      <li class="nav-item"><a class="nav-link  active" href="#tab_2" data-toggle="tab">Data Alternatif</a></li>
                      <li class="nav-item"><a class="nav-link" href="#tab_1" data-toggle="tab">Matriks Keputusan</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane" id="tab_1">
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
                                    <td>{{ round($dt['C01'])}} </td>
                                    <td>{{ round($dt['C02BIND'])}} </td>
                                    <td>{{ round($dt['C02BING'])}}</td>
                                    <td>{{ round($dt['C02IPA'])}} </td>
                                    <td>{{ round($dt['C02IPS'])}} </td>
                                    <td>{{ round($dt['C02MTK'])}} </td>
                                    <td>{{ round($dt['C03'])}} </td>
                                    <td>{{ round($dt['C04'])}} </td>
                                    <td>{{ round($dt['C05'])}} </td>
                                    <td>{{ round($dt['C06'])}} </td>
                                    <td>{{ round($dt['C07'])}} </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
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
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_2">
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
                                @foreach ($datas as $key => $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt['nama']}}</td>
                                    <td>{{ $dt['nisn']}}</td>
                                    <td>{{ round($dt['C01'])}} </td>
                                    <td>{{ round($dt['C02BIND'])}} </td>
                                    <td>{{ round($dt['C02BING'])}}</td>
                                    <td>{{ round($dt['C02IPA'])}} </td>
                                    <td>{{ round($dt['C02IPS'])}} </td>
                                    <td>{{ round($dt['C02MTK'])}} </td>
                                    <td>{{ round($dt['C03'])}} </td>
                                    <td>{{ round($dt['C04'])}} </td>
                                    <td>{{ round($dt['C05'])}} </td>
                                    <td>{{ round($dt['C06'])}} </td>
                                    <td>{{ round($dt['C07'])}} </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
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
                            </tfoot>
                        </table>
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- ./card -->
            </div>
            <!-- /.col -->
          </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (Auth()->user()->role == 1)
                        {{-- <a href="{{route('TambahAlternatif')}}"></a> --}}
                        <a href="{{ route('TambahAlternatif') }}" class="btn btn-outline-primary float-right"><i
                                class="fas fa-plus"></i> Tambah Data Siswa
                        </a>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body">
                        {{-- Tabel data panitia --}}

                    </div>
                </div>
            </div>
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
