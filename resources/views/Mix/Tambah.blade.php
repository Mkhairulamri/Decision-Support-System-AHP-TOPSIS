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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal needs-validation" novalidate action="{{ route('SimpanAlternatif') }}"
                            method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nama" class="form-control" placeholder="Nama Siswa"
                                            name="nama" id="validationCustom01" required="">
                                        <div class="invalid-feedback">
                                            Maaf Nama Tidak Boleh Kosong.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="nisn" class="form-control" placeholder="NISN Siswa"
                                            name="nisn" required="">
                                            <div class="invalid-feedback">
                                                Maaf NISN Tidak Boleh Kosong
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input name="tgl_lahir" class="form-control" type="date" max="2013-12-25" required>
                                        {{-- <input type="date" class="form-control" placeholder="Tanggal Lahir"
                                            name="tgl_lahir" required="" min="2000-01-01" ma> --}}
                                            <div class="invalid-feedback">
                                                Maaf Tanggal Lahir Tidak Boleh Kosong
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="minat" class="col-sm-2 col-form-label">Minat</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" aria-label=".form-control example" name="minat" required="">
                                            <option selected>Pilih Minat ... </option>
                                            @foreach ($pilihan->where('kriteria','3') as $p)
                                            <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                            @endforeach
                                            <div class="invalid-feedback">
                                                Maaf Minat Tidak Boleh Kosong
                                            </div>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">Nilai Rapor</label>
                                    <div class="row col-sm-10">
                                        <div class="form-group">
                                            <label for="Bind">Bahasa Indonesia</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="BIND{{$i}}" placeholder="B. Indonesia Semester {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf B.Indonesia Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                            <small class="form-text text-muted">Bahasa Indonesia Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Bahasa Inggris</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="BING{{$i}}" placeholder="B. Inggriss Semester {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf B.Inggris Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Bahasa Inggris Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Ilmu Pengetahuan Alam</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="IPA{{$i}}" placeholder="IPA Semester {{$i}}"required="">
                                                            <div class="invalid-feedback">
                                                                Maaf IPA Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Alam Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Ilmu Pengetahuan Sosial</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="IPS{{$i}}" placeholder="IPS Semester {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf IPS Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Sosial Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Bind">Matematika</label>
                                            <div class="row">
                                                @for ($i = 1; $i<=4;$i++ )
                                                    <div class="form-group  col-sm-3">
                                                        <input type="number" class="form-control"
                                                            name="MTK{{$i}}" placeholder="Matematika Semster {{$i}}" required="">
                                                            <div class="invalid-feedback">
                                                                Maaf MTK Sem {{$i}} Tidak Boleh Kosong
                                                            </div>
                                                        <small class="form-text text-muted">Matematika Semester
                                                                {{$i}}.</small>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">Test TPA</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control"
                                            placeholder="Input Nilai Test TPA" name="tpa" required="">
                                    </div>
                                    <div class="invalid-feedback">
                                        Maaf Test TPA Tidak Boleh Kosong
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="minat" class="col-sm-2 col-form-label">Psikologi</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" aria-label=".form-control example" name="psikologi" required="">
                                            <option selected>Pilih Hasil Wawancara ... </option>
                                            @foreach ($pilihan->where('kriteria','5') as $p)
                                            <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="invalid-feedback">
                                        Maaf Hasil Wawancara Tidak Boleh Kosong
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">PreTest/PostTest</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="nisn" class="form-control"
                                            placeholder="Input Nilai PreTest/PostTest" name="pretest" required="">
                                    </div>
                                    <div class="invalid-feedback">
                                        Maaf PreTest/PostTest Tidak Boleh Kosong
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
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
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("tgl_lahir")[0].setAttribute('max', today);
    </script>
