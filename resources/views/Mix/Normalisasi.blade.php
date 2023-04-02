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
                    <li class="breadcrumb-item"><a href="{{route('AlternatifIndex')}}">Alternatif</a></li>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Proses Normalisasi</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                          <li class="nav-item"><a class="nav-link active" href="#kriteria" data-toggle="tab">Kriteria</a></li>
                          <li class="nav-item"><a class="nav-link" href="#konversi" data-toggle="tab">Konversi Matriks</a></li>
                          <li class="nav-item"><a class="nav-link" href="#normalisasi" data-toggle="tab">Normalisasi</a></li>
                          <li class="nav-item"><a class="nav-link" href="#terbobot" data-toggle="tab">Normalisasi Terbobot</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane active" id="kriteria">
                            <table class="table table-bordered" id="tabel-1" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no =1;
                                        $jumlah = 0;
                                    @endphp
                                    @foreach ($kriteria as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->kode_kriteria}}</td>
                                        <td>{{$item->nama_kriteria}}</td>
                                        <td>{{$item->bobot}}</td>
                                        @php
                                            $jumlah +=$item->bobot
                                        @endphp
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3 justify-center">Jumlah</th>
                                        {{-- @php
                                            $jumlah = 0;

                                            foreach($kriterias as $item){
                                                $jumlah += $item->bobot;
                                            }
                                        {{-- @endphp --}}
                                        <th>{{$jumlah}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                          </div>
                          <!-- /.Konversi -->
                          <div class="tab-pane" id="konversi">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Rapor</th>
                                        <th>TPA</th>
                                        <th>Psikotes</th>
                                        <th>Prites</th>
                                        <th>Wawancara</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Zeldrianto</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Erlina Salsabila D.S</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Yelsa Aspita Sari</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Dhea Tri Agusti</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Salsa Andara joli</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Regy Febita Derma</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Rinda Ayu Pratiwi</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Fitri Ramadhani</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Muhammad Syakbi septa putra</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Nadia Azzahra</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Fitri Ramadhani</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Muhammad Syakbi septa putra</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Nadia Azzahra</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                          <!-- /.matriks normalisasi -->
                          <div class="tab-pane" id="normalisasi">
                            <table class="table table-bordered" id="example3">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Rapor</th>
                                        <th>TPA</th>
                                        <th>Psikotes</th>
                                        <th>Prites</th>
                                        <th>Wawancara</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Zeldrianto</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.065</td>
                                        <td>0.131</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Erlina Salsabila D.S</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.065</td>
                                        <td>0.131</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Yelsa Aspita Sari</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.194</td>
                                        <td>0.087</td>
                                        <td>0.137</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Dhea Tri Agusti</td>
                                        <td>0.116</td>
                                        <td>0.091</td>
                                        <td>0.129</td>
                                        <td>0.131</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Salsa Andara joli</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.129</td>
                                        <td>0.044</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Regy Febita Derma</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.065</td>
                                        <td>0.131</td>
                                        <td>0.046</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Rinda Ayu Pratiwi</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.194</td>
                                        <td>0.044</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Fitri Ramadhani</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.065</td>
                                        <td>0.131</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Muhammad Syakbi septa putra</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.129</td>
                                        <td>0.044</td>
                                        <td>0.137</td>
                                        <td>0.046</td>
                                        <td>0.091</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Nadia Azzahra</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.129</td>
                                        <td>0.131</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Amelia Nopita Sari</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.129</td>
                                        <td>0.087</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Nabila Zahra Isami</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.129</td>
                                        <td>0.087</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Clarissa Alfitri</td>
                                        <td>0.116</td>
                                        <td>0.137</td>
                                        <td>0.129</td>
                                        <td>0.131</td>
                                        <td>0.091</td>
                                        <td>0.137</td>
                                        <td>0.137</td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                            {{-- Matriks Normalisasi Terbobot --}}
                          <div class="tab-pane" id="terbobot">
                            <table class="table table-bordered" id="example4">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Rapor</th>
                                        <th>TPA</th>
                                        <th>Psikotes</th>
                                        <th>Prites</th>
                                        <th>Wawancara</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Zeldrianto</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.019</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Erlina Salsabila D.S</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.009</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Yelsa Aspita Sari</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.028</td>
                                        <td>0.009</td>
                                        <td>0.108</td>
                                        <td>0.006</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Dhea Tri Agusti</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.011</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Salsa Andara joli</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.019</td>
                                        <td>0.005</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Regy Febita Derma</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.009</td>
                                        <td>0.014</td>
                                        <td>0.004</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Rinda Ayu Pratiwi</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.028</td>
                                        <td>0.005</td>
                                        <td>0.011</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Fitri Ramadhani</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.00 9</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Muhammad Syakbi septa putra</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.119</td>
                                        <td>0.014</td>
                                        <td>0.108</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Nadia Azzahra</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.119</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Amelia Nopita Sari</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.119</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Nabila Zahra Isami</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.119</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Clarissa Alfitri</td>
                                        <td>0.040</td>
                                        <td>0.029</td>
                                        <td>0.119</td>
                                        <td>0.014</td>
                                        <td>0.008</td>
                                        <td>0.009</td>
                                        <td>0.007</td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

@include('template/Footer')


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
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example4').DataTable({
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
