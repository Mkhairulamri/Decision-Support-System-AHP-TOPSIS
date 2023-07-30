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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Hasil Akhir Nilai Preferensi</h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Pilihan Jurusan </th>
                                    <th>Nilai Preferensi IPA</th>
                                    <th>Nilai Preferensi IPS</th>
                                    <th>Rekom Sistem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Zeldrianto</td>
                                    <td>0067794553</td>
                                    <td>MIPA</td>
                                    <td>0.6786</td>
                                    <td>0.6181</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Erlina Salsabila D.S</td>
                                    <td>0077599279</td>
                                    <td>MIPA</td>
                                    <td>0.6371</td>
                                    <td>0.5781</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Yelsa Aspita Sari</td>
                                    <td>0077352710</td>
                                    <td>MIPA</td>
                                    <td>0.6488</td>
                                    <td>0.5880</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dhea Tri Agusti</td>
                                    <td>0069926681</td>
                                    <td>MIPA</td>
                                    <td>0.6417</td>
                                    <td>0.5650</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Salsa Andara joli</td>
                                    <td>0064380293</td>
                                    <td>MIPA</td>
                                    <td>0.5387</td>
                                    <td>0.4593</td>
                                    <td>ipa</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Regy Febita Derma</td>
                                    <td>0074099419</td>
                                    <td>MIPA</td>
                                    <td>0.6917</td>
                                    <td>0.6416</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Rinda Ayu Pratiwi</td>
                                    <td>0076093157</td>
                                    <td>MIPA</td>
                                    <td>0.6221</td>
                                    <td>0.5992</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Fitri Ramadhani</td>
                                    <td>0067353993</td>
                                    <td>MIPA</td>
                                    <td>0.4776</td>
                                    <td>0.3915</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Muhammad Syakbi septa putra</td>
                                    <td>0061162906</td>
                                    <td>MIPA</td>
                                    <td>0.4776</td>
                                    <td>0.3915</td>
                                    <td>IPA</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Nadia Azzahra</td>
                                    <td>0078445523</td>
                                    <td>MIPA</td>
                                    <td>0.6869</td>
                                    <td>0.6279</td>
                                    <td>IPA</td>
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
