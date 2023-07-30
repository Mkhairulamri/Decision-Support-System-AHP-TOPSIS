@include('template/Navbar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lihat Data Siswa</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('AlternatifIndex') }}">Alternatif</a></li>
                    <li class="breadcrumb-item active">Update</li>
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
                        <div class="card-body">
                            <form class="needs-validation" novalidate="" action="{{route('UpdateAlternatifGuru',$data['id'])}}" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama" class="form-control"
                                        value="{{ $data['nama'] }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">NISN Siswa</label>
                                <div class="col-sm-10">
                                    <input type="number" id="nisn" class="form-control"
                                        value="{{ $data['nisn'] }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Minat</label>
                                <div class="col-sm-10">
                                    @foreach ($pilihan as $p)
                                        @if ($p->id == $data['C01'] && $p->kriteria == 3)
                                            <input type="text" id="nisn" class="form-control"
                                                value="{{ $p->nilai_kriteria }}" disabled>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                @php
                                    // $dataip = json_decode($data['C02IPS']);
                                    // dd($dataip->IPS1)
                                @endphp
                                <label for="nisn" class="col-sm-2 col-form-label">Nilai Rapor</label>
                                <div class="row col-sm-10">
                                    <div class="form-group">
                                        <label for="Bind">Bahasa Indonesia</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'BIND')
                                                    @php
                                                        $bind = json_decode($data['C02BIND']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Bahasa Indonesia Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group mt-0">
                                        <label for="Bind">Bahasa Inggris</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'BING')
                                                    @php
                                                        $bind = json_decode($data['C02BING']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Bahasa Inggris Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group mt-0">
                                        <label for="Bind">Ilmu Pengetahuan Alam</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'IPA')
                                                    @php
                                                        $bind = json_decode($data['C02IPA']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Alam Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><div class="form-group mt-0">
                                        <label for="Bind">Ilmu Pengetahuan Sosial</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'IPS')
                                                    @php
                                                        $bind = json_decode($data['C02IPS']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Ilmu Pengetahuan Sosial
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><div class="form-group mt-0">
                                        <label for="Bind">Matematika</label>
                                        <div class="row">
                                            @foreach ($subnilai as $sn)
                                                @if ($sn->pelajaran == 'MTK')
                                                    @php
                                                        $bind = json_decode($data['C02MTK']);
                                                        $value = $sn->kode_subnilai;
                                                    @endphp
                                                    <div class="form-group  col-sm-3">
                                                        <input type="text" class="form-control"
                                                            value="{{ $bind->$value }}" disabled>
                                                        <small class="form-text text-muted">Matematika Semester
                                                            {{$sn->semester}}.</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Test TPA</label>
                                <div class="col-sm-10">
                                    @if($data['C03'] != null)
                                    <input type="text" id="nisn" class="form-control"
                                        name="testTPA" disabled  value="{{ $data['C03'] }}">
                                        <div class="invalid-feedback">
                                            Maaf Test TPA Tidak Boleh Kosong
                                        </div>
                                    @elseif($data['C03'] == null)
                                        <input type="text" id="nisn" class="form-control"
                                        value="" disabled>
                                        <small class="form-text text-muted">Nilai Belum Diinputkan oleh Admin PPDB.</small>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Psikologi</label>
                                <div class="col-sm-10">
                                    @if ($data['C04'] != null)
                                    @foreach ($pilihan as $p)
                                        @if ($p->id == $data['C04'])
                                            <input type="text" id="psikologi" class="form-control"
                                                value="{{ $p->nilai_kriteria }}" disabled>
                                        @endif
                                    @endforeach
                                    @elseif($data['C04'] == null)
                                        <input type="text" id="nisn" class="form-control"
                                        value="" disabled>
                                        <small class="form-text text-muted">Nilai Belum Diinputkan oleh Admin PPDB.</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">PreTest/PostTest</label>
                                <div class="col-sm-10">
                                    <input type="number" id="nisn" class="form-control"
                                        value="{{ $data['C05'] }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Wawancara</label>
                                <div class="col-sm-10">
                                    <select class="form-control" aria-label=".form-control example" name="wawancara" required>
                                        <option>Pilih Rekomendasi Guru ... </option>
                                        @if ($data['C06'] != null)
                                            @foreach ($pilihan as $p)
                                                @if($p->kriteria == 6)
                                                    @if ($data['C06'] == $p->id)
                                                        <option value="{{$p->id}}" selected>{{$p->nilai_kriteria}}</option>
                                                    @else
                                                        <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                        @foreach($pilihan as $p)
                                            @if($p->kriteria == 6)
                                                <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                            @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Rekom Guru</label>
                                <div class="col-sm-10">
                                    <select class="form-control" aria-label=".form-control example" name="rekom" required>
                                        <option>Pilih Rekomendasi Guru ... </option>
                                        @if ($data['C07'] != null)
                                            @foreach ($pilihan as $p)
                                                @if($p->kriteria == 7)
                                                    @if ($data['C07'] == $p->id)
                                                        <option value="{{$p->id}}" selected>{{$p->nilai_kriteria}}</option>
                                                    @else
                                                        <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($pilihan as $p)
                                                @if($p->kriteria == 7)
                                                    <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="float-right">
                                @if ($data['C06'] == null && $data['C07'] == null)
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Update Data Siswa</button>
                                @endif
                                <a href="{{ Route('AlternatifIndex') }}">
                                    <button class="btn btn-secondary" type="button">Kembali Ke Halaman Sebelumnya</button>
                                </a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('template/Footer')
        <script></script>
