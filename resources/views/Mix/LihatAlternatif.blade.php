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
                    <li class="breadcrumb-item active">Lihat</li>
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
                        {{-- @php
                            dd($data)
                        @endphp --}}
                        <div class="card-body">
                            <form class="needs-validation" novalidate="" action="{{route('UpdateAdmin',$data['id'])}}" method="POST">
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
                                    @if ($data['C03'] == null)
                                        <input type="number" class="form-control"
                                            required name="tpa">
                                    @else
                                        <input type="number" name="tpa" class="form-control"
                                        value="{{ $data['C03'] }}">
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Psikologi</label>
                                <div class="col-sm-10">
                                    <select class="form-control" aria-label=".form-control example" name="psikologi" required>
                                        @if ($data['C04'] != null)
                                            @foreach ($pilihan as $p)
                                                @if($p->kriteria == 5)
                                                    @if ($data['C04'] == $p->id)
                                                        <option value="{{$p->id}}" selected>{{$p->nilai_kriteria}}</option>
                                                    @else
                                                        <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                        <option>Pilih Rekomendasi Guru ... </option>
                                        @foreach ($pilihan as $p)
                                                @if($p->kriteria == 5)
                                                <option value="{{$p->id}}">{{$p->nilai_kriteria}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">PreTest/PostTest</label>
                                <div class="col-sm-10">
                                    @if ($data['C05'] == null)
                                        <input type="number" id="nisn" class="form-control"
                                            name="pretest" required>
                                    @else
                                        <input type="number" id="nisn" class="form-control"
                                        value="{{ $data['C05'] }}" name="pretest">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-2 col-form-label">Wawancara</label>
                                <div class="col-sm-10">
                                    <select class="form-control" aria-label=".form-control example" name="wawancara" disabled>
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
                                            @foreach ($pilihan as $p)
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
                                    <select class="form-control" aria-label=".form-control example" name="rekom" disabled>
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
                                <button class="btn btn-primary" type="submit">Update Data Siswa</button>
                            </form>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#verifikasi"
                                    @if ($data['status'] == 1)
                                        disabled
                                    @endif
                                    >Verifikasi</button>
                            </div>
                            <div class="modal fade col-12" tabindex="-1" role="dialog" id="verifikasi">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Verifikasi Data Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Data yang yang Diinputkan Sudah Sesuai?</p>
                                            <p>Data siswa Atas nama <strong>{{ $data['nama'] }}</strong> akan
                                                Dilanjutkan
                                                Ke proses Selanjutnya?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('VerifikasiAlternatif', $data['id']) }}">
                                                <button class="btn btn-primary">Verifikasi</button>
                                            </a>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('template/Footer')
        <script>

<!-- Bootstrap 4 -->
<script src="{{asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        </script>
