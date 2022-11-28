@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Matriks dan Pemobotan Kriteria</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('MatriksIndex')}}">Matriks</a></li>
                    <li class="breadcrumb-item active">Pembobotan</li>
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
                            Matriks Perbandingan AHP
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><!-- Empty for the left top corner of the table --></th>
                                        @foreach ($columns as $column)
                                        <th style="">{{ $column }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($rows as $kriteria1 => $columns)
                                    <tr>
                                        <td><strong>{{ $kriteria1 }}</strong></td>
                                        @foreach ($columns as $kriteria2 => $bobot)
                                            <td>{{$bobot}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h3 class="card-title">
                            Prioritas Vektor Kriteria
                        </h3>
                        <br>
                        <div class="table-responsive">
                            <table class="table-striped table">
                                <thead>
                                    <th>#</th>
                                    @foreach ($kriteria as $kr)
                                        <th>{{$kr->kode_kriteria}}</th>
                                    @endforeach
                                </thead>
                                <tbody>
                                    <td>Prioritas</td>
                                    @foreach ($kriteria as $k)
                                        <td>{{round($prioritas[$k->kode_kriteria],5)}}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h4 class="card-title">
                            <a href="{{route('UpdateBobotKriterai')}}" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#UpdateBobot">
                                <i class="fas fa-plus"></i> Update Bobot Kriteria
                            </a>
                        </h4>
                        <br>
                        @php
                            $no = 1;
                        @endphp
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Kode Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot Akhir</th>
                            </thead>
                            <tbody>
                                @foreach ($bobotKriteria as $bt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$bt['kode']}}</td>
                                    <td>{{$bt['nama']}}</td>
                                    <td>{{round($bt['bobot'],5)}}</td>
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
</div>

@include('template/Footer') {{-- modal Tambah Kategori --}}

<div class="modal fade col-12" tabindex="-1" role="dialog" id="UpdateBobot">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Bobot Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan Megupdate Data Bobot Kriteria</strong>?</p>
            </div>
            <div class="modal-footer">
                <a href="{{route('SimpanBobotKriteria')}}">
                    <button class="btn btn-primary">Simpan bobot</button>
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
