@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Data Alternatif</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('AlternatifIndex')}}">Alternatif</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal needs-validation" novalidate action="{{route('SimpanAlternatif')}}"
                            method="POST">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nama" class="form-control" placeholder="Nama Siswa"
                                            name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="nisn" class="form-control" placeholder="NISN Siswa"
                                            name="nisn">
                                    </div>
                                </div>
                                @foreach ($kriteria as $k)
                                    @php
                                        $jumlah[$k->kode_kriteria] = 0;
                                    @endphp
                                        @if ($k->value == 'Angka')
                                            @foreach ($subnilai as $sn)
                                                @if ($k->kode_kriteria == $sn->kriteria)
                                                    @php
                                                        $jumlah[$k->kode_kriteria] +=1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                                @if ($jumlah[$k->kode_kriteria] == 0)
                                                    <div class="form-group row">
                                                        <label for="nisn" class="col-sm-2 col-form-label">{{$k->nama_kriteria}}</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" required=""
                                                                placeholder="Isi Nilai {{$k->nama_kriteria}}"
                                                                name="{{$k->kode_kriteria}}"/>
                                                            <div class="invalid-feedback">
                                                                Maaf {{$k->nama_kriteria}} Tidak Boleh Kosong
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($jumlah[$k->kode_kriteria] != 1)
                                                    <div class="form-group row">
                                                        <label for="nisn" class="col-sm-2 col-form-label">{{$k->nama_kriteria}}</label>
                                                        <div class="col-sm-10 row">
                                                            @foreach ($subnilai as $sn)
                                                            <div class="col-sm-4 mt-1">
                                                                <input type="number" class="form-control" required=""
                                                                    placeholder="Isi Nilai {{$sn->nama_sub_nilai}}"
                                                                    name="{{$k->kode_kriteria}}[{{$sn->kode_subnilai}}]"/>
                                                                <div class="invalid-feedback">
                                                                    Maaf {{$sn->nama_sub_nilai}} Tidak Boleh Kosong
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                @elseif($k->value == 'Pilihan')
                                <div class="form-group row">
                                    <label for="{{$k->kode_kriteria}}"
                                        class="col-sm-2 col-form-label">{{$k->nama_kriteria}}</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" aria-label=".form-control example"
                                            name="{{$k->kode_kriteria}}">
                                            <option selected>Pilih {{$k->nama_kriteria}}</option>
                                            @foreach ($pilihan as $p)
                                            @if($p->kriteria == $k->id)
                                            <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                {{-- <form action="{{route('SimpanAlternatif')}}" novalidate="" class="needs-validation"
                                    method="POST">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <label class="col-sm-2 d-flex align-items-center">Data Siswa Ke-{{$i}}</label>
                                        <div class="col">
                                            <div class="form-group row">
                                                <div class="col-sm-3 mt-2">
                                                    <input type="text" class="form-control" required=""
                                                        placeholder="Nama Siswa {{$i}}" name="data[{{$i}}][nama]"
                                                        style="text-transform: capitalize;" />
                                                    <div class="invalid-feedback">
                                                        Maaf Nama Tidak Boleh Kosong
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 mt-2">
                                                    <input type="number" class="form-control" required=""
                                                        placeholder="NISN" name="data[{{$i}}][nisn]" />
                                                    <div class="invalid-feedback">
                                                        Maaf NISN Tidak Boleh Kosong
                                                    </div>
                                                </div>

                                                @foreach ($kriteria as $k)
                                                @if ($k->value == 'Angka')
                                                <div class="col-sm-3 mt-2">
                                                    <input type="number" class="form-control" required=""
                                                        placeholder="Isi Nilai {{$k->nama_kriteria}}"
                                                        name="data[{{$i}}][{{$k->kode_kriteria}}]" />
                                                    <div class="invalid-feedback">
                                                        Maaf Nilai TPA Tidak Boleh Kosong
                                                    </div>
                                                </div>
                                                @elseif($k->value == 'Pilihan')
                                                <div class="col-sm-3 mt-2">
                                                    <select class="form-control" aria-label=".form-control example"
                                                        name="data[{{$i}}][{{$k->kode_kriteria}}]">
                                                        <option selected>Pilih {{$k->nama_kriteria}}</option>
                                                        @foreach ($pilihan as $p)
                                                        @if($p->kriteria == $k->id)
                                                        <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                @endforeach

                                                <input type="hidden" value="{{$jumlah}}" name="jumlah">
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                            </div> --}}
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan Data Alternatif</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('template/Footer')

    <script>
    </script>
