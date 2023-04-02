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
                        <div class="card-body">
                            @foreach ($data as $data)
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nama" class="form-control"
                                            value="{{ ucfirst($data['nama']) }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nisn" class="col-sm-2 col-form-label">NISN Siswa</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="nisn" class="form-control"
                                            value="{{ $data['nisn'] }}" disabled>
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
                                                    $jumlah[$k->kode_kriteria] += 1;
                                                    // dd($data['data'])
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($jumlah[$k->kode_kriteria] == 0)
                                            <div class="form-group row">
                                                <label for="nisn"
                                                    class="col-sm-2 col-form-label">{{ $k->nama_kriteria }}</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" required=""
                                                        value="{{ $data['data'][$k->kode_kriteria] }}" disabled />
                                                </div>
                                            </div>
                                        @elseif($jumlah[$k->kode_kriteria] != 1)
                                            <div class="form-group row">
                                                <label for="nisn"
                                                    class="col-sm-2 col-form-label">{{ $k->nama_kriteria }}</label>
                                                <div class="col-sm-10 row">
                                                    @foreach ($subnilai as $sn)
                                                        <div class="col-sm-4 mt-1">
                                                            <input type="number" class="form-control" required=""
                                                                value="{{ $data['data'][$k->kode_kriteria][$sn->kode_subnilai] }}"
                                                                disabled />
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    @elseif($k->value == 'Pilihan')
                                        <div class="form-group row">
                                            <label for="{{ $k->kode_kriteria }}"
                                                class="col-sm-2 col-form-label">{{ $k->nama_kriteria }}</label>
                                            <div class="col-sm-10">
                                                @php
                                                    $value = null;
                                                    foreach ($pilihan as $p) {
                                                        if ($p->id == $data['data'][$k->kode_kriteria]) {
                                                            $value = $p->nilai_kriteria;
                                                        }
                                                    }
                                                @endphp
                                                <input type="text" class="form-control"
                                                    aria-label="form-control example" value="{{ $value }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary" data-toggle="modal"
                                        data-target="#verifikasi">Verifikasi</button>
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
                                                <p>Data siswa Atas nama <strong>{{ $data['nama'] }}</strong> akan Dilanjutkan
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
                            @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('template/Footer')
        @foreach ($data as $d)
        @endforeach

        <script></script>
