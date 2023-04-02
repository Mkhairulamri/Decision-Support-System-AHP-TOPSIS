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
                        <h3 class="card-title p-3">Nilai Preferensi</h3>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Solusi Ideal Positif(S+)</th>
                                    <th>Solusi Ideal Negatif(S-)</th>
                                    <th>Nilai Preferensi</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Zeldrianto</td>
                                    <td>0067794553</td>
                                    <td>0,0175</td>
                                    <td>0,0281</td>
                                    <td>0,6163</td>
                                    <td>18</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Erlina Salsabila D.S</td>
                                    <td>0077599279</td>
                                    <td>0,0238</td>
                                    <td>0,0265</td>
                                    <td>0,5277</td>
                                    <td>35</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Yelsa Aspita Sari</td>
                                    <td>0077352710</td>
                                    <td>0,0172</td>
                                    <td>0,0317</td>
                                    <td>0,6486</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dhea Tri Agusti</td>
                                    <td>0069926681</td>
                                    <td>0,0200</td>
                                    <td>0,0225</td>
                                    <td>0,5297</td>
                                    <td>31 </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Salsa Andara joli</td>
                                    <td>0064380293</td>
                                    <td>0,0217</td>
                                    <td>0,0266</td>
                                    <td>0,5505</td>
                                    <td>29</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Regy Febita Derma</td>
                                    <td>0074099419</td>
                                    <td>0,0246</td>
                                    <td>0,0263</td>
                                    <td>0,5160</td>
                                    <td>45</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Rinda Ayu Pratiwi</td>
                                    <td>0076093157</td>
                                    <td>0,0193</td>
                                    <td>0,0318</td>
                                    <td>0,6223</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Fitri Ramadhani</td>
                                    <td>0067353993</td>
                                    <td>0,0238</td>
                                    <td>0,0265</td>
                                    <td>0,5277</td>
                                    <td>36</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Muhammad Syakbi septa putra</td>
                                    <td>0061162906</td>
                                    <td>0,0231</td>
                                    <td>0,0265</td>
                                    <td>0,5344</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Nadia Azzahra</td>
                                    <td>0078445523</td>
                                    <td>0,0192</td>
                                    <td>0,0270</td>
                                    <td>0,5844</td>
                                    <td>24</td>
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
